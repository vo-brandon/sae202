<header>
    <nav>
        <a href="/">Accueil</a>
        <?php
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['user'])) {
            $role = $_SESSION['user']['role'] ?? 'client';
            if ($role === 'admin') {
                echo '<a href="/panel_membres">Panel membres</a> ';
            }
            echo '<span class="menu-droite"><a href="/deconnexion">Déconnexion</a></span>';
        } else {
            echo '<span class="menu-droite"><a href="/inscription">Inscription</a> | <a href="/connexion">Connexion</a></span>';
        }
        ?>
    </nav>
</header>