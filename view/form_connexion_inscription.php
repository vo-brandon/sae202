<!-- Formulaire d'inscription -->
<h2>Inscription</h2>
<form method="post" action="?action=inscription">
    <input type="text" name="prenom" placeholder="Prénom" required><br>
    <input type="text" name="nom" placeholder="Nom" required><br>
    <input type="email" name="mail" placeholder="Email" required><br>
    <input type="password" name="mdp" placeholder="Mot de passe" required><br>
    <input type="password" name="mdp_confirm" placeholder="Confirmer le mot de passe" required><br>
    <button type="submit">S'inscrire</button>
</form>

<!-- Formulaire de connexion -->
<h2>Connexion</h2>
<form method="post" action="?action=connexion">
    <input type="email" name="mail" placeholder="Email" required><br>
    <input type="password" name="mdp" placeholder="Mot de passe" required><br>
    <button type="submit">Se connecter</button>
</form>