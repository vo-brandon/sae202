<?php
if (!isset($_SESSION))
    session_start();
require_once("view/autres_pages/header.php");
?>
<div id="contenu">
    <h1>Commentaire envoyé</h1>
    <p>Votre commentaire a bien été envoyé et est en attente de validation par un administrateur.</p>
    <a href="/commentaire" class="btn-retour">Retour aux commentaires</a>
</div>
<?php require_once("view/autres_pages/footer.php"); ?>