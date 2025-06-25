<?php
function index()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['user'])) {
        echo '<h2>Erreur : utilisateur non connecté</h2>';
        exit;
    }
    if ($_SESSION['user']['role'] !== 'admin') {
        echo '<h2>Erreur : accès réservé aux administrateurs</h2>';
        exit;
    }
    require_once(__DIR__ . '/../model/dashboard_stats_model.php');
    $stats = get_dashboard_stats();
    require_once(__DIR__ . '/../view/admin_dashboard_view.php');
}

if (function_exists('index') && (!function_exists('debug_backtrace') || count(debug_backtrace()) == 0)) {
    index();
}
