<?php
require_once('conf/conf.inc.php');

function get_sessions()
{
    global $pdo;
    if (!isset($pdo)) {
        $pdo = getDB();
    }
    $stmt = $pdo->query('SELECT * FROM sessions ORDER BY date_session ASC');
    return $stmt->fetchAll();
}

function creer_reservation($user_id, $billet, $date_reservation, $quantite = 1)
{
    global $pdo;
    if (!isset($pdo)) {
        $pdo = getDB();
    }
    $stmt = $pdo->prepare('INSERT INTO reservations (user_id, billet, date_reservation, quantite) VALUES (?, ?, ?, ?)');
    return $stmt->execute([$user_id, $billet, $date_reservation, $quantite]);
}

function get_reservations_by_user($user_id)
{
    global $pdo;
    if (!isset($pdo)) {
        $pdo = getDB();
    }
    $stmt = $pdo->prepare('SELECT * FROM reservations WHERE user_id = ? ORDER BY date_reservation DESC');
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}

function get_reservation($id)
{
    global $pdo;
    if (!isset($pdo)) {
        $pdo = getDB();
    }
    $stmt = $pdo->prepare('SELECT * FROM reservations WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}
