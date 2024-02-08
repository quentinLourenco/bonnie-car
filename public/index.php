<?php 
session_start();

require_once '../controllers/annonceController.php';
require_once '../controllers/userController.php';

$adController = new AnnonceController();
$userController = new UserController();

if (!isset($_GET['action'])) {
    $adController->home();
} else {
    switch ($_GET['action']) {
        case 'detail':
            if (isset($_GET['id'])) {
                $adController->detail($_GET['id']);
            } else {
                echo "Erreur : ID manquant.";
            }
            break;
        case 'add':
            $adController->addForm();
            break;
        case 'save':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $adController->addAnnonce($_POST);
            } else {
                echo "Erreur : Méthode de requête invalide.";
            }
            break;
        case 'search':
            $adController->search();
            break;
        case 'getModels':
            $adController->getModels();
            break;
        case 'getBrand':
            $adController->getBrand();
            break;
        case 'getAllModels': 
            $adController->getAllModels();
            break;
        case 'listing':
            $adController->listing();
            break;
        case 'loginPage':
            $userController->loginPage();
            break;
        case 'login':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userController->login($_POST);
            } else {
                echo "Erreur : Méthode de requête invalide.";
            }
            break;
        case 'logout':
            $userController->logout();
            break;
        case 'registrationPage':
            $userController->registrationPage();
            break;
        case 'registration':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userController->registration($_POST);
            } else {
                echo "Erreur : Méthode de requête invalide.";
            }
            break;
        default:
            $adController->home();
    }
}
?>
