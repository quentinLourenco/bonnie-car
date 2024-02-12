<?php 
session_start();

require_once '../controllers/adController.php'; 
require_once '../controllers/userController.php';

$adController = new AdController(); 
$userController = new UserController();

if (!isset($_GET['action'])) {
    $adController->home();
} else {
    switch ($_GET['action']) {
        case 'detail':
            if (isset($_GET['id'])) {
                $adController->showAdDetail($_GET['id']); 
            } else {
                echo "Erreur : ID manquant.";
            }
            break;
        case 'add':
            $adController->showAddForm(); 
            break;
        case 'save':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $adController->processAddAd($_POST); 
            } else {
                echo "Erreur : Méthode de requête invalide.";
            }
            break;
        case 'search':
            $adController->searchAds(); 
            break;
        case 'listing':
            $adController->listAds();
            break;
        case 'loginPage':
            $userController->showLoginPage(); 
            break;
        case 'login':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo $userController->login($_POST);
            } else {
                echo "Erreur : Méthode de requête invalide.";
            }
            break;
        case 'logout':
            $userController->logout();
            break;
        case 'registrationPage':
            $userController->showRegistrationPage(); 
            break;
        case 'accountPage':
            $userController->showAccountPage(); 
            break;
        case 'registration':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userController->register($_POST);
            } else {
                echo "Erreur : Méthode de requête invalide.";
            }
            break;
        default:
            $adController->home();
    }
}
?>
