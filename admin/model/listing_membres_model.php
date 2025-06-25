<?php
require_once(__DIR__ . '/../../conf/conf.inc.php');

function get_all_users($search = '', $sort = 'id', $order = 'ASC')
{
    $pdo = getDB();
    $allowedSort = ['id', 'prenom', 'nom', 'mail', 'telephone', 'role'];
    if (!in_array($sort, $allowedSort))
        $sort = 'nom';
    $order = strtoupper($order) === 'DESC' ? 'DESC' : 'ASC';
    $where = '';
    $params = [];
    if ($search !== '') {
        $where = "WHERE prenom LIKE :search OR nom LIKE :search OR mail LIKE :search OR telephone LIKE :search";
        $params[':search'] = "%$search%";
    }
    $sql = "SELECT id, prenom, nom, mail, telephone, role, date_naissance FROM users $where ORDER BY $sort $order";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function update_user($id, $prenom, $nom, $mail, $telephone, $date_naissance)
{
    $pdo = getDB();
    $stmt = $pdo->prepare("UPDATE users SET prenom = ?, nom = ?, mail = ?, telephone = ?, date_naissance = ? WHERE id = ?");
    return $stmt->execute([$prenom, $nom, $mail, $telephone, $date_naissance, $id]);
}

function delete_user($id)
{
    $pdo = getDB();
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    return $stmt->execute([$id]);
}
