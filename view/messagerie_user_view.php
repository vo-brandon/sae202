<?php
if (!isset($_SESSION))
    session_start();
require_once("view/autres_pages/header.php");

if (isset($_SESSION['user']) && ($_SESSION['user']['role'] ?? '') === 'admin') {
    header('Location: /');
    exit();
}
?>
<link rel="stylesheet" href="/view/css/style.css">
<div id="contenu" class="messagerie-user-contenu">
    <h1 class="title">Messagerie avec l'Admin</h1>
    <form method="post" action="/messagerie_user/messagerie_user" class="messagerie-form">
        <textarea name="message" placeholder="Votre message..." required class="messagerie-textarea"></textarea>
        <button type="submit" class="oval-button">Envoyer</button>
    </form>
    <h2 class="title" style="margin-top:32px;">Historique</h2>
    <?php if (empty($messages)): ?>
        <p style="text-align:center; color:#a73c48; font-size:1.1rem;">Aucun message pour l'instant.</p>
    <?php else: ?>
        <ul class="messagerie-list">
            <?php foreach ($messages as $msg): ?>
                <li class="messagerie-item <?= $msg['from_id'] == $userId ? 'user' : 'admin' ?>">
                    <strong style="color:#a73c48; font-size:1.08rem;">
                        <?= $msg['from_id'] == $userId ? 'Vous' : 'Admin' ?>
                    </strong><br>
                    <span class="messagerie-date">le <?= date('d/m/Y H:i', strtotime($msg['created_at'])) ?></span>
                    <p class="messagerie-content"> <?= nl2br(htmlspecialchars($msg['content'])) ?> </p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<?php require_once("view/autres_pages/footer.php"); ?>