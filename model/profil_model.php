<?php

require_once(__DIR__ . '/../conf/conf.inc.php');

function get_user_by_id($id)
{
    $pdo = getDB();
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function update_user($id, $prenom, $nom, $mail, $telephone, $date_naissance)
{
    $pdo = getDB();
    $stmt = $pdo->prepare('UPDATE users SET prenom = ?, nom = ?, mail = ?, telephone = ?, date_naissance = ? WHERE id = ?');
    return $stmt->execute([$prenom, $nom, $mail, $telephone, $date_naissance, $id]);
}
