<?php
require_once("model/connexion_model.php");
session_start();

function index()
{
    $msg = null;
    if (isset($_GET['msg']) && $_GET['msg'] === 'inscription') {
        $msg = "Inscription réussie. Vous pouvez vous connecter.";
    }
    require('view/connexion_view.php');
}

function connexion()
{
    $msg = null;
    if (isset($_GET['msg']) && $_GET['msg'] === 'inscription') {
        $msg = "Inscription réussie. Vous pouvez vous connecter.";
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mail = $_POST['mail'] ?? '';
        $mdp = $_POST['mdp'] ?? '';
        $res = connexion_user($mail, $mdp);
        if ($res === true) {
            header('Location: /');
            exit;
        } else {
            $msg = $res;
        }
    }
    require('view/connexion_view.php');
}
