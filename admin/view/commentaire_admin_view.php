<?php
if (!isset($_SESSION))
    session_start();
require_once(__DIR__ . '/autres_pages/header_admin.php');
?>
<style>
    :root {
        --black: #1e1e1e;
        --dark-shade: #61463f;
        --white: #f2e5d0;
        --primary: #a73c48;
        --secondary: #d37f7f;
        --contrast: #3b4a34;
        --radius: 16px;
        --shadow: 0 4px 24px rgba(167, 60, 72, 0.10);
        --font-main: 'Courier Prime', monospace;
        --font-title: 'Kalnia', serif;
    }

    body {
        font-family: var(--font-main);
        background: var(--white);
        color: var(--black);
        margin: 0;
    }

    #contenu {
        max-width: 900px;
        margin: 40px auto;
        padding: 40px 32px 32px 32px;
        background: var(--white);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
    }

    h1,
    h2 {
        font-family: var(--font-title);
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 18px;
    }

    h1 {
        font-size: 2.2rem;
    }

    h2 {
        margin-top: 36px;
        font-size: 1.3rem;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 18px;
        background: transparent;
        box-shadow: none;
        margin-top: 18px;
        font-size: 1.08rem;
    }

    thead th {
        background: var(--primary);
        color: var(--white);
        font-weight: 700;
        border-radius: 16px 16px 0 0;
        letter-spacing: 1px;
        padding: 18px 12px;
        text-align: center;
        font-family: var(--font-title);
        border: none;
    }

    tbody tr {
        background: var(--white);
        border-radius: 18px;
        box-shadow: 0 4px 18px rgba(167, 60, 72, 0.10);
        transition: box-shadow 0.2s, transform 0.2s, background 0.2s;
        margin-bottom: 18px;
        position: relative;
    }

    tbody tr:hover {
        box-shadow: 0 8px 32px rgba(167, 60, 72, 0.18);
        background: var(--secondary);
        transform: translateY(-2px) scale(1.01);
    }

    td {
        padding: 22px 18px;
        text-align: center;
        border-bottom: none;
        font-size: 1rem;
        max-width: 350px;
        word-break: break-word;
    }

    td[data-label="Commentaire"] {
        text-align: left;
        font-style: italic;
        color: var(--black);
        font-size: 1.05rem;
        max-width: 400px;
    }

    td[data-label="Auteur"] {
        font-weight: bold;
        color: var(--primary);
        font-family: var(--font-title);
        font-size: 1.08rem;
    }

    td[data-label="Actions"] {
        min-width: 160px;
    }

    .btn {
        display: inline-block;
        font-family: 'Bree Serif', serif;
        font-weight: 600;
        padding: 10px 26px;
        border-radius: 100px;
        margin: 0 6px;
        text-decoration: none;
        font-size: 1rem;
        border: 1.5px solid var(--primary);
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(167, 60, 72, 0.07);
    }

    .btn-validate {
        background: var(--primary);
        color: var(--white);
    }

    .btn-validate:hover {
        background: var(--secondary);
        color: var(--white);
        box-shadow: 0 4px 16px rgba(167, 60, 72, 0.13);
    }

    .btn-refuse {
        background: var(--white);
        color: var(--primary);
    }

    .btn-refuse:hover {
        background: var(--primary);
        color: var(--white);
    }

    .btn-delete {
        background: var(--white);
        color: var(--primary);
        border: 1.5px solid var(--primary);
    }

    .btn-delete:hover {
        background: var(--primary);
        color: var(--white);
    }

    @media (max-width: 900px) {
        td {
            max-width: 200px;
            font-size: 0.97rem;
            padding: 14px 6px;
        }

        td[data-label="Commentaire"] {
            max-width: 220px;
        }
    }

    @media (max-width: 700px) {
        #contenu {
            padding: 10px 2vw;
        }

        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
            width: 100%;
        }

        thead {
            display: none;
        }

        tr {
            margin-bottom: 22px;
        }

        td {
            text-align: left;
            padding: 14px 8px;
            border-bottom: none;
            max-width: 100vw;
        }

        td:before {
            content: attr(data-label);
            font-weight: 600;
            color: var(--primary);
            display: block;
            margin-bottom: 4px;
        }

        .btn {
            width: 100%;
            margin: 6px 0;
            padding: 10px 0;
            font-size: 1.05rem;
        }
    }
</style>
<div id="contenu">
    <h1>Gestion des commentaires</h1>
    <h2>Commentaires en attente</h2>
    <?php if (empty($attente)): ?>
        <p>Aucun commentaire en attente.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Auteur</th>
                    <th>Commentaire</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($attente as $c): ?>
                    <tr>
                        <td data-label="Auteur">
                            <?= htmlspecialchars($c['prenom']) ?>         <?= htmlspecialchars($c['nom']) ?>
                        </td>
                        <td data-label="Commentaire">
                            <?= nl2br(htmlspecialchars($c['contenu'])) ?>
                        </td>
                        <td data-label="Date">
                            <?= date('d/m/Y H:i', strtotime($c['date_creation'])) ?>
                        </td>
                        <td data-label="Actions">
                            <a href="/commentaire_admin/valider?id=<?= $c['id'] ?>" class="btn btn-validate">Valider</a>
                            |
                            <a href="/commentaire_admin/refuser?id=<?= $c['id'] ?>" class="btn btn-refuse">Refuser</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <h2>Commentaires validés</h2>
    <?php if (empty($commentaires)): ?>
        <p>Aucun commentaire validé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Auteur</th>
                    <th>Commentaire</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commentaires as $c): ?>
                    <tr>
                        <td data-label="Auteur">
                            <?= htmlspecialchars($c['prenom']) ?>         <?= htmlspecialchars($c['nom']) ?>
                        </td>
                        <td data-label="Commentaire">
                            <?= nl2br(htmlspecialchars($c['contenu'])) ?>
                        </td>
                        <td data-label="Date">
                            <?= date('d/m/Y H:i', strtotime($c['date_creation'])) ?>
                        </td>
                        <td data-label="Actions">
                            <a href="/commentaire_admin/supprimer?id=<?= $c['id'] ?>" class="btn btn-delete"
                                onclick="return confirm('Supprimer ce commentaire ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>