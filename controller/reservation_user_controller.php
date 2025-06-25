<?php

function index()
{
    reservation_user();
}

require_once('model/reservation_front_model.php');
require_once('conf/routeur.php');
if (!isset($_SESSION))
    session_start();

function reservation_user()
{
    if (!isset($_SESSION['user'])) {
        header('Location: index.php?page=connexion');
        exit();
    }
    $user_id = $_SESSION['user']['id'];
    $message = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $billet = htmlspecialchars($_POST['billet']);
        $date_reservation = $_POST['date_reservation'];
        $quantite = isset($_POST['quantite']) ? (int) $_POST['quantite'] : 1;
        if (creer_reservation($user_id, $billet, $date_reservation, $quantite)) {
            $message = 'Réservation effectuée !';
        } else {
            $message = 'Erreur lors de la réservation.';
        }
    }
    $reservations = get_reservations_by_user($user_id);
    $sessions = get_sessions();
    require('view/reservation_user_view.php');
}

