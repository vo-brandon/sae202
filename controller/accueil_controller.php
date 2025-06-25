<?php
function index()
{
    require('view/autres_pages/header.php');
    require('view/accueil_view.php');
    require('view/autres_pages/footer.php');
}

function inscription()
{
    require_once("controller/auth_controller.php");
    $msg = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $prenom = $_POST['prenom'] ?? '';
        $nom = $_POST['nom'] ?? '';
        $mail = $_POST['mail'] ?? '';
        $mdp = $_POST['mdp'] ?? '';
        $mdp_confirm = $_POST['mdp_confirm'] ?? '';
        $res = inscription($prenom, $nom, $mail, $mdp, $mdp_confirm);
        if ($res === true) {
            header('Location: /?action=connexion&msg=inscription');
            exit;
        } else {
            $msg = $res;
        }
    }
    require('view/inscription_view.php');
    if ($msg)
        echo '<p style="color:red">' . $msg . '</p>';
}

function connexion()
{
    require_once("controller/auth_controller.php");
    $msg = null;
    if (isset($_GET['msg']) && $_GET['msg'] === 'inscription') {
        $msg = "Inscription réussie. Vous pouvez vous connecter.";
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mail = $_POST['mail'] ?? '';
        $mdp = $_POST['mdp'] ?? '';
        $res = connexion($mail, $mdp);
        if ($res === true) {
            header('Location: /');
            exit;
        } else {
            $msg = $res;
        }
    }
    require('view/connexion_view.php');
    if ($msg)
        echo '<p style="color:red">' . $msg . '</p>';
}

function deconnexion()
{
    require_once("controller/auth_controller.php");
    deconnexion();
    header('Location: /');
    exit;
}

function messagerie_user()
{
    require_once('controller/messagerie_controller.php');
    messagerie_user();
}

function messagerie_admin()
{
    require_once('controller/messagerie_controller.php');
    messagerie_admin();
}
?>