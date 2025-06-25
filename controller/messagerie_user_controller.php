<?php
require_once('model/message_front_model.php');
if (!isset($_SESSION))
    session_start();

function messagerie_user()
{
    if (!isset($_SESSION['user'])) {
        header('Location: /connexion');
        exit;
    }
    $adminId = getAdminId();
    $userId = $_SESSION['user']['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message'])) {
        sendMessage($userId, $adminId, htmlspecialchars($_POST['message']));
        header('Location: /messagerie_user');
        exit;
    }
    $messages = getMessages($userId, $adminId);
    require('view/messagerie_user_view.php');
}

function index()
{
    messagerie_user();
}
