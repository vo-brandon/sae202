<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Kalnia:wght@100..700&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/view/images/rose-logo.png">
    <title>Murder Party</title>
</head>

<body>
    <?php include __DIR__ . '/autres_pages/header.php'; ?>
    <main>
        <div class="hero" class="title">
            <h1 class="title">INSCRIPTION.</h1>
            <div class="centered-container">
                <form method="post" action="/inscription/inscription">
                    <h2>Inscription</h2>
                    <?php if (!empty($msg)): ?>
                        <p class="msg-success"> <?= htmlspecialchars($msg) ?> </p>
                    <?php endif; ?>
                    <input type="text" name="prenom" placeholder="Prénom" required>
                    <input type="text" name="nom" placeholder="Nom" required>
                    <input type="email" name="mail" placeholder="Email" required>
                    <input type="text" name="telephone" placeholder="Numéro de téléphone" required>
                    <input type="date" name="date_naissance" placeholder="Date de naissance" required>
                    <input type="password" name="mdp" placeholder="Mot de passe" required>
                    <input type="password" name="mdp_confirm" placeholder="Confirmer le mot de passe" required>
                    <button type="submit">S'inscrire</button>
                    <p>Déjà un compte ? <a href="/connexion">Se connecter</a></p>
                </form>
            </div>
        </div>
    </main>
    <?php include __DIR__ . '/autres_pages/footer.php'; ?>
</body>

</html>