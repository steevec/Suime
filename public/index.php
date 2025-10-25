<?php
// Simple router for Sui-me landing page
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Validate page parameter to prevent directory traversal
$allowed_pages = ['home', 'contact', 'mentions'];
if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}

// Set page title based on current page
$page_titles = [
    'home' => 'Sui-me - Votre compagnon santé féminine',
    'contact' => 'Contact - Sui-me',
    'mentions' => 'Mentions légales - Sui-me'
];
$page_title = $page_titles[$page];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sui-me - Application de suivi de santé féminine">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- PlaylistScript font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playlist+Script&display=swap" rel="stylesheet">
    
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    
    <main id="main-content" role="main">
        <?php
        $page_file = __DIR__ . "/../pages/{$page}.php";
        if (file_exists($page_file)) {
            include $page_file;
        } else {
            echo '<div class="container"><p>Page non trouvée.</p></div>';
        }
        ?>
    </main>
    
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
