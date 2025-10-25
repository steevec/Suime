<?php
// index.php — Sui-me (landing SPA simple + contact AJAX)
// Conventions d'accolades: ouverture à la ligne; "} else {" sur la même ligne.
session_start();
if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(16));
}
$csrf = $_SESSION['csrf'];
?><!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Sui-me — Au rythme de votre vie</title>
<meta name="description" content="Sui-me vous accompagne à chaque étape : cycle, grossesse, post-partum et allaitement.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- Nunito + Inter (Google Fonts) -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Nunito:wght@700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/css/style.css?v=<?php echo time(); ?>">
<link rel="icon" href="/images/logo_suime.svg" type="image/svg+xml">
</head>
<body>

<header class="header" id="top">
  <div class="header-inner">
    <a href="#" class="logo" data-nav="home" aria-label="Sui-me Accueil">
      <img src="/images/logo_suime.svg" alt="Sui-me" class="logo-svg">
      <div class="logo-legend">
  		<span>Au rythme</span>
		<span>de votre vie</span>
		</div>
    </a>

    <nav class="nav" id="nav">
      <a href="#" data-nav="home">Accueil</a>
      <a href="#" data-nav="contact">Contact</a>
      <a href="#" data-nav="mentions">Mentions légales</a>
    </nav>

    <button class="burger" aria-label="Menu" id="burger">
      <svg width="28" height="28" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18M3 12h18M3 18h18" stroke="#580010" stroke-width="2" stroke-linecap="round"/></svg>
    </button>
  </div>
</header>

<main>
  <!-- Section ACCUEIL -->
  <section id="section-home" class="section visible">
    <div class="hero-card">
      <div class="hero-left">
        <p class="kicker">Votre corps, vos données, votre sérénité.</p>
        <h1 class="h1"><span>Bienvenue chez</span><br/><span class="brand">Sui-me</span></h1>

        <p class="p intro">
          Suíme vous accompagne à chaque étape de votre vie : cycle, grossesse, post-partum et allaitement.
          Un espace clair et bienveillant, sans algorithmes ni prédictions, pour observer, comprendre et vivre votre corps en toute confiance.
          Aucune collecte, aucune revente : vos données vous appartiennent, et elles sont entièrement sécurisées.
        </p>

		<p class="p intro">
          Chaque expérience est unique : Suíme s’adapte à vos besoins, à votre rythme et à vos priorités. Que vous souhaitiez simplement observer vos cycles, suivre votre grossesse, ou garder une trace de vos premiers mois avec bébé, tout est pensé pour vous offrir une vision globale et apaisée de votre santé, dans le respect de votre intimité.
        </p>

        <div class="store-row">
          <!-- Remplace les # par tes liens App Store / Google Play -->
          <a class="store-btn" href="#" aria-label="App Store">
            <small>Disponible sur</small><span>App Store</span>
          </a>
          <a class="store-btn" href="#" aria-label="Google Play">
            <small>Disponible sur</small><span>Google Play</span>
          </a>
        </div>
      </div>

      <div class="hero-right">
        <!-- Phone mockup (remplaçable par une image écran) -->
        <div class="phone" aria-hidden="true">
          <div class="phone__notch"></div>
          <div class="phone__screen">
            <div class="phone__screen">
				<div class="phone-slider">
					<img src="/images/preview1.jpg" alt="Aperçu Sui-me 1" class="active">
					<img src="/images/preview2.jpg" alt="Aperçu Sui-me 2">
					<img src="/images/preview3.jpg" alt="Aperçu Sui-me 3">
				</div>
			</div>
          </div>
        </div>
      </div>
    </div>

    <section class="features">
      <h2>Sui-me, vous accompagne au rythme de votre vie</h2>
      <div class="cards">
        <article class="card">
          <img src="/images/cycle.png" class="card__mock" alt="Cycle & symptothermie">
          <div class="card__body">
            <h3>1. Cycle &amp; symptothermie</h3>
            <p>Observez, notez, comprenez. Suivez vos températures à deux décimales, votre glaire, vos sensations, vos symptômes et vos humeurs. Tracez vos niveaux moyen bas et moyen haut, comparez vos courbes selon vos thermomètres — tout ce qu’il faut pour mieux connaître votre corps, sans prédictions.</p>
          </div>
        </article>

        <article class="card">
          <img src="/images/grossesse.png" class="card__mock" alt="Grossesse">
          <div class="card__body">
            <h3>2. Grossesse</h3>
            <p>Vivez votre grossesse semaine après semaine. Suivez vos symptômes et vos rendez-vous, enregistrez vos échographies et bilans mensuels — pour tout avoir au même endroit, simplement.</p>
          </div>
        </article>

        <article class="card">
          <img src="/images/bebe.png" class="card__mock" alt="Bébé & moi">
          <div class="card__body">
            <h3>3. Bébé &amp; moi</h3>
            <p>Accompagnez chaque tétée, chaque biberon, chaque instant. Notez vos allaitements au sein ou au biberon, vos tirages, suivez la quantité bue, les horaires, la durée. Ajoutez les changes, le poids et suivez vos rendez-vous pour garder une vision claire et complète — tout en restant à l’écoute de votre bien-être post-partum.</p>
          </div>
        </article>
      </div>
    </section>
  </section>

  <!-- Section CONTACT -->
  <section id="section-contact" class="section" hidden>
    <div class="page-narrow">
      <h2>Contact</h2>
      <p>Une question, un partenariat, un retour ? Écrivez-nous via ce formulaire.</p>

      <form id="contactForm" class="contact-form" autocomplete="on" novalidate>
        <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($csrf); ?>">
        <!-- honeypot -->
        <input type="text" name="website" class="honeypot" tabindex="-1" autocomplete="off" aria-hidden="true">

        <div class="field">
          <label for="name">Nom</label>
          <input id="name" name="name" type="text" required>
        </div>

        <div class="field">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" required>
        </div>

        <div class="field">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="6" required></textarea>
        </div>

        <button type="submit" class="btn-cta">Envoyer</button>
        <div id="contactStatus" class="status" role="status" aria-live="polite"></div>
      </form>

      <p class="legal small">Vos données ne sont utilisées que pour répondre à votre message.</p>
    </div>
  </section>

  <!-- Section MENTIONS (page dédiée en SPA) -->
  <section id="section-mentions" class="section" hidden>
    <div class="page-narrow">
      <h1>Mentions légales</h1>

		<div class="bloc">
			<p><strong>Suíme</strong> est une application et un site destinés à accompagner les femmes à chaque étape de leur vie : cycle, grossesse, post-partum et allaitement.
			L’ensemble du contenu est proposé à titre informatif et ne remplace pas un avis médical professionnel.</p>
		</div>

		<h2>Éditeur du site</h2>
		<p>
			<strong>Nom :</strong> Axelle Seguette<br>
			<strong>Adresse :</strong> 47 rue Maria et Alfred Moulian, 40230 Saint-Jean-de-Marsacq, France<br>
			<strong>Email :</strong> contact@suime.fr (adresse à adapter)<br>
			<strong>Téléphone :</strong> (à compléter)<br>
			<strong>SIRET :</strong> (en cours d’attribution)<br>
		</p>

		<h2>Réalisation du site</h2>
		<p>
			<strong>Développement et design :</strong> Sitecrea – Steeve Cordier<br>
			<strong>Site web :</strong> <a href="https://sitecrea.fr" target="_blank">https://sitecrea.fr</a>
		</p>

		<h2>Hébergeur</h2>
		<p>
			<strong>Hébergeur :</strong> LWS (Ligne Web Services)<br>
			<strong>Adresse :</strong> 10 rue Penthièvre, 75008 Paris, France<br>
			<strong>Site :</strong> <a href="https://www.lws.fr" target="_blank">www.lws.fr</a>
		</p>

		<h2>Propriété intellectuelle</h2>
		<p>
		L’ensemble des éléments graphiques, textuels et techniques du site <strong>Suíme</strong> (images, logos, typographies, textes, structure, code source, etc.) est protégé par le droit de la propriété intellectuelle.
		Toute reproduction, diffusion ou utilisation sans autorisation écrite préalable est strictement interdite.
		</p>

		<h2>Protection des données personnelles</h2>
		<p>
		Suíme respecte la vie privée de ses utilisatrices.
		Aucune donnée personnelle collectée via l’application ou le site n’est vendue, cédée ni transmise à des tiers.
		Les données éventuellement enregistrées (notes personnelles, cycles, symptômes, etc.) sont stockées de manière sécurisée et restent entièrement la propriété de l’utilisatrice.
		</p>
		<p>
		Conformément au Règlement Général sur la Protection des Données (RGPD – UE 2016/679), vous disposez d’un droit d’accès, de rectification, de suppression et de portabilité de vos données.
		Pour exercer ce droit, vous pouvez écrire à : <a href="mailto:contact@suime.fr">contact@suime.fr</a>
		</p>

		<h2>Responsabilité</h2>
		<p>
		Les informations fournies sur le site ou dans l’application <strong>Suíme</strong> sont à vocation informative et ne peuvent en aucun cas remplacer une consultation médicale.
		L’éditrice et le développeur ne sauraient être tenus responsables de l’utilisation ou de l’interprétation des informations disponibles.
		</p>

		<h2>Liens externes</h2>
		<p>
		Des liens vers d’autres sites peuvent être proposés pour enrichir l’expérience utilisateur.
		Cependant, <strong>Suíme</strong> n’exerce aucun contrôle sur ces sites externes et ne peut être tenue responsable de leur contenu.
		</p>

		<h2>Cookies</h2>
		<p>
		Le site <strong>Suíme</strong> utilise uniquement des cookies techniques nécessaires à son bon fonctionnement et ne recourt à aucun système de traçage ni de publicité.
		</p>

		<h2>Droit applicable</h2>
		<p>
		Les présentes mentions légales sont soumises au droit français.
		En cas de litige, et à défaut de résolution amiable, les tribunaux compétents seront ceux du ressort du siège social de l’éditrice.
		</p>
    </div>
  </section>
</main>

<footer class="footer">
  <div class="container">
    <p class="legal small">© 2025 Sui-me. Tous droits réservés.</p>
  </div>
</footer>

<script>
// Menu mobile
document.getElementById('burger').addEventListener('click', function(){
  const nav = document.getElementById('nav');
  nav.classList.toggle('open');
});

// SPA: navigation simple
function showSection(key)
{
    const map = {
        home: 'section-home',
        contact: 'section-contact',
        mentions: 'section-mentions'
    };
    for (const k in map) {
        const el = document.getElementById(map[k]);
        if (el) {
            if (k === key) { el.hidden = false; el.classList.add('visible'); }
            else { el.hidden = true; el.classList.remove('visible'); }
        }
    }
    // fermer le menu mobile
    document.getElementById('nav').classList.remove('open');
    window.scrollTo({top:0, behavior:'smooth'});
}
document.querySelectorAll('[data-nav]').forEach(a=>{
  a.addEventListener('click', e=>{
    e.preventDefault();
    showSection(a.getAttribute('data-nav'));
  });
});

// Contact AJAX
const form = document.getElementById('contactForm');
if (form) {
  form.addEventListener('submit', async function(e){
    e.preventDefault();
    const status = document.getElementById('contactStatus');
    status.textContent = 'Envoi en cours…';
    const data = new FormData(form);
    try {
      const r = await fetch('/contact_submit.php', { method:'POST', body:data });
      const json = await r.json();
      if (json && json.ok) {
        status.textContent = 'Merci, votre message a bien été envoyé.';
        form.reset();
      } else {
        status.textContent = (json && json.error) ? json.error : 'Erreur lors de l’envoi.';
      }
    } catch(err) {
      status.textContent = 'Erreur réseau. Réessayez dans un instant.';
    }
  });
}


// --- Slider dans le mockup téléphone ---
(function(){
  const slides = document.querySelectorAll('.phone-slider img');
  if (!slides.length) return;
  let current = 0;
  setInterval(()=>{
    slides[current].classList.remove('active');
    current = (current + 1) % slides.length;
    slides[current].classList.add('active');
  }, 7000); // 7 secondes
})();



</script>
</body>
</html>
