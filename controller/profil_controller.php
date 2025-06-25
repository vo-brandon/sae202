<?php

require_once __DIR__ . '/../model/profil_model.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /');
    exit;
}

$user = get_user_by_id($_SESSION['user']['id']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $mail = $_POST['mail'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $date_naissance = $_POST['date_naissance'] ?? '';
    if ($prenom && $nom && $mail && $telephone && $date_naissance) {
        update_user($user['id'], $prenom, $nom, $mail, $telephone, $date_naissance);
        $_SESSION['user'] = get_user_by_id($user['id']);
        header('Location: /admin/view/profil_view.php?success=1');
        exit;
    }
}

function index()
{
    global $user;
    include __DIR__ . '/../view/profil_view.php';
}

