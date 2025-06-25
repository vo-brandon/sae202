<?php
if (!isset($_SESSION))
    session_start();
require_once(__DIR__ . '/autres_pages/header_admin.php');
?>
<div id="contenu">
    <h1>Messagerie Admin</h1>
    <div class="messagerie-admin-layout">
        <div class="messagerie-users-list">
            <h3>Utilisateurs</h3>
            <?php foreach ($users as $u): ?>
                <?php $notif = getUnreadCount($adminId, $u['id']); ?>
                <a href="/admin/messagerie?user=<?= $u['id'] ?>"
                    class="messagerie-user-link<?= $selectedUser == $u['id'] ? ' selected' : '' ?>">
                    <?= htmlspecialchars($u['prenom'] . ' ' . $u['nom']) ?>
                    <?php if ($notif > 0): ?>
                        <span class="messagerie-notif"></span>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="messagerie-admin-conversation">
            <?php

            $selectedUserData = null;
            foreach ($users as $u) {
                if ($selectedUser == $u['id']) {
                    $selectedUserData = $u;
                    break;
                }
            }
            ?>
            <?php if ($selectedUser): ?>
                <h2>Conversation avec
                    <?= $selectedUserData ? htmlspecialchars($selectedUserData['prenom'] . ' ' . $selectedUserData['nom']) : "l'utilisateur" ?>
                </h2>
                <form method="post" action="/admin/messagerie?user=<?= $selectedUser ?>" class="messagerie-form">
                    <textarea name="message" placeholder="Votre message..." required class="messagerie-textarea"></textarea>
                    <button type="submit" class="btn">Envoyer</button>
                </form>
                <h3>Historique</h3>
                <?php if (empty($messages)): ?>
                    <p>Aucun message pour l'instant.</p>
                <?php else: ?>
                    <ul class="messagerie-list">
                        <?php foreach ($messages as $msg): ?>
                            <li class="messagerie-item <?= $msg['from_id'] == $adminId ? 'admin' : 'user' ?>">
                                <strong>
                                    <?php if ($msg['from_id'] == $adminId): ?>
                                        Vous
                                    <?php else: ?>
                                        <?= $selectedUserData ? htmlspecialchars($selectedUserData['prenom'] . ' ' . $selectedUserData['nom']) : 'Utilisateur' ?>
                                    <?php endif; ?>
                                </strong><br>
                                <span class="messagerie-date">le <?= date('d/m/Y H:i', strtotime($msg['created_at'])) ?></span>
                                <p class="messagerie-content"> <?= nl2br(htmlspecialchars($msg['content'])) ?> </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            <?php else: ?>
                <p>Sélectionnez un utilisateur pour discuter.</p>
            <?php endif; ?>
        </div>
    </div>
</div>