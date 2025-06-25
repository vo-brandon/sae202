<?php
// admin/view/profil_view.php
if (!isset($_SESSION))
    session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /');
    exit;
}
require_once __DIR__ . '/../model/profil_model.php';
$user = get_user_by_id($_SESSION['user']['id']);
include __DIR__ . '/autres_pages/header.php';
?>
<link rel="stylesheet" href="/view/css/style.css">
<main>
    <div id="page-max-width">
        <div class="profil-container">
            <h1 class="title" style="margin-bottom: 10px;">Mon profil</h1>
            <?php if (isset($_GET['success'])): ?>
                <div class="success-message">Profil mis à jour !</div>
            <?php endif; ?>
            <form method="post" class="profil-form">
                <div class="profil-form-group">
                    <label>Prénom :</label>
                    <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom'] ?? '') ?>" required>
                </div>
                <div class="profil-form-group">
                    <label>Nom :</label>
                    <input type="text" name="nom" value="<?= htmlspecialchars($user['nom'] ?? '') ?>" required>
                </div>
                <div class="profil-form-group">
                    <label>Email :</label>
                    <input type="email" name="mail" value="<?= htmlspecialchars($user['mail'] ?? '') ?>" required>
                </div>
                <div class="profil-form-group">
                    <label>Téléphone :</label>
                    <input type="text" name="telephone" value="<?= htmlspecialchars($user['telephone'] ?? '') ?>"
                        required>
                </div>
                <div class="profil-form-group">
                    <label>Date de naissance :</label>
                    <input type="date" name="date_naissance"
                        value="<?= htmlspecialchars($user['date_naissance'] ?? '') ?>" required>
                </div>
                <button type="submit" class="oval-button" style="margin-top: 20px;">Enregistrer</button>
            </form>
        </div>
    </div>
</main>
<?php include __DIR__ . '/autres_pages/footer.php'; ?>