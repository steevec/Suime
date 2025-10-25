# Sui-me - Landing Page

Projet Axelle Seguette - Landing page pour l'application Sui-me, votre compagnon santé féminine.

## 📋 Description

Sui-me est une landing page PHP/HTML/CSS pour une application de suivi de santé féminine. Le site présente les fonctionnalités principales de l'application : suivi du cycle menstruel, suivi de grossesse, et suivi bébé & moi.

## 🎨 Design

### Polices
- **Nunito** : Titres (Google Fonts)
- **Inter** : Texte principal (Google Fonts)
- **Playlist Script** : Logo et marque "Sui-me" (Google Fonts)

### Couleurs
- **Background** : `#FDEDE3`
- **Blocs** : `#FF9E9B`
- **Texte** : `#580010`
- **Marque** : `#E94772`

## 📁 Structure du projet

```
Suime/
├── public/
│   ├── index.php          # Router principal avec gestion des pages
│   └── assets/
│       ├── css/
│       │   └── styles.css # Styles CSS complets
│       └── images/        # Dossier pour les images
├── includes/
│   ├── header.php         # En-tête avec menu sticky
│   └── footer.php         # Pied de page
├── pages/
│   ├── home.php           # Page d'accueil
│   ├── contact.php        # Page de contact
│   └── mentions.php       # Mentions légales
└── README.md
```

## 🚀 Installation et utilisation

### Prérequis
- PHP 7.4 ou supérieur
- Un serveur web (Apache, Nginx) ou PHP built-in server

### Installation

1. Cloner le dépôt :
```bash
git clone https://github.com/steevec/Suime.git
cd Suime
```

2. Lancer le serveur de développement PHP :
```bash
cd public
php -S localhost:8000
```

3. Accéder au site :
Ouvrir votre navigateur à l'adresse : `http://localhost:8000`

## 🔗 Navigation

Le site utilise un système de routing simple via le paramètre GET `?page` :

- **Accueil** : `index.php?page=home` (page par défaut)
- **Contact** : `index.php?page=contact`
- **Mentions légales** : `index.php?page=mentions`

## ✨ Fonctionnalités

### Header
- Menu de navigation sticky
- Responsive avec menu hamburger sur mobile
- Navigation ARIA accessible

### Page d'accueil
- Hero section avec mockup smartphone
- Présentation des 3 fonctionnalités principales :
  - Suivi du Cycle
  - Suivi Grossesse
  - Bébé & Moi
- Boutons de téléchargement (Google Play / App Store)
- Section CTA (Call-to-Action)

### Page Contact
- Formulaire de contact avec validation
- Informations de contact
- Design responsive

### Page Mentions légales
- Informations légales complètes
- RGPD et protection des données
- Politique de cookies

## 📱 Responsive Design

Le site est entièrement responsive avec des breakpoints optimisés :
- **Desktop** : > 968px
- **Tablet** : 768px - 968px
- **Mobile** : < 768px

## ♿ Accessibilité

Le site respecte les bonnes pratiques d'accessibilité :
- Navigation au clavier
- Attributs ARIA
- Contrastes de couleurs respectés
- Support du mode contraste élevé
- Support de la réduction des animations
- Labels de formulaire appropriés

## 🛠️ Technologies utilisées

- **PHP** : Routing et includes
- **HTML5** : Structure sémantique
- **CSS3** : Styles, animations, responsive design
- **JavaScript** : Menu mobile interactif

## 📄 License

Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 👥 Auteur

Axelle Seguette - Projet Sui-me

---

© 2025 Sui-me. Tous droits réservés.
