<?php
require_once(__DIR__ . '/../../conf/conf.inc.php');

function get_all_reservations()
{
    global $pdo;
    if (!isset($pdo)) {
        $pdo = getDB();
    }
    $stmt = $pdo->query('SELECT r.*, u.prenom, u.nom FROM reservations r JOIN users u ON r.user_id = u.id ORDER BY r.date_reservation DESC');
    return $stmt->fetchAll();
}

function supprimer_reservation($id)
{
    global $pdo;
    if (!isset($pdo)) {
        $pdo = getDB();
    }
    $stmt = $pdo->prepare('DELETE FROM reservations WHERE id = ?');
    return $stmt->execute([$id]);
}

function modifier_reservation($id, $date_reservation, $statut)
{
    global $pdo;
    if (!isset($pdo)) {
        $pdo = getDB();
    }
    $stmt = $pdo->prepare('UPDATE reservations SET date_reservation = ?, statut = ? WHERE id = ?');
    return $stmt->execute([$date_reservation, $statut, $id]);
}

function get_sessions()
{
    global $pdo;
    if (!isset($pdo)) {
        $pdo = getDB();
    }
    $stmt = $pdo->query('SELECT * FROM sessions ORDER BY date_session ASC');
    return $stmt->fetchAll();
}

function add_session($date_session, $label)
{
    global $pdo;
    if (!isset($pdo)) {
        $pdo = getDB();
    }
    $stmt = $pdo->prepare('INSERT INTO sessions (date_session, label) VALUES (?, ?)');
    return $stmt->execute([$date_session, $label]);
}

function delete_session($id)
{
    global $pdo;
    if (!isset($pdo)) {
        $pdo = getDB();
    }
    $stmt = $pdo->prepare('DELETE FROM sessions WHERE id = ?');
    return $stmt->execute([$id]);
}
