<?php
require_once("conf/conf.inc.php");
function connexion_user($mail, $mdp)
{
    try {
        $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT id, prenom, nom, mdp, role FROM users WHERE mail = ?");
        $stmt->execute([$mail]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($mdp, $user['mdp'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'prenom' => $user['prenom'],
                'nom' => $user['nom'],
                'mail' => $mail,
                'role' => $user['role']
            ];
            return true;
        }
        return "les identifiants sont invalides";
    } catch (PDOException $e) {
        return "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
