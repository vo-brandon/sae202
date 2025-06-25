<h2>Inscription</h2>
<form method="post" action="?action=inscription" class="form-auth">
    <input type="text" name="prenom" placeholder="Prénom" required>
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="email" name="mail" placeholder="Email" required>
    <input type="password" name="mdp" placeholder="Mot de passe" required>
    <input type="password" name="mdp_confirm" placeholder="Confirmer le mot de passe" required>
    <button type="submit">S'inscrire</button>
</form>

<h2>Connexion</h2>
<form method="post" action="?action=connexion" class="form-auth">
    <input type="email" name="mail" placeholder="Email" required>
    <input type="password" name="mdp" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>