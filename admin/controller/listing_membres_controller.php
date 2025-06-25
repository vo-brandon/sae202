<?php
function index()
{
    require_once(__DIR__ . '/../model/listing_membres_model.php');
    if (!isset($_SESSION))
        session_start();
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /');
        exit;
    }
    if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
        delete_user((int) $_GET['delete']);
        header('Location: /admin/membres');
        exit;
    }
    if (isset($_POST['edit_id'])) {
        $id = (int) $_POST['edit_id'];
        $prenom = ucfirst(strtolower(trim($_POST['edit_prenom'])));
        $nom = ucwords(strtolower(trim($_POST['edit_nom'])));
        $mail = trim($_POST['edit_mail']);
        $telephone = trim($_POST['edit_telephone']);
        $date_naissance = trim($_POST['edit_date_naissance']);
        update_user($id, $prenom, $nom, $mail, $telephone, $date_naissance);
        header('Location: /admin/membres');
        exit;
    }
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
    $order = isset($_GET['order']) && strtolower($_GET['order']) === 'desc' ? 'DESC' : 'ASC';
    $users = get_all_users($search, $sort, $order);
    require_once(__DIR__ . '/../view/listing_membres_view.php');
}
