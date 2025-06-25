<?php
require_once("model/commentaire_front_model.php");
session_start();


function commentaire_user_index()
{
    $commentaires = get_commentaires_valides();
    require('view/commentaire_view.php');
}

function ajouter_commentaire_user()
{
    if (!isset($_SESSION['user'])) {
        header('Location: /connexion');
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $contenu = trim($_POST['contenu'] ?? '');
        if ($contenu !== '') {
            ajouter_commentaire($_SESSION['user']['id'], $contenu);
        }
    }
    header('Location: /commentaire');
    exit;
}

function ajouter()
{
    ajouter_commentaire_user();
}

function supprimer()
{
    if (!isset($_SESSION['user'])) {
        header('Location: /connexion');
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $commentaire_id = (int) $_POST['id'];
        $user_id = $_SESSION['user']['id'];
        supprimer_commentaire_user($commentaire_id, $user_id);
    }
    header('Location: /commentaire');
    exit;
}

function index()
{
    commentaire_user_index();
}
