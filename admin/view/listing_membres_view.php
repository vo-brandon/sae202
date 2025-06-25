<?php error_reporting(E_ALL);
ini_set('display_errors', 1); ?>
<?php
if (!isset($_SESSION))
    session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: /');
    exit;
}
include __DIR__ . '/autres_pages/header_admin.php';
?>
<style>
    #contenu {
        max-width: 1500px;
        margin: 40px auto;
        background: #f2e5d0;
        border-radius: 24px;
        box-shadow: 0 4px 24px rgba(167, 60, 72, 0.10);
        padding: 40px 32px 32px 32px;
    }

    .panel-membres {
        width: 100%;
        min-width: 1400px;
        border-collapse: separate;
        border-spacing: 0 10px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(167, 60, 72, 0.07);
        font-size: 1.08rem;
        margin-bottom: 32px;
    }

    .panel-membres th,
    .panel-membres td {
        padding: 16px 18px;
        text-align: center;
        background: #fff;
        border-bottom: 1px solid #eee;
        font-size: 1rem;
    }

    .panel-membres th {
        background: #a73c48;
        color: #fff;
        font-weight: 700;
        border-radius: 10px 10px 0 0;
        letter-spacing: 1px;
        font-family: 'Kalnia', serif;
        text-shadow: 0 1px 4px rgba(30, 30, 30, 0.13);
    }

    .panel-membres th a {
        color: #fff;
        text-decoration: none;
        transition: color 0.2s;
    }

    .panel-membres th a:hover {
        color: #ffe6e6;
        text-decoration: underline;
    }

    .panel-membres tr:last-child td {
        border-bottom: none;
    }

    .panel-membres tr {
        transition: background 0.2s;
    }

    .panel-membres tr:hover td {
        background: #f8f3f1;
    }

    .panel-membres .form-edit-membre {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
        justify-content: center;
    }

    .panel-membres input[type="text"],
    .panel-membres input[type="email"],
    .panel-membres input[type="date"] {
        border-radius: 100px;
        border: 1px solid #a73c48;
        padding: 12px 28px;
        font-size: 1.12rem;
        background: #f8f8f8;
        color: #1e1e1e;
        outline: none;
        transition: border 0.2s;
        margin: 0 6px;
        min-width: 180px;
        max-width: 400px;
    }

    .panel-membres input[name="edit_mail"] {
        min-width: 320px;
        max-width: 600px;
    }

    .panel-membres input[name="edit_telephone"] {
        min-width: 220px;
        max-width: 350px;
    }

    .panel-membres input[name="edit_date_naissance"] {
        min-width: 220px;
        max-width: 350px;
    }

    .panel-membres input[name="edit_prenom"],
    .panel-membres input[name="edit_nom"] {
        min-width: 140px;
        max-width: 220px;
    }

    .panel-membres input:focus {
        border: 1.5px solid #d37f7f;
    }

    .panel-membres button[type="submit"] {
        border-radius: 100px;
        border: none;
        background: #a73c48;
        color: #fff;
        padding: 12px 32px;
        font-size: 1.12rem;
        font-family: 'Bree Serif', serif;
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
        margin-left: 4px;
    }

    .panel-membres button[type="submit"]:hover {
        background: #d37f7f;
        color: #fff;
    }

    .panel-membres a {
        color: #a73c48;
        font-weight: 600;
        text-decoration: underline;
        margin-left: 10px;
        transition: color 0.2s;
    }

    .panel-membres a:hover {
        color: #d37f7f;
    }

    @media (max-width: 1600px) {
        #contenu {
            max-width: 99vw;
            padding-left: 2vw;
            padding-right: 2vw;
        }

        .panel-membres {
            min-width: 1000px;
        }
    }

    @media (max-width: 1100px) {
        .panel-membres {
            min-width: 700px;
        }

        .panel-membres input[type="text"],
        .panel-membres input[type="email"],
        .panel-membres input[type="date"] {
            min-width: 80px;
        }
    }
</style>
<div id="contenu">
    <h1 style="font-family:'Kalnia',serif;font-size:2.2rem;color:var(--primary);margin-bottom:28px;">Liste des membres
    </h1>
    <form method="get" style="margin-bottom:22px;display:flex;gap:12px;align-items:center;">
        <input type="text" name="search" placeholder="Rechercher..." value="<?= htmlspecialchars($search) ?>"
            style="width:220px;border-radius:100px;border:1px solid var(--primary);padding:8px 18px;font-size:1rem;background:#f8f8f8;color:var(--black);outline:none;transition:border 0.2s;">
        <button type="submit"
            style="border-radius:100px;border:none;background:var(--primary);color:var(--white);padding:8px 28px;font-size:1rem;font-family:'Bree Serif',serif;cursor:pointer;transition:background 0.2s, color 0.2s;">Rechercher
        </button>
    </form>
    <div style="overflow-x:auto;">
        <table class="panel-membres" style="min-width:900px;">
            <thead>
                <tr>
                    <th><a
                            href="?<?= http_build_query(array_merge($_GET, ['sort' => 'id', 'order' => ($sort === 'id' && $order === 'ASC' ? 'desc' : 'asc')])) ?>">ID<?= $sort === 'id' ? ($order === 'ASC' ? ' ▲' : ' ▼') : '' ?></a>
                    </th>
                    <th><a
                            href="?<?= http_build_query(array_merge($_GET, ['sort' => 'prenom', 'order' => ($sort === 'prenom' && $order === 'ASC' ? 'desc' : 'asc')])) ?>">Prénom<?= $sort === 'prenom' ? ($order === 'ASC' ? ' ▲' : ' ▼') : '' ?></a>
                    </th>
                    <th><a
                            href="?<?= http_build_query(array_merge($_GET, ['sort' => 'nom', 'order' => ($sort === 'nom' && $order === 'ASC' ? 'desc' : 'asc')])) ?>">Nom<?= $sort === 'nom' ? ($order === 'ASC' ? ' ▲' : ' ▼') : '' ?></a>
                    </th>
                    <th><a
                            href="?<?= http_build_query(array_merge($_GET, ['sort' => 'mail', 'order' => ($sort === 'mail' && $order === 'ASC' ? 'desc' : 'asc')])) ?>">Email<?= $sort === 'mail' ? ($order === 'ASC' ? ' ▲' : ' ▼') : '' ?></a>
                    </th>
                    <th><a
                            href="?<?= http_build_query(array_merge($_GET, ['sort' => 'role', 'order' => ($sort === 'role' && $order === 'ASC' ? 'desc' : 'asc')])) ?>">Rôle<?= $sort === 'role' ? ($order === 'ASC' ? ' ▲' : ' ▼') : '' ?></a>
                    </th>
                    <th><a
                            href="?<?= http_build_query(array_merge($_GET, ['sort' => 'telephone', 'order' => ($sort === 'telephone' && $order === 'ASC' ? 'desc' : 'asc')])) ?>">Téléphone<?= $sort === 'telephone' ? ($order === 'ASC' ? ' ▲' : ' ▼') : '' ?></a>
                    </th>
                    <th><a
                            href="?<?= http_build_query(array_merge($_GET, ['sort' => 'date_naissance', 'order' => ($sort === 'date_naissance' && $order === 'ASC' ? 'desc' : 'asc')])) ?>">Date
                            de naissance<?= $sort === 'date_naissance' ? ($order === 'ASC' ? ' ▲' : ' ▼') : '' ?></a>
                    </th>
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
                        <td><?= htmlspecialchars($user['telephone']) ?></td>
                        <td>
                            <?php
                            if (!empty($user['date_naissance']) && preg_match('/^\d{4}-\d{2}-\d{2}/', $user['date_naissance'])) {
                                $date = DateTime::createFromFormat('Y-m-d', substr(trim($user['date_naissance']), 0, 10));
                                echo $date ? $date->format('d/m/Y') : '';
                            }
                            ?>
                        </td>
                        <td>
                            <form method="post"
                                style="display:flex;flex-wrap:wrap;gap:6px;align-items:center;justify-content:center;">
                                <input type="hidden" name="edit_id" value="<?= $user['id'] ?>">
                                <input type="text" name="edit_prenom" value="<?= htmlspecialchars($user['prenom']) ?>"
                                    required style="width:90px;">
                                <input type="text" name="edit_nom" value="<?= htmlspecialchars($user['nom']) ?>" required
                                    style="width:90px;">
                                <input type="email" name="edit_mail" value="<?= htmlspecialchars($user['mail']) ?>" required
                                    style="width:150px;">
                                <input type="text" name="edit_telephone" value="<?= htmlspecialchars($user['telephone']) ?>"
                                    required style="width:120px;">
                                <input type="date" name="edit_date_naissance" value="<?php
                                if (isset($user['date_naissance']) && preg_match('/^\d{4}-\d{2}-\d{2}/', trim($user['date_naissance']))) {
                                    echo htmlspecialchars(substr(trim($user['date_naissance']), 0, 10));
                                }
                                ?>" required style="width:140px;">
                                <button type="submit"
                                    style="border-radius:100px;border:none;background:var(--primary);color:var(--white);padding:7px 18px;font-size:1rem;font-family:'Bree Serif',serif;cursor:pointer;transition:background 0.2s, color 0.2s;">Modifier
                                </button>
                            </form>
                            <a href="?delete=<?= $user['id'] ?>" onclick="return confirm('Supprimer ce membre ?');"
                                style="color:var(--primary);font-weight:600;text-decoration:underline;margin-left:10px;transition:color 0.2s;">Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>