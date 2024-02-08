<?php 
require_once '../controllers/annonceController.php';

$controller = new AnnonceController();

if (!isset($_GET['action'])) {
    $controller->home();
} else {
    switch ($_GET['action']) {
        case 'detail':
            if (isset($_GET['id'])) {
                $controller->detail($_GET['id']);
            } else {
                echo "Erreur : ID manquant.";
            }
            break;
        case 'add':
            $controller->addForm();
            break;
        case 'save':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->addAnnonce($_POST);
            } else {
                echo "Erreur : Méthode de requête invalide.";
            }
            break;
        case 'search':
            $controller->search();
            break;
        case 'getModels':
            $controller->getModels();
            break;
        case 'getBrand':
            $controller->getBrand();
            break;
        case 'getAllModels': 
            $controller->getAllModels();
            break;
        default:
            $controller->home();
    }
}
?>
