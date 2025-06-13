<?php
require_once("conf/conf.inc.php");
function inscription_user($prenom, $nom, $mail, $mdp, $mdp_confirm, $role = 'client')
{
    $prenom = ucfirst(strtolower($prenom));
    $nom = ucwords(strtolower($nom));

    if ($mdp !== $mdp_confirm) {
        return "Les mots de passe ne correspondent pas";
    }
    try {
        $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT id FROM users WHERE mail = ?");
        $stmt->execute([$mail]);
        if ($stmt->fetch()) {
            return "Ce mail est déjà pris";
        }
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (prenom, nom, mail, mdp, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$prenom, $nom, $mail, $hash, $role]);
        return true;
    } catch (PDOException $e) {
        return "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
