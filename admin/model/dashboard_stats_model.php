<?php
require_once(__DIR__ . '/../../conf/conf.inc.php');

function get_dashboard_stats()
{
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $users = $pdo->query("SELECT COUNT(*) FROM users WHERE role != 'admin'")->fetchColumn();
    $reservations = $pdo->query("SELECT COUNT(*) FROM reservations")->fetchColumn();
    $commentaires = $pdo->query("SELECT COUNT(*) FROM commentaires")->fetchColumn();
    $messages = $pdo->query("SELECT COUNT(*) FROM messages")->fetchColumn();
    return [
        'users' => $users,
        'reservations' => $reservations,
        'commentaires' => $commentaires,
        'messages' => $messages
    ];
}
