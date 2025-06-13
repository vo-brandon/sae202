<a href="/" class="btn-retour">&#8592; Accueil</a>
<link href="/view/css/cssbase.css" type="text/css" rel="stylesheet" />
<div style="display:flex;justify-content:center;align-items:center;min-height:80vh;">
    <form method="post" action="/inscription/inscription">
        <h2>Inscription</h2>
        <?php if (!empty($msg)): ?>
            <p style="color:red;"> <?= htmlspecialchars($msg) ?> </p>
        <?php endif; ?>
        <input type="text" name="prenom" placeholder="Prénom" required>
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="email" name="mail" placeholder="Email" required>
        <input type="password" name="mdp" placeholder="Mot de passe" required>
        <input type="password" name="mdp_confirm" placeholder="Confirmer le mot de passe" required>
        <button type="submit">S'inscrire</button>
        <p>Déjà un compte ? <a href="/connexion">Se connecter</a></p>
    </form>
</div>