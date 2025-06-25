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
    <link rel="icon" type="image/x-icon" href="images/rose-logo.png">
    <title>Murder Party</title>
</head>

<body>
    <?php
    require_once("view/autres_pages/header.php");
    ?>
    <main>
        <div class="hero" class="title">
            <h1 class="title">CONNEXION.</h1>
        </div>
        <div class="centered-container">
            <form method="post" action="/connexion/connexion">
                <h2>Connexion</h2>
                <?php if (!empty($msg)): ?>
                    <p class="msg-error"> <?= htmlspecialchars($msg) ?> </p>
                <?php endif; ?>
                <input type="email" name="mail" placeholder="Email" required>
                <input type="password" name="mdp" placeholder="Mot de passe" required>
                <button type="submit">Se connecter</button>
                <p>Pas encore de compte ? <a href="/inscription">S'inscrire</a></p>
            </form>
        </div>
    </main>
    <?php
    require_once("view/autres_pages/footer.php");
    ?>
</body>

</html>