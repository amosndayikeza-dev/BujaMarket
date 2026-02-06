<?php
session_start();

$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

//inclusion des controllers
require_once __DIR__.'/app/controllers/HomeController.php';
require_once __DIR__. '/app/controllers/ProduitController.php';
require_once __DIR__.'/app/controllers/AdminController.php';
require_once __DIR__.'/app/controllers/CommercantController.php';

switch($page){
    case "home":
        $controller = new HomeController();
        break;
    case 'admin':
        $controller = new AdminController();
        break;
    case 'commercant':
        $controller = new CommercantController();
        break;
    case 'produit':
        $controller = new ProduitController();
        break;
    default:
        http_response_code(404);
        die ("Page non trouvée");
        break;
}

if(!method_exists($controller,$action)){
    http_response_code(404);
    die("Action '{$action}' introuvable sur le controller.");
}

//appele action
if($id !== null){
    $controller->$action($id);
}else{
    $controller->$action();
}
?>