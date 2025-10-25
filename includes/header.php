<?php
$current_page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<header class="site-header" role="banner">
    <div class="container">
        <nav class="main-nav" role="navigation" aria-label="Navigation principale">
            <div class="logo">
                <a href="index.php?page=home" aria-label="Retour à l'accueil">
                    <span class="brand-name">Sui-me</span>
                </a>
            </div>
            
            <button class="menu-toggle" aria-expanded="false" aria-controls="nav-menu" aria-label="Ouvrir le menu">
                <span class="hamburger"></span>
                <span class="hamburger"></span>
                <span class="hamburger"></span>
            </button>
            
            <ul class="nav-menu" id="nav-menu" role="list">
                <li>
                    <a href="index.php?page=home" 
                       class="<?php echo $current_page === 'home' ? 'active' : ''; ?>"
                       aria-current="<?php echo $current_page === 'home' ? 'page' : 'false'; ?>">
                        Accueil
                    </a>
                </li>
                <li>
                    <a href="index.php?page=contact" 
                       class="<?php echo $current_page === 'contact' ? 'active' : ''; ?>"
                       aria-current="<?php echo $current_page === 'contact' ? 'page' : 'false'; ?>">
                        Contact
                    </a>
                </li>
                <li>
                    <a href="index.php?page=mentions" 
                       class="<?php echo $current_page === 'mentions' ? 'active' : ''; ?>"
                       aria-current="<?php echo $current_page === 'mentions' ? 'page' : 'false'; ?>">
                        Mentions légales
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<script>
// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            navMenu.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });
    }
});
</script>
