<?php
if (!isset($_SESSION))
    session_start();
require_once("view/autres_pages/header.php");
require_once("model/commentaire_front_model.php");
?>
<style>
    #contenu {
        max-width: 900px;
        margin: 40px auto;
        background: #f2e5d0;
        border-radius: 24px;
        box-shadow: 0 4px 24px rgba(167, 60, 72, 0.10);
        padding: 40px 32px 32px 32px;
    }

    .commentaire-form {
        display: flex;
        flex-direction: column;
        gap: 16px;
        margin-bottom: 32px;
        background: #fff8f6;
        border-radius: 16px;
        padding: 24px 20px;
        box-shadow: 0 2px 12px rgba(167, 60, 72, 0.07);
        width: 100%;
    }

    .commentaire-textarea {
        min-height: 120px;
        border-radius: 10px;
        border: 1px solid #a73c48;
        padding: 12px;
        font-size: 1.08rem;
        resize: vertical;
        background: #fff;
        color: #1e1e1e;
        transition: border 0.2s;
    }

    .commentaire-textarea:focus {
        outline: none;
        border: 2px solid #d37f7f;
    }

    .commentaire-form button[type="submit"] {
        background: #a73c48;
        color: #fff;
        border: none;
        border-radius: 100px;
        padding: 10px 32px;
        font-weight: 700;
        font-size: 1.1rem;
        cursor: pointer;
        align-self: flex-end;
        transition: background 0.2s;
    }

    .commentaire-form button[type="submit"]:hover {
        background: #d37f7f;
        color: #fff;
    }

    .commentaire-list {
        list-style: none;
        padding: 0;
        margin: 0 0 24px 0;
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .commentaire-item {
        background: #fff8f6;
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(167, 60, 72, 0.07);
        padding: 20px 28px;
        font-size: 1.08rem;
        color: #1e1e1e;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .commentaire-header {
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 600;
        color: #a73c48;
        font-family: 'Kalnia', serif;
    }

    .commentaire-date {
        font-size: 0.95em;
        color: #d37f7f;
        margin-bottom: 2px;
    }

    .commentaire-content {
        margin: 0;
        word-break: break-word;
        color: #1e1e1e;
    }

    .btn-supprimer-commentaire {
        background: #fff;
        color: #a73c48;
        border: 1px solid #a73c48;
        border-radius: 100px;
        padding: 6px 18px;
        font-weight: 600;
        font-size: 1rem;
        margin-left: 8px;
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
    }

    .btn-supprimer-commentaire:hover {
        background: #a73c48;
        color: #fff;
    }

    @media (max-width: 900px) {
        #contenu {
            padding: 18px 4px;
        }

        .commentaire-form {
            padding: 12px 4px;
        }
    }
</style>
<div id="contenu">
    <h1 style="font-family:'Kalnia',serif;font-size:2.2rem;color:var(--primary);margin-bottom:28px;">Commentaires</h1>
    <form method="post" action="/commentaire/ajouter" class="commentaire-form">
        <textarea name="contenu" placeholder="Votre commentaire..." required class="commentaire-textarea"></textarea>
        <button type="submit">Poster</button>
    </form>
    <h2 style="font-family:'Kalnia',serif;color:var(--secondary);margin-top:32px;">Vos commentaires en attente de
        validation</h2>
    <?php if (empty($commentaires_attente)): ?>
        <p style="color:var(--primary);margin-bottom:18px;">Aucun commentaire en attente.</p>
    <?php else: ?>
        <ul class="commentaire-list">
            <?php foreach ($commentaires_attente as $c): ?>
                <li class="commentaire-item attente">
                    <div class="commentaire-header"><strong><?= htmlspecialchars($c['prenom']) ?>
                            <?= htmlspecialchars($c['nom']) ?></strong></div>
                    <span class="commentaire-date attente">le <?= date('d/m/Y H:i', strtotime($c['date_creation'])) ?> (En
                        attente)</span>
                    <p class="commentaire-content"> <?= nl2br(htmlspecialchars($c['contenu'])) ?> </p>
                    <form method="post" action="/commentaire/supprimer" style="display:inline; margin-top:8px;">
                        <input type="hidden" name="id" value="<?= (int) $c['id'] ?>">
                        <button type="submit" class="btn-supprimer-commentaire"
                            onclick="return confirm('Supprimer ce commentaire ?');">Supprimer
                        </button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <h2 style="font-family:'Kalnia',serif;color:var(--secondary);margin-top:32px;">Commentaires validés</h2>
    <?php if (empty($commentaires)): ?>
        <p style="color:var(--primary);margin-bottom:18px;">Aucun commentaire pour le moment.</p>
    <?php else: ?>
        <ul class="commentaire-list">
            <?php foreach ($commentaires as $c): ?>
                <li class="commentaire-item valide">
                    <div class="commentaire-header"><strong><?= htmlspecialchars($c['prenom']) ?>
                            <?= htmlspecialchars($c['nom']) ?></strong></div>
                    <span class="commentaire-date">le <?= date('d/m/Y H:i', strtotime($c['date_creation'])) ?></span>
                    <p class="commentaire-content"> <?= nl2br(htmlspecialchars($c['contenu'])) ?> </p>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $c['user_id']): ?>
                        <form method="post" action="/commentaire/supprimer" style="display:inline; margin-top:8px;">
                            <input type="hidden" name="id" value="<?= (int) $c['id'] ?>">
                            <button type="submit" class="btn-supprimer-commentaire"
                                onclick="return confirm('Supprimer ce commentaire validé ?');">Supprimer
                            </button>
                        </form>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<?php require_once("view/autres_pages/footer.php"); ?>