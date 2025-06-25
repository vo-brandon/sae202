<?php
function index()
{
    require_once(__DIR__ . '/../model/message_back_model.php');
    if (!isset($_SESSION))
        session_start();
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /');
        exit;
    }
    $users = getUserList();
    $adminId = getAdminId();
    $selectedUser = isset($_GET['user']) ? intval($_GET['user']) : null;

    if (
        $_SERVER['REQUEST_METHOD'] === 'POST' &&
        $selectedUser &&
        !empty($_POST['message'])
    ) {
        sendMessage($adminId, $selectedUser, htmlspecialchars($_POST['message']));
        header('Location: /admin/messagerie?user=' . $selectedUser);
        exit;
    }

    $messages = [];
    if ($selectedUser) {
        $messages = getMessages($selectedUser, $adminId);
    }

    require_once(__DIR__ . '/../view/messagerie_admin_view.php');
}

