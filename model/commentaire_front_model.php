<?php
require_once("conf/conf.inc.php");

function ajouter_commentaire($user_id, $contenu)
{
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO commentaires (user_id, contenu, statut, date_creation) VALUES (?, ?, 'attente', NOW())");
    $stmt->execute([$user_id, $contenu]);
    return true;
}

function get_commentaires_valides()
{
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT c.*, u.prenom, u.nom FROM commentaires c JOIN users u ON c.user_id = u.id WHERE c.statut = 'valide' ORDER BY c.date_creation DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_commentaires_attente_by_user($user_id)
{
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT c.*, u.prenom, u.nom FROM commentaires c JOIN users u ON c.user_id = u.id WHERE c.statut = 'attente' AND c.user_id = ? ORDER BY c.date_creation DESC");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function supprimer_commentaire_user($commentaire_id, $user_id)
{
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("DELETE FROM commentaires WHERE id = ? AND user_id = ?");
    return $stmt->execute([$commentaire_id, $user_id]);
}
