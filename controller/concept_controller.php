<?php
function index()
{
    include_once __DIR__ . '/../view/concept_view.php';
}

if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
    index();
}
