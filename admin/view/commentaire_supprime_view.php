<?php
if (!isset($_SESSION))
    session_start();
require_once(__DIR__ . '/autres_pages/header_admin.php');
?>
<div id="contenu">
    <h1>Commentaire supprimé</h1>
    <p>Le commentaire a bien été supprimé.</p>
    <a href="/admin/controller/commentaire_admin_controller.php?submenu=commentaires" class="btn-retour">Retour à la
        gestion des commentaires</a>
</div>