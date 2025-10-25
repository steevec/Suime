<section class="page-header" aria-labelledby="page-title">
    <div class="container">
        <h1 id="page-title">Contactez-nous</h1>
        <p class="page-description">Une question ? Une suggestion ? N'hésitez pas à nous contacter.</p>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="contact-content">
            <div class="contact-info">
                <h2>Restons en contact</h2>
                <p>
                    Notre équipe est à votre écoute pour répondre à toutes vos questions 
                    concernant <span class="brand-name">Sui-me</span>.
                </p>
                
                <div class="contact-methods">
                    <div class="contact-method">
                        <h3>Email</h3>
                        <p><a href="mailto:contact@suime.app">contact@suime.app</a></p>
                    </div>
                    
                    <div class="contact-method">
                        <h3>Réseaux sociaux</h3>
                        <p>Suivez-nous pour ne rien manquer de nos actualités</p>
                    </div>
                </div>
            </div>
            
            <form class="contact-form" method="post" action="#" aria-label="Formulaire de contact">
                <div class="form-group">
                    <label for="name">Nom complet <span aria-label="requis">*</span></label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        required 
                        aria-required="true"
                        placeholder="Votre nom"
                    >
                </div>
                
                <div class="form-group">
                    <label for="email">Email <span aria-label="requis">*</span></label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required 
                        aria-required="true"
                        placeholder="votre.email@exemple.com"
                    >
                </div>
                
                <div class="form-group">
                    <label for="subject">Sujet</label>
                    <input 
                        type="text" 
                        id="subject" 
                        name="subject" 
                        placeholder="Sujet de votre message"
                    >
                </div>
                
                <div class="form-group">
                    <label for="message">Message <span aria-label="requis">*</span></label>
                    <textarea 
                        id="message" 
                        name="message" 
                        rows="6" 
                        required 
                        aria-required="true"
                        placeholder="Votre message..."
                    ></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    Envoyer le message
                </button>
                
                <p class="form-note">
                    <small>Les champs marqués d'un * sont obligatoires</small>
                </p>
            </form>
        </div>
    </div>
</section>
