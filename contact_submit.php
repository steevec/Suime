<?php
// contact_submit.php — traite le formulaire de contact via SMTP (PHPMailer) ou fallback mail()
// Conventions d'accolades respectées.

header('Content-Type: application/json; charset=utf-8');
session_start();

function out($ok, $msg = '')
{
    echo json_encode(['ok' => $ok, 'error' => $ok ? null : $msg]);
    exit;
}

// Vérif méthode
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    out(false, 'Méthode invalide.');
}

// Anti-spam: CSRF + honeypot
$csrf = isset($_POST['csrf']) ? (string)$_POST['csrf'] : '';
if (!isset($_SESSION['csrf']) || $csrf !== $_SESSION['csrf']) {
    out(false, 'Session expirée, rechargez la page.');
}
if (!empty($_POST['website'])) {
    out(false, 'Spam détecté.');
}

// Récupération champs
$name    = trim((string)($_POST['name'] ?? ''));
$email   = trim((string)($_POST['email'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));

// Validations simples
if ($name === '' || $email === '' || $message === '') {
    out(false, 'Merci de remplir tous les champs requis.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    out(false, 'Adresse email invalide.');
}

// ====== CONFIG DESTINATAIRE & SMTP ======
$toEmail = 'steeve.cordier@gmail.com, axelle.seguette@gmail.com';      // TODO: change-moi
$toName  = 'Sui-me Contact';         // TODO: optionnel

$smtpHost = 'smtp.example.com';      // TODO
$smtpUser = 'smtp-user@example.com'; // TODO
$smtpPass = 'xxxxxxxxxxxxxxxx';      // TODO
$smtpPort = 587;                     // 587 (TLS) ou 465 (SMTPS)
$smtpSecure = 'tls';                 // 'tls' ou 'ssl'

// Contenu du mail
$subject = 'Nouveau message via le site Sui-me';
$bodyTxt = "Nom: {$name}\nEmail: {$email}\n\nMessage:\n{$message}\n";
$bodyHtml = nl2br(htmlspecialchars($bodyTxt));

// Tentative avec PHPMailer si dispo
$sent = false;
$phpmailerLoaded = false;

if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
    // Essaie d’inclure un vendor si présent (composer)
    $vendorAutoload = __DIR__ . '/vendor/autoload.php';
    if (is_file($vendorAutoload)) {
        require_once $vendorAutoload;
    }
}

if (class_exists('PHPMailer\PHPMailer\PHPMailer')) {
    $phpmailerLoaded = true;
    try {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = $smtpHost;
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtpUser;
        $mail->Password   = $smtpPass;
        $mail->Port       = $smtpPort;
        if ($smtpSecure === 'ssl') {
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
        } else {
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        }
        $mail->CharSet = 'UTF-8';

        $mail->setFrom($smtpUser, 'Site Sui-me');
        $mail->addAddress($toEmail, $toName);
        $mail->addReplyTo($email, $name);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $bodyHtml;
        $mail->AltBody = $bodyTxt;

        $sent = $mail->send();
    } catch (Throwable $e) {
        $sent = false;
    }
}

if (!$sent) {
    // Fallback mail() si PHPMailer indispo ou échec SMTP
    $headers  = "From: Site Sui-me <no-reply@suime.app>\r\n";
    $headers .= "Reply-To: ". $name ." <".$email.">\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $sent = @mail($toEmail, $subject, $bodyTxt, $headers);
}

if ($sent) {
    out(true);
} else {
    $msg = $phpmailerLoaded
        ? 'Échec d’envoi via SMTP.'
        : 'PHPMailer non disponible. Échec d’envoi.';
    out(false, $msg);
}
