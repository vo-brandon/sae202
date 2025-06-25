<?php
if (!isset($_SESSION))
    session_start();
require_once("view/autres_pages/header.php");

if (isset($_SESSION['user']) && ($_SESSION['user']['role'] ?? '') === 'admin') {
    header('Location: /');
    exit();
}
$userId = $_SESSION['user']['id'] ?? null;
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
    <title>Messagerie - Murder Party</title>
    <style>
        .messagerie-section {
            background-color: var(--contrast);
            color: var(--white);
            padding: 30px 50px;
            border-radius: 20px;
            margin-bottom: 40px;
        }

        .messagerie-section h1 {
            font-size: 2.2rem;
            margin-bottom: 20px;
        }

        .messagerie-section article {
            margin-bottom: 30px;
        }

        .messagerie-section hr {
            border: none;
            border-top: 1px solid var(--white);
            margin: 30px 0;
        }

        .messagerie-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 40px;
        }

        .messagerie-textarea {
            border-radius: 20px;
            border: 1px solid var(--primary);
            padding: 15px;
            font-size: 1.1rem;
            font-family: 'Courier Prime', monospace;
            min-height: 80px;
            resize: vertical;
        }

        .messagerie-list {
            list-style: none;
            padding: 0;
        }

        .messagerie-item {
            margin-bottom: 30px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 18px 22px;
        }

        .messagerie-item.user {
            border-left: 5px solid var(--primary);
        }

        .messagerie-item.admin {
            border-left: 5px solid var(--secondary);
        }

        .messagerie-date {
            font-size: 0.95rem;
            color: var(--secondary);
        }

        .messagerie-content {
            margin: 10px 0 0 0;
            font-size: 1.08rem;
        }

        .messagerie-compact-text {
            font-size: 0.95rem;
            text-align: left;
            max-width: 420px;
            margin-left: auto;
            margin-right: 0;
            line-height: 1.4;
        }

        .hero-black#contact-header {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            width: 100%;
        }

        .hero-black#contact-header .title {
            text-align: right;
            margin-right: 0;
        }

        .hero-black#contact-header .messagerie-compact-text {
            text-align: right;
            max-width: 420px;
            font-size: 0.95rem;
            margin: 0 0 18px 0;
            line-height: 1.4;
            align-self: flex-end;
        }

        .hero-black#contact-header #buttons {
            align-self: flex-end;
            margin-top: 0;
            width: auto;
            text-align: right;
            display: flex;
            gap: 10px;

        }

        #buttons {
            display: flex;
            justify-content: end;
            gap: 25px;
            padding-top: 25px;
        }

        @media screen and (max-width: 750px) {
            .messagerie-section {
                padding: 15px 5vw;
            }
        }
    </style>
</head>

<body>
    <header id="black">
        <a href="/" id="logo"><img src="/view/images/room107-white.png" alt="Home"></a>
        <div>
            <a href="/"><img src="/view/images/home.svg" alt="Home Button" class="nav-icon-button">
                <p class="nav-text-button">ACCUEIL</p>
            </a>
            <span></span>
        </div>
        <div>
            <a href="/concept"><img src="/view/images/concept.svg" alt="Concept Button" class="nav-icon-button">
                <p class="nav-text-button">CONCEPT</p>
            </a>
            <span></span>
        </div>
        <div>
            <a href="/info"><img src="/view/images/info.svg" alt="Info Button" class="nav-icon-button">
                <p class="nav-text-button">INFO PRATIQUES</p>
            </a>
            <span></span>
        </div>
        <div>
            <a href="/contact"><img src="/view/images/contact.svg" alt="Contact Button" class="nav-icon-button">
                <p class="nav-text-button">CONTACT</p>
            </a>
            <span></span>
        </div>
        <div>
            <a href="/admin"><img src="/view/images/admin.svg" alt="Admin Button" class="nav-icon-button">
                <p class="nav-text-button">ADMIN</p>
            </a>
            <span></span>
        </div>
        <div>
            <a href="/profil"><img src="/view/images/profil.svg" alt="Profil Button" class="nav-icon-button">
                <p class="nav-text-button">PROFIL</p>
            </a>
            <span></span>
        </div>
        <a href="/connexion" class="oval-button">CONNEXION</a>
    </header>
    <main>
        <div class="hero-black" id="contact">
            <div id="contact-header">
                <h1 class="title">MESSAGERIE.</h1>
                <p class="messagerie-compact-text">Une question, un doute, un retour à partager ?<br>Notre équipe est là
                    pour vous. Envoyez un message aux modérateurs : ils vous répondront au plus vite pour vous aider ou
                    lever le voile sur vos interrogations.
                    Vous pouvez aussi consulter vos messages envoyés et reçus.<br>Chaque retour compte… et pourrait bien
                    inspirer de futures énigmes.</p>
                <div id="buttons">
                    <a href="/messagerie_user/messagerie_user" class="oval-button">Messagerie</a>
                    <a href="#sended" class="oval-button">Nouveau message</a>
                </div>
            </div>
        </div>
        <div id="page-max-width">
            <section class="messagerie-section" id="received">
                <h1>MESSAGES REÇUS</h1>
                <div id="content">
                    <?php if (!empty($messages)): ?>
                        <?php foreach ($messages as $msg): ?>
                            <?php if ($msg['from_id'] != $userId): ?>
                                <article>
                                    <h1><b class="title">ADMIN</b> - <?= date('d/m/Y H:i', strtotime($msg['created_at'])) ?></h1>
                                    <p><?= nl2br(htmlspecialchars($msg['content'])) ?></p>
                                </article>
                                <hr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if (count(array_filter($messages, fn($m) => $m['from_id'] != $userId)) === 0): ?>
                            <p style="text-align:center; color:#a73c48; font-size:1.1rem;">Aucun message reçu pour l'instant.
                            </p>
                        <?php endif; ?>
                    <?php else: ?>
                        <p style="text-align:center; color:#a73c48; font-size:1.1rem;">Aucun message reçu pour l'instant.
                        </p>
                    <?php endif; ?>
                </div>
            </section>
            <section class="messagerie-section" id="sended">
                <h1>MESSAGES ENVOYÉS</h1>
                <div id="content">
                    <?php if (!empty($messages)): ?>
                        <?php foreach ($messages as $msg): ?>
                            <?php if ($msg['from_id'] == $userId): ?>
                                <article>
                                    <h1><b class="title">Vous</b> - <?= date('d/m/Y H:i', strtotime($msg['created_at'])) ?></h1>
                                    <p><?= nl2br(htmlspecialchars($msg['content'])) ?></p>
                                </article>
                                <hr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if (count(array_filter($messages, fn($m) => $m['from_id'] == $userId)) === 0): ?>
                            <p style="text-align:center; color:#a73c48; font-size:1.1rem;">Aucun message envoyé pour l'instant.
                            </p>
                        <?php endif; ?>
                    <?php else: ?>
                        <p style="text-align:center; color:#a73c48; font-size:1.1rem;">Aucun message envoyé pour l'instant.
                        </p>
                    <?php endif; ?>
                </div>
                <form method="post" action="/messagerie_user/messagerie_user" class="messagerie-form">
                    <textarea name="message" placeholder="Votre message..." required
                        class="messagerie-textarea"></textarea>
                    <button type="submit" class="oval-button">Envoyer</button>
                </form>
            </section>
        </div>
    </main>
    <?php require_once("view/autres_pages/footer.php"); ?>
</body>

</html>