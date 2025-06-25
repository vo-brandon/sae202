<?php
require_once('conf/conf.inc.php');

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

function getUnreadCount($userId, $adminId)
{
    $db = getDB();
    $stmt = $db->prepare("SELECT COUNT(*) as nb FROM messages WHERE to_id = ? AND from_id = ? AND lu = 0");
    $stmt->execute([$userId, $adminId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['nb'] : 0;
}

function setMessagesRead($userId, $adminId)
{
    $db = getDB();
    $stmt = $db->prepare("UPDATE messages SET lu = 1 WHERE to_id = ? AND from_id = ? AND lu = 0");
    $stmt->execute([$userId, $adminId]);
}
