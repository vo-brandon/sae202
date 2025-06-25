<?php
require_once(__DIR__ . '/../../conf/conf.inc.php');

function get_commentaires($statut = 'valide')
{
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT c.*, u.prenom, u.nom FROM commentaires c JOIN users u ON c.user_id = u.id WHERE c.statut = ? ORDER BY c.date_creation DESC");
    $stmt->execute([$statut]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_commentaires_attente()
{
    return get_commentaires('attente');
}

function valider_commentaire($id)
{
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("UPDATE commentaires SET statut = 'valide' WHERE id = ?");
    $stmt->execute([$id]);
}

function refuser_commentaire($id)
{
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("UPDATE commentaires SET statut = 'refuse' WHERE id = ?");
    $stmt->execute([$id]);
}

function supprimer_commentaire($id)
{
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("DELETE FROM commentaires WHERE id = ?");
    $stmt->execute([$id]);
}
