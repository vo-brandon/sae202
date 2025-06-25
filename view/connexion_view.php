<?php
if (!isset($_SESSION))
    session_start();
include __DIR__ . '/autres_pages/header.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --black: #1E1E1E;
            --dark-shade: #61463F;
            --white: #F2E5D0;
            --primary: #A73C48;
            --secondary: #D37F7F;
            --contrast: #3B4A34;
        }

        body {
            font-family: "Courier Prime", monospace;
            font-weight: 400;
            font-style: normal;
            background-color: var(--white);
            color: var(--black);
            margin: 0;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        b {
            font-family: "Courier Prime", monospace;
            font-weight: 700;
            font-style: normal;
        }

        input {
            font-family: "Courier Prime", monospace;
        }

        a {
            color: var(--black);
            text-decoration: none;
        }

        section {
            margin: 30px 0;
        }

        .oval-button {
            padding: 10px 30px;
            border-radius: 100px;
            border: solid var(--primary) 1px;
            color: var(--primary);
            transition-duration: .3s;
            text-align: center;
        }

        .oval-button:hover {
            color: var(--white);
            background-color: var(--secondary);
            transition-duration: .3s;
        }

        .title {
            font-family: "Kalnia", serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            font-variation-settings:
                "wdth" 100;
        }

        header {
            display: flex;
            position: fixed;
            min-height: 85px;
            width: 100%;
            justify-content: space-evenly;
            align-items: center;
            background-color: var(--white);
            z-index: 1000;
        }

        header#black {
            background-color: var(--black);
            color: var(--white);
        }

        header#black a {
            color: var(--white);
        }

        header .nav-text-button {
            display: block;
            margin: 0 10px;
            text-align: center;
        }

        header .nav-icon-button {
            display: none;
            height: 30px;
        }

        header div {
            display: flex;
            flex-direction: column;
        }

        header div span {
            width: 0px;
            height: 2px;
            background-color: var(--black);
            transition-duration: .3s;
        }

        header#black div span {
            width: 0px;
            height: 2px;
            background-color: var(--white);
            transition-duration: .3s;
        }

        header div:hover span {
            width: 100%;
            height: 2px;
            background-color: var(--primary);
            transition-duration: .3s;
        }

        header#black div:hover span {
            width: 100%;
            height: 2px;
            background-color: var(--primary);
            transition-duration: .3s;
        }

        header img {
            height: 50px;
        }

        .hero {
            display: flex;
            flex-wrap: wrap;
            margin: 85px 0;
            background-color: var(--white);
            color: var(--white);
            padding: 50px;
            padding-top: 150px;
        }

        .hero h1 {
            color: var(--black);
            font-size: 140px;
            font-weight: 800;
            margin: 0;
        }

        section#connexion {
            background-color: var(--contrast);
            padding: 75px;
        }

        section#connexion div#inner-content {
            display: flex;
            justify-content: space-between;
            background-color: var(--white);
            padding: 50px;
            gap: 50px;
        }

        section#connexion div#inner-content img {
            width: 35%;
        }

        section#connexion div#inner-content div {
            display: flex;
            flex-direction: column;
            gap: 50px;
            width: 100%;
        }

        section#connexion div#inner-content div h1 {
            font-size: 35px;
            text-decoration: underline 1px;
        }

        section#connexion div#inner-content div form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        section#connexion div#inner-content div form div {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            gap: 15px;
        }

        section#connexion div#inner-content div form div input {
            width: 100%;
        }

        section#connexion div#inner-content div form input {
            border-radius: 100px;
            border: var(--black) solid 1px;
            background-color: var(--white);
            color: var(--contrast);
            padding: 10px 30px;
            font-size: large;
        }

        section#connexion div#inner-content div form #submit {
            width: 70%;
            background-color: var(--white);
            color: var(--primary);
            border-color: var(--primary);
            margin: 0 auto;
            font-size: large;
            font-weight: 800;
            margin-top: 50px;
        }

        section#connexion div#inner-content div form #submit:hover {
            background-color: var(--secondary);
        }

        section#connexion div#inner-content div form a {
            color: var(--primary);
            margin: 0 auto;
            width: 70%;
            text-align: center;
            margin-top: 25px;
            text-decoration: underline;
            transition-duration: .3s;
        }

        section#connexion div#inner-content div form a:hover {
            color: var(--secondary);
            transition-duration: .3s;
        }

        footer {
            background-color: var(--white) !important;
            color: var(--black) !important;
        }

        footer a,
        footer #bottom-section div#content a {
            color: var(--primary) !important;
        }

        footer .oval-button {
            color: var(--primary) !important;
            border-color: var(--primary) !important;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Kalnia:wght@100..700&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/view/images/rose-logo.png">
    <title>Murder Party</title>
</head>

<body>
    <?php // header déjà importé en haut du fichier ?>

    <main>
        <div class="hero">
            <h1 class="title">CONNEXION.</h1>
        </div>
        <section id="connexion">
            <div id="inner-content">
                <img src="/images/room.png" alt="Chambre">
                <div>
                    <h1>CONNEXION</h1>
                    <form method="post" action="/connexion/connexion">
                        <?php if (!empty($msg)): ?>
                            <p class="msg-error"> <?= htmlspecialchars($msg) ?> </p>
                        <?php endif; ?>
                        <input type="email" name="mail" placeholder="Email" required>
                        <div style="position:relative;display:flex;align-items:center;">
                            <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required
                                style="flex:1;">
                            <button type="button" id="togglePassword"
                                style="position:absolute;right:10px;background:none;border:none;cursor:pointer;">
                                <span id="eyeIcon" style="font-size:20px;">👁️</span>
                            </button>
                        </div>
                        <input type="submit" id="submit" class="oval-button title" value="CONNEXION">
                        <a href="/inscription">Je n'ai pas de compte, s'inscrire</a>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/autres_pages/footer.php'; ?>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('mdp');
        const eyeIcon = document.getElementById('eyeIcon');
        togglePassword.addEventListener('click', function () {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            eyeIcon.textContent = type === 'password' ? '👁️' : '🙈';
        });
    </script>
</body>

</html>