<?php
require_once(__DIR__ . '/../../conf/conf.inc.php');
function getUserList()
{
    $db = getDB();
    $stmt = $db->query("SELECT id, prenom, nom, mail FROM users WHERE role != 'admin'");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getMessages($userId, $adminId)
{
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM messages WHERE (from_id = :userId AND to_id = :adminId) OR (from_id = :adminId AND to_id = :userId) ORDER BY created_at ASC");
    $stmt->execute(['userId' => $userId, 'adminId' => $adminId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function sendMessage($fromId, $toId, $content)
{
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO messages (from_id, to_id, content, created_at, lu) VALUES (?, ?, ?, NOW(), 0)");
    return $stmt->execute([$fromId, $toId, $content]);
}
function getAdminId()
{
    $db = getDB();
    $stmt = $db->query("SELECT id FROM users WHERE role = 'admin' LIMIT 1");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['id'] : null;
}
function getUnreadCount($adminId, $userId)
{
    $db = getDB();
    $stmt = $db->prepare("SELECT COUNT(*) as nb FROM messages WHERE to_id = ? AND from_id = ? AND lu = 0");
    $stmt->execute([$adminId, $userId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['nb'] : 0;
}
