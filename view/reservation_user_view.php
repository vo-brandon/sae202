<?php
include('view/autres_pages/header.php');
?>
<link rel="stylesheet" href="/view/css/style.css">
<div class="container container-reservation">
    <h2 class="title">Réserver un billet</h2>
    <?php if (!empty($message))
        echo "<div class='alert'>$message</div>"; ?>
    <form method="post" class="form-reservation">
        <div class="form-group">
            <label for="billet">Type de billet :</label>
            <select id="billet" name="billet" required class="input">
                <option value="Tarif classic">Tarif classic - 39,99 €</option>
                <option value="Tarif réduit">Tarif Réduit - 29,99 € (étudiants/personnes éligibles)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="quantite">Nombre de billets :</label>
            <input type="number" id="quantite" name="quantite" min="1" max="5" value="1" required class="input">
        </div>
        <div class="form-group">
            <label for="date_reservation">Date de réservation :</label>
            <select id="date_reservation" name="date_reservation" required class="input">
                <?php foreach ($sessions as $session): ?>
                    <option value="<?= htmlspecialchars($session['date_session']) ?>">
                        <?= htmlspecialchars($session['label']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="oval-button">Réserver</button>
    </form>
    <h3 class="subtitle">Mes réservations</h3>
    <table class="table-reservations">
        <thead>
            <tr>
                <th>Billet</th>
                <th>Quantité</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Réserver le</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $r): ?>
                <tr>
                    <td><?= htmlspecialchars($r['billet']) ?></td>
                    <td><?= isset($r['quantite']) ? htmlspecialchars($r['quantite']) : '1' ?></td>
                    <td><?php
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $r['date_reservation']);
                    if ($date) {
                        setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');
                        echo ucfirst(strftime('%A %d %B %Y', $date->getTimestamp())) . ' à ' . $date->format('H\hi');
                    } else {
                        echo htmlspecialchars($r['date_reservation']);
                    }
                    ?></td>
                    <td><?= htmlspecialchars($r['statut']) ?></td>
                    <td><?php
                    $created = DateTime::createFromFormat('Y-m-d H:i:s', $r['created_at']);
                    if ($created) {
                        setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');
                        echo ucfirst(strftime('%A %d %B %Y', $created->getTimestamp())) . ' à ' . $created->format('H\hi');
                    } else {
                        echo htmlspecialchars($r['created_at']);
                    }
                    ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include('view/autres_pages/footer.php'); ?>