<?php
if (!isset($_SESSION))
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Kalnia:wght@100..700&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/view/images/rose-logo.png">
    <title>Murder Party</title>
    <style>
        :root {
            --black: #1e1e1e;
            --dark-shade: #61463f;
            --white: #f2e5d0;
            --primary: #a73c48;
            --secondary: #d37f7f;
            --contrast: #3b4a34;
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




        @media screen and (max-width: 750px) {

            header>a.oval-button,
            header>a.oval-button.deconnexion-btn {
                height: 40px;
                padding: 8px 16px;
                font-size: 0.95rem;
            }
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/autres_pages/header.php'; ?>
    <main>
        <div class="hero">
            <h1 class="title">INSCRIPTION.</h1>
        </div>
        <section id="connexion">
            <div id="inner-content">
                <img src="/view/images/room.png" alt="Chambre">
                <div>
                    <h1>INSCRIPTION</h1>
                    <form method="post" action="/inscription/inscription">
                        <div>
                            <input type="text" name="nom" placeholder="Nom" required>
                            <input type="text" name="prenom" placeholder="Prénoms" required>
                        </div>
                        <input type="email" name="mail" placeholder="Email" required>
                        <input type="password" name="mdp" placeholder="Mot de passe" required>
                        <input type="password" name="mdp_confirm" placeholder="Confirmez le mot de passe" required>
                        <div>
                            <input type="text" name="telephone" placeholder="Numéro">
                            <input type="date" name="date_naissance" placeholder="Date de naissance" required>
                        </div>
                        <input type="submit" id="submit" class="oval-button title" value="CONFIRMER">
                        <a href="/connexion">J'ai déjà un compte</a>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php include __DIR__ . '/autres_pages/footer.php'; ?>
</body>

</html>