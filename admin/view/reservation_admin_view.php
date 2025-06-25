<?php
include __DIR__ . '/autres_pages/header_admin.php';
?>
<style>
    .container-admin {
        max-width: 1500px;
        min-width: 320px;
        margin: 40px auto;
        background: #f2e5d0;
        border-radius: 24px;
        box-shadow: 0 4px 24px rgba(167, 60, 72, 0.10);
        padding: 40px 32px 32px 32px;
    }

    .table-reservations {
        width: 100%;
        min-width: 900px;
        max-width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(167, 60, 72, 0.07);
        font-size: 1.08rem;
        margin-bottom: 32px;
    }

    .table-reservations th,
    .table-reservations td {
        padding: 20px 18px;
        text-align: center;
        background: #fff;
        border-bottom: 1px solid #eee;
        font-size: 1.08rem;
    }

    .table-reservations th {
        background: #a73c48;
        color: #f2e5d0;
        font-weight: 700;
        border-radius: 10px 10px 0 0;
        letter-spacing: 1px;
        font-family: 'Kalnia', serif;
    }

    .table-reservations tr:last-child td {
        border-bottom: none;
    }

    .table-reservations tr {
        transition: background 0.2s;
    }

    .table-reservations tr:hover td {
        background: #f8f3f1;
    }

    .btn,
    .btn-primary,
    .btn-danger,
    .btn-success {
        border-radius: 100px;
        border: none;
        padding: 10px 32px;
        font-size: 1.08rem;
        font-family: 'Bree Serif', serif;
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
        margin: 0 4px;
    }

    .btn-primary {
        background: #3b4a34;
        color: #fff;
    }

    .btn-primary:hover {
        background: #a73c48;
        color: #fff;
    }

    .btn-danger {
        background: #a73c48;
        color: #fff;
    }

    .btn-danger:hover {
        background: #d37f7f;
        color: #fff;
    }

    .btn-success {
        background: #1a7f1a;
        color: #fff;
    }

    .btn-success:hover {
        background: #145c14;
        color: #fff;
    }

    .form-add-session {
        display: flex;
        gap: 32px;
        align-items: end;
        margin-bottom: 32px;
        width: 100%;
        max-width: 1200px;
    }

    .form-add-session .form-group {
        flex: 1 1 0;
        min-width: 220px;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .form-add-session label {
        font-family: 'Kalnia', serif;
        color: #a73c48;
        font-size: 1.15rem;
    }

    .form-add-session .input {
        border-radius: 100px;
        border: 1.5px solid #a73c48;
        padding: 16px 24px;
        font-size: 1.1rem;
        background: #f8f8f8;
        color: #1e1e1e;
        outline: none;
        transition: border 0.2s;
        width: 100%;
        min-width: 180px;
        max-width: 100%;
    }

    .form-add-session .input:focus {
        border: 2px solid #d37f7f;
    }

    .oval-button {
        border-radius: 100px;
        border: none;
        padding: 16px 38px;
        font-size: 1.1rem;
        font-family: 'Bree Serif', serif;
        background: #a73c48;
        color: #fff;
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
        margin-left: 12px;
    }

    .oval-button:hover {
        background: #d37f7f;
        color: #fff;
    }

    .subtitle {
        font-family: 'Kalnia', serif;
        color: #d37f7f;
        margin-top: 40px;
        margin-bottom: 18px;
        font-size: 1.35rem;
    }

    .alert {
        background: #e6fae6;
        color: #1a7f1a;
        border: 1px solid #1a7f1a;
        border-radius: 8px;
        padding: 12px 22px;
        margin-bottom: 22px;
        text-align: center;
        font-size: 1.05rem;
        font-weight: 600;
    }

    @media (max-width: 1200px) {
        .container-admin {
            max-width: 98vw;
        }

        .table-reservations {
            min-width: 600px;
        }

        .form-add-session {
            max-width: 98vw;
            gap: 12px;
        }
    }

    @media (max-width: 900px) {
        .container-admin {
            padding: 18px 4px;
            max-width: 100vw;
        }

        .table-reservations {
            font-size: 0.95rem;
            min-width: 320px;
        }

        .form-add-session {
            flex-direction: column;
            align-items: stretch;
            max-width: 100vw;
        }

        .form-add-session .form-group {
            min-width: 0;
        }
    }
</style>
<div class="container container-admin">
    <h2 style="font-family:'Kalnia',serif;font-size:2rem;color:var(--primary);margin-bottom:28px;">Gestion des
        réservations</h2>
    <?php if (!empty($message))
        echo "<div class='alert'>$message</div>"; ?>
    <table class="table-reservations">
        <tr>
            <th>Client</th>
            <th>Billet</th>
            <th>Date</th>
            <th>Statut</th>
            <th>Réservée le</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($reservations as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r['prenom'] . ' ' . $r['nom']) ?></td>
                <td><?= htmlspecialchars($r['billet']) ?></td>
                <td>
                    <?php
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $r['date_reservation']);
                    if ($date) {
                        setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');
                        echo ucfirst(strftime('%A %d %B %Y', $date->getTimestamp())) . ' à ' . $date->format('H\hi');
                    } else {
                        echo htmlspecialchars($r['date_reservation']);
                    }
                    ?>
                </td>
                <td>
                    <?php if ($r['statut'] === 'en attente'): ?>
                        <form method="post" style="display:inline-flex;gap:6px;align-items:center;">
                            <input type="hidden" name="edit_id" value="<?= $r['id'] ?>">
                            <input type="hidden" name="edit_statut" value="confirmée">
                            <input type="hidden" name="edit_date" value="<?= htmlspecialchars($r['date_reservation']) ?>">
                            <button type="submit" class="btn btn-success">Valider</button>
                        </form>
                        <form method="post" style="display:inline-flex;gap:6px;align-items:center;">
                            <input type="hidden" name="edit_id" value="<?= $r['id'] ?>">
                            <input type="hidden" name="edit_statut" value="annulée">
                            <input type="hidden" name="edit_date" value="<?= htmlspecialchars($r['date_reservation']) ?>">
                            <button type="submit" class="btn btn-danger">Refuser</button>
                        </form>
                    <?php elseif ($r['statut'] === 'confirmée'): ?>
                        <span style="color:#1a7f1a; font-weight:600;">Validée</span>
                    <?php elseif ($r['statut'] === 'annulée'): ?>
                        <span style="color:#a73c48; font-weight:600;">Refusée</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php
                    $created = DateTime::createFromFormat('Y-m-d H:i:s', $r['created_at']);
                    if ($created) {
                        setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');
                        echo ucfirst(strftime('%A %d %B %Y', $created->getTimestamp())) . ' à ' . $created->format('H\hi');
                    } else {
                        echo htmlspecialchars($r['created_at']);
                    }
                    ?>
                </td>
                <td style="display:flex; gap:8px; justify-content:center;align-items:center;">
                    <form method="post" class="form-inline" style="display:inline-flex;gap:6px;align-items:center;">
                        <input type="hidden" name="edit_id" value="<?= $r['id'] ?>">
                        <input type="hidden" name="edit_statut" value="<?= $r['statut'] ?>">
                        <select name="edit_date" required class="input" style="margin-right:6px;min-width:120px;">
                            <?php foreach ($sessions as $session): ?>
                                <option value="<?= htmlspecialchars($session['date_session']) ?>" <?= (date('Y-m-d H:i', strtotime($r['date_reservation'])) === date('Y-m-d H:i', strtotime($session['date_session']))) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($session['label']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                    <form method="post" class="form-inline" style="display:inline-flex;gap:6px;align-items:center;">
                        <input type="hidden" name="delete_id" value="<?= $r['id'] ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h3 class="subtitle" style="margin-top:40px;">Ajouter une session </h3>
    <form method="post" class="form-add-session" style="margin-bottom:32px; display:flex; gap:16px; align-items:end;">
        <div class="form-group">
            <label for="date_session">Date de la session :</label>
            <input type="datetime-local" id="date_session" name="date_session" required class="input"
                onchange="autoLabelSession()">
        </div>
        <div class="form-group">
            <label for="label_session">Libellé :</label>
            <input type="text" id="label_session" name="label_session" required class="input" readonly>
        </div>
        <button type="submit" name="add_session" class="oval-button">Ajouter la session</button>
    </form>
    <script>
        function autoLabelSession() {
            const input = document.getElementById('date_session');
            const label = document.getElementById('label_session');
            if (!input.value) { label.value = ''; return; }
            const d = new Date(input.value);
            const jours = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
            const mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
            const jour = jours[d.getDay()];
            const date = d.getDate().toString().padStart(2, '0');
            const moisNom = mois[d.getMonth()];
            const annee = d.getFullYear();
            let h = d.getHours();
            let m = d.getMinutes();
            let heure = h + 'h';
            if (m > 0) heure += m.toString().padStart(2, '0');
            label.value = `${jour} ${date} ${moisNom} ${annee} - ${heure}`;
        }
    </script>
    <table class="table-reservations">
        <tr>
            <th>Date</th>
            <th>Libellé</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($sessions as $session): ?>
            <tr>
                <td><?= htmlspecialchars($session['date_session']) ?></td>
                <td><?= htmlspecialchars($session['label']) ?></td>
                <td>
                    <form method="post" style="display:inline-flex;gap:6px;align-items:center;">
                        <input type="hidden" name="delete_session_id" value="<?= $session['id'] ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>