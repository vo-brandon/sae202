<?php
require_once("model/inscription_model.php");

function index()
{
    $msg = null;
    require('view/inscription_view.php');
}

function inscription()
{
    $msg = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $prenom = $_POST['prenom'] ?? '';
        $nom = $_POST['nom'] ?? '';
        $mail = $_POST['mail'] ?? '';
        $telephone = $_POST['telephone'] ?? '';
        $date_naissance = $_POST['date_naissance'] ?? '';
        $mdp = $_POST['mdp'] ?? '';
        $mdp_confirm = $_POST['mdp_confirm'] ?? '';
        $res = inscription_user($prenom, $nom, $mail, $telephone, $date_naissance, $mdp, $mdp_confirm);
        if ($res === true) {
            header('Location: /connexion?msg=inscription');
            exit;
        } else {
            $msg = $res;
        }
    }
    require('view/inscription_view.php');
}
