<?php
define("PASSWORD", "");
define("HOST", "localhost");
define("USER", "root");
define("DBNAME", "sae202");

function getDB()
{
    static $db = null;
    if ($db === null) {
        $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $db;
}
