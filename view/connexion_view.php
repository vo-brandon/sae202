<a href="/" class="btn-retour">&#8592; Accueil</a>
<link href="/view/css/cssbase.css" type="text/css" rel="stylesheet" />
<div style="display:flex;justify-content:center;align-items:center;min-height:80vh;">
    <form method="post" action="/connexion/connexion">
        <h2>Connexion</h2>
        <?php if (!empty($msg)) : ?>
            <p style="color:red;"> <?= htmlspecialchars($msg) ?> </p>
        <?php endif; ?>
        <input type="email" name="mail" placeholder="Email" required>
        <input type="password" name="mdp" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
        <p>Pas encore de compte ? <a href="/inscription">S'inscrire</a></p>
    </form>
</div>