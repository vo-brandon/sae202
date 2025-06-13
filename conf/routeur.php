<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$items = explode('/', trim($path, '/'));
if (empty($items[0])) {
   $controller = 'accueil';
} else {
   $controller = $items[0];
}

if (empty($items[1])) {
   $action = 'index';
} else {
   $action = $items[1];
}

require_once('controller/' . $controller . '_controller.php');
$action();


?>