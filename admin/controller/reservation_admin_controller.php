<?php

require_once(__DIR__ . '/../model/reservation_back_model.php');
require_once(__DIR__ . '/../../conf/routeur.php');
if (!isset($_SESSION))
    session_start();

function index()
{
    reservation_admin();
}

function reservation_admin()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: index.php?page=connexion');
        exit();
    }
    $message = '';
    if (isset($_POST['delete_id'])) {
        if (supprimer_reservation($_POST['delete_id'])) {
            $message = 'Réservation supprimée.';
        }
    }
    if (isset($_POST['edit_id'])) {
        $id = $_POST['edit_id'];
        $date_reservation = $_POST['edit_date'];
        $statut = $_POST['edit_statut'];
        if (modifier_reservation($id, $date_reservation, $statut)) {
            $message = 'Réservation modifiée.';
        }
    }
    if (isset($_POST['add_session'])) {
        $date_session = $_POST['date_session'];
        $label_session = $_POST['label_session'];
        if (add_session($date_session, $label_session)) {
            $message = 'Session ajoutée !';
        } else {
            $message = 'Erreur lors de l\'ajout de la session.';
        }
    }
    if (isset($_POST['delete_session_id'])) {
        if (delete_session($_POST['delete_session_id'])) {
            $message = 'Session supprimée !';
        } else {
            $message = 'Erreur lors de la suppression de la session.';
        }
    }
    $reservations = get_all_reservations();
    $sessions = get_sessions();
    require_once(__DIR__ . '/../view/reservation_admin_view.php');
}


