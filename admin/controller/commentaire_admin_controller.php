<?php
require_once(__DIR__ . '/../model/commentaire_back_model.php');
if (!isset($_SESSION))
    session_start();
function commentaire_admin_index()
{
    $commentaires = get_commentaires('valide');
    $attente = get_commentaires_attente();
    require_once(__DIR__ . '/../view/commentaire_admin_view.php');
}
function index()
{
    commentaire_admin_index();
}
function valider()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /');
        exit;
    }
    if (isset($_GET['id'])) {
        valider_commentaire((int) $_GET['id']);
    }
    header('Location: /commentaire');
    exit;
}
function refuser()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /');
        exit;
    }
    if (isset($_GET['id'])) {
        refuser_commentaire((int) $_GET['id']);
    }
    header('Location: /commentaire');
    exit;
}
function supprimer()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /');
        exit;
    }
    if (isset($_GET['id'])) {
        supprimer_commentaire((int) $_GET['id']);
    }
    header('Location: /commentaire');
    exit;
}
