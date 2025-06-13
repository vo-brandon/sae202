<?php
if (!isset($_SESSION))
    session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: /');
    exit;
}

require_once("model/connexion_model.php");
require_once("conf/conf.inc.php");

$pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: /panel_membres');
    exit;
}

if (isset($_POST['edit_id'])) {
    $id = (int) $_POST['edit_id'];
    $prenom = ucfirst(strtolower(trim($_POST['edit_prenom'])));
    $nom = ucwords(strtolower(trim($_POST['edit_nom'])));
    $mail = trim($_POST['edit_mail']);
    $stmt = $pdo->prepare("UPDATE users SET prenom = ?, nom = ?, mail = ? WHERE id = ?");
    $stmt->execute([$prenom, $nom, $mail, $id]);
    header('Location: /panel_membres');
    exit;
}

$users = $pdo->query("SELECT id, prenom, nom, mail, role FROM users ORDER BY nom, prenom")->fetchAll(PDO::FETCH_ASSOC);
?>
<a href="/" class="btn-retour">&#8592; Accueil</a>
<link href="/view/css/cssbase.css" type="text/css" rel="stylesheet" />
<div id="contenu">
    <h1>Panel des membres</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['prenom']) ?></td>
                    <td><?= htmlspecialchars($user['nom']) ?></td>
                    <td><?= htmlspecialchars($user['mail']) ?></td>
                    <td><?= htmlspecialchars($user['role']) ?></td>
                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="edit_id" value="<?= $user['id'] ?>">
                            <input type="text" name="edit_prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required
                                style="width:90px;">
                            <input type="text" name="edit_nom" value="<?= htmlspecialchars($user['nom']) ?>" required
                                style="width:90px;">
                            <input type="email" name="edit_mail" value="<?= htmlspecialchars($user['mail']) ?>" required
                                style="width:150px;">
                            <button type="submit">Modifier</button>
                        </form>
                        <a href="?delete=<?= $user['id'] ?>" onclick="return confirm('Supprimer ce membre ?');"
                            style="color:red; margin-left:10px;">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>