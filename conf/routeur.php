<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$items = explode('/', trim($path, '/'));


$admin_submenus = [
   'commentaire' => 'commentaires',
   'commentaires' => 'commentaires',
   'messagerie' => 'messagerie',
   'reservation' => 'reservations',
   'reservations' => 'reservations',
   'membres' => 'membres',
   'listing_membres' => 'membres',
   'dashboard' => 'dashboard',
];

if (!empty($items[0]) && $items[0] === 'admin' && (!isset($items[1]) || $items[1] === '')) {
   // /admin ou /admin/
   require_once(__DIR__ . '/../admin/controller/admin_controller.php');
   if (function_exists('index')) index();
   return;
}

if (!empty($items[0]) && $items[0] === 'admin' && !empty($items[1]) && isset($admin_submenus[$items[1]])) {
   // /admin/dashboard, /admin/membres, etc. => routeur normal
   $submenu = $admin_submenus[$items[1]];
   switch ($submenu) {
      case 'dashboard':
         require_once(__DIR__ . '/../admin/controller/admin_controller.php');
         if (function_exists('index')) index();
         return;
      case 'membres':
         require_once(__DIR__ . '/../admin/controller/listing_membres_controller.php');
         if (function_exists('index')) index();
         return;
      case 'reservations':
         require_once(__DIR__ . '/../admin/controller/reservation_admin_controller.php');
         if (function_exists('index')) index();
         return;
      case 'commentaires':
         require_once(__DIR__ . '/../admin/controller/commentaire_admin_controller.php');
         if (function_exists('index')) index();
         return;
      case 'messagerie':
         require_once(__DIR__ . '/../admin/controller/messagerie_admin_controller.php');
         if (function_exists('index')) index();
         return;
   }
}

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

$admin_controllers = [
   'admin',
   'commentaire_admin',
   'messagerie_admin',
   'reservation_admin',
   'listing_membres'
];

if (in_array($controller, $admin_controllers)) {
   require_once(__DIR__ . '/../admin/controller/' . $controller . '_controller.php');
} else {
   if ($controller === 'commentaire') {
      require_once(__DIR__ . '/../controller/commentaire_user_controller.php');
   } else {
      require_once(__DIR__ . '/../controller/' . $controller . '_controller.php');
   }
}

if ($controller === 'admin') {
   require_once(__DIR__ . '/../admin/controller/admin_controller.php');
   return;
}

if (function_exists($action)) {
   $action();
} else {
   http_response_code(404);
   echo "<h2>Erreur 404 : action '$action' non trouvée dans le contrôleur '$controller'.</h2>";
}


?>