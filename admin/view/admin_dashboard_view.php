<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Kalnia:wght@100..700&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/view/images/rose-logo.png">
    <title>Admin - Murder Party</title>
</head>

<body>
    <?php
    echo '<!-- DEBUT admin_dashboard_view.php -->';
    include(__DIR__ . '/../view/autres_pages/header_admin.php');
    if (!isset($stats)) {
        require_once(__DIR__ . '/../model/dashboard_stats_model.php');
        $stats = get_dashboard_stats();
    }
    ?>
    <main>
        <div id="page-max-width">
            <div class="admin-dashboard">
                <section class="admin-content">
                    <h1>Bienvenue sur le tableau de bord administrateur</h1>
                    <div class="dashboard-stats">
                        <div class="stat-box">
                            <h2>Clients Inscrits</h2>
                            <p><?= $stats['users'] ?></p>
                        </div>
                        <div class="stat-box">
                            <h2>Réservations</h2>
                            <p><?= $stats['reservations'] ?></p>
                        </div>
                        <div class="stat-box">
                            <h2>Commentaires</h2>
                            <p><?= $stats['commentaires'] ?></p>
                        </div>
                        <div class="stat-box">
                            <h2>Messages</h2>
                            <p><?= $stats['messages'] ?></p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
</body>

</html>