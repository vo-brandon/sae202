<?php
if (!isset($_SESSION))
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/view/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Kalnia:wght@100..700&display=swap"
        rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="/view/images/rose-logo.png" />
    <title>Murder Party</title>
</head>

<body>
    <?php include_once __DIR__ . '/autres_pages/header.php'; ?>
    <main>
        <div class="hero-black" id="concept" class="title">
            <div>
                <p>Une Murder Party est un jeu d'enquête grandeur nature, souvent immersif et scénarisé, où les
                    participant·es incarnent des personnages impliqués dans une intrigue criminelle, généralement un
                    meurtre. Le but est d'enquêter, d'échanger, de manipuler (parfois !) et de résoudre l'affaire… ou de
                    cacher sa propre culpabilité.<br><br>L'ambiance oscille entre théâtre interactif et jeu de rôle,
                    dans un cadre souvent mystérieux et soigneusement mis en scène</p>
                <p>Dans les années 1940, Mme Rose est retrouvée morte dans la suite 107 d'un hôtel élégant. L'affaire,
                    rapidement étouffée, n'a jamais été résolue, mais les rumeurs ont perduré.<br><br>Des années plus
                    tard, ses proches reçoivent une lettre anonyme les invitant à revenir dans l'hôtel. Sur place, les
                    tensions montent. Secrets de famille, souvenirs flous et soupçons silencieux
                    s'entremêlent.<br><br>Vous êtes convié à plonger dans ce huis clos troublant, où chaque recoin de
                    l'hôtel murmure une vérité oubliée. L'enquête commence… à vous de démêler le vrai du faux.</p>
            </div>
            <h1 class="title">ROOM 107.</h1>
        </div>
        <div id="page-max-width">
            <div id="hero">
                <style>
                    #hero {
                        background-image: url("/view/images/hero2.png");
                        background-size: cover;
                        background-position: center;
                    }
                </style>
            </div>
            <section id="scenario">
                <h1 class="title">Scénario</h1>
                <div id="content">
                    <p id="text">L'intrigue du Murder game “Room 107” se déroule dans les années 1940, dans un hôtel
                        discret au style raffiné. Lors d'un séjour familial accompagné de quelques amis proches, Mme
                        Rose, femme influente et très respectée, est retrouvée morte dans la suite 107. Les
                        circonstances de son décès restent floues, et aucun coupable n'a jamais été désigné. L'affaire
                        est rapidement étouffée malgré les nombreuses apparition de cette affaire à la une de nombreux
                        journaux… mais les rumeurs n'ont jamais cessé. Plusieurs années plus tard, la famille reçoit une
                        lettre anonyme à leur porte, les invitant mystérieusement à revenir dans cet hôtel pour une
                        commémoration de ce tragique évènement. Poussés par l'étrangeté du message, les membres de la
                        famille ainsi que quelques anciens proches de Mme Rose décident d'accepter de venir ce
                        receuillir tous ensemble. Mais dès leur arrivée, l'ambiance se trouble : des secrets lointain
                        refont surface, les souvenirs se mélangent aux soupçons, et chaque recoin de l'hôtel semble
                        murmurer un fragment de vérité oublié.</p>
                    <div>
                        <p>Ce scénario sert de fondation à toute la direction artistique de l'événement : une murder
                            party à l'esthétique élégante et feutrée, teintée de mystère, de nostalgie, et d'une tension
                            sourde qui ne fait que monter tout au long de la soirée avec de nombreux dénouements et
                            révélations.<br>Vous avez reçu une lettre d'invitaion : vous êtes convié à incarner et
                            participer à cette histoire immersie rempli de mystère autour de la Chambre 107.</p>
                        <div id="circle-container">
                            <p>Mystérieux</p>
                            <p>Familial</p>
                            <p>Hotêl</p>
                            <p>Énigmatique</p>
                        </div>
                    </div>
                </div>
            </section>
            <section id="images">
                <div id="left-side">
                    <div id="elem1">
                        <style>
                            #elem1 {
                                background-image: url("/view/images/hotel-1.png");
                                background-size: cover;
                                background-position: center;
                            }
                        </style>
                    </div>
                    <div id="elem2">
                        <style>
                            #elem2 {
                                background-image: url("/view/images/hotel-3.png");
                                background-size: cover;
                                background-position: center;
                            }
                        </style>
                    </div>
                </div>
                <div id="right-side">
                    <style>
                        #right-side {
                            background-image: url("/view/images/hotel-2.png");
                            background-size: cover;
                            background-position: center;
                        }
                    </style>
                </div>
            </section>
            <section id="concept-info">
                <div>
                    <div id="img-container">
                        <img src="/view/images/gousset.png" alt="">
                    </div>
                    <h1 class="title">DURÉE</h1>
                    <h2>2H00</h2>
                    <p>Merci d'arriver 30 minutes avant l'heure indiquée afin de préparer au mieux votre expérience
                        Murder Party.</p>
                </div>
                <div>
                    <div id="img-container">
                        <img src="/view/images/lettre.png" alt="">
                    </div>
                    <h1 class="title">PARTICIPANTS</h1>
                    <h2>20 maximum</h2>
                    <p>Lorem ipsum dolor sit amet consectetur. Lobortis mattis ut ut risus.</p>
                </div>
                <div>
                    <div id="img-container">
                        <img src="/view/images/key.png" alt="">
                    </div>
                    <h1 class="title">LIEUX</h1>
                    <h2>Hôtel Cecyl Reims</h2>
                    <a href="">24 Rue Buirette, 51100 Reims</a>
                </div>
            </section>
            <section id="enigme">
                <p>Vous souhaitez tenter l'expérience murder entre amis ou en famille ? Venez participer à nos murders
                    avec comédiens dédiés au grand public !</p>
                <h1 class="title">QUI A ASSASINÉ Mme. ROSE ?</h1>
                <a href="/" class="oval-button">Réservez maintenant !</a>
            </section>
        </div>
    </main>
    <?php include_once __DIR__ . '/autres_pages/footer.php'; ?>
</body>

</html>