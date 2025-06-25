<?php
if (!isset($_SESSION))
    session_start();
?>
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
    <?php include_once __DIR__ . '/autres_pages/header.php'; ?>

    <main>
        <div class="hero-black" class="title">
            <h1 class="title">INFOS PRATIQUE</h1>
        </div>
        <section id="info">
            <h2>Informations</h2>
            <hr>
            <article class="infos">
                <div id="content">
                    <div id="inner-content">
                        <h1 class="title">LIEUX</h1>
                        <p>Parking - gratuit</p>
                        <p><b>Hôtel Cecyl Reims</b><br><a href="/">24 Rue Buirette, 51100 Reims</a></p>
                    </div>
                    <a href="/reservation_user" class="oval-button">Y aller !</a>
                </div>
                <div id="img">

                </div>
            </article>
            <article class="infos" id="elem2">
                <div id="content">
                    <div id="inner-content">
                        <h1 class="title">TARIFS</h1>
                        <p><b>Tarif classic -</b> 39,99 €</p>
                        <p><b>Tarif Réduit -</b> 29,99 € <br>Pour les étudiants et les personnes </p>
                    </div>
                    <a href="/reservation_user" class="oval-button">Réserver</a>
                </div>
                <div id="img">

                </div>
            </article>
            <article class="infos">
                <div id="content">
                    <div id="inner-content">
                        <h1 class="title">HORAIRES</h1>
                        <p><b>Date -</b> 12/06/25</p>
                        <b>De 16h à 18h</b>
                    </div>
                    <a href="/messagerie" class="oval-button">Nous contacter</a>
                </div>
                <div id="img">

                </div>
            </article>
        </section>
    </main>

    <?php include_once __DIR__ . '/autres_pages/footer.php'; ?>
</body>

</html>