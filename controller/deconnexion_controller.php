<?php
session_start();
function index()
{
    if (isset($_SESSION['user'])) {
        session_destroy();
    }
    header('Location: /');
    exit;
}
function deconnexion()
{
    session_destroy();
    header('Location: /');
    exit;
}
