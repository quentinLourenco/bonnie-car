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
            }
            break;
        case 'add':
            $controller->addForm();
            break;
        case 'save':
            $controller->addAnnonce($_POST['titre'], $_POST['description'], $_POST['prix'], $_POST['marque'], $_POST['modele'], $_POST['annee']);
            break;
        default:
            $controller->home();
    }
}

