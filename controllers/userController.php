<?php

require_once '../models/user.php';

class UserController {
    private $userModel;
    private $adModel;

    public function __construct() {
        $this->userModel = new User(); 
        $this->adModel = new Ad();
    }

    public function showLoginPage() {
        require_once '../views/login.php'; 
    }

    public function showRegistrationPage() { 
        require_once '../views/register.php'; 
    }

    public function showAccountPage(){
        $userInfo = $this->userModel->getUserById();
        require_once '../views/account.php';
    }

    public function showFavoritePage(){
        $userFavorites = $this->getFavoritesUser();
        require_once '../views/favorite.php';
    }

    public function showSalesPage(){
        $userSales = $this->adModel->getSalesByIdUser();
        require_once '../views/sale.php';
    }

    public function showDocumentPage() {
        require_once '../views/document.php'; 
    }

    public function login($data) {
        $email = $data["email"];
        $password = $data["password"]; 
        if($this->userModel->login($email, $password )) {
            header("Location: index.php");
            return  "Connexion réussie";
        }else{
            header("Location: index.php?action=loginPage&failure");
            return  "Erreur de connexion";
        }
    }

    public function logout() {
        $this->userModel->logout();
        header("Location: index.php");
    }

    public function register($data): bool {
        $firstName = $data["first_name"]; 
        $lastName = $data["last_name"];
        $email = $data["email"];
        $password = $data["password"];
        $confirmPassword = $data["confirmPassword"]; 
        $phone = $data["phone"];
    
        if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($phone) || $password != $confirmPassword) {
            header("Location: index.php?error=failure");
            return false;
        } else {
            if (!$this->userModel->getUserByEmail($email)) {
                $response = $this->userModel->registerUser($firstName, $lastName, $email, $phone, $password); 
                if ($response) {
                    header("Location: index.php");
                    return true;
                } else {
                    header("Location: index.php?error=failure2");
                    return false;
                }
            } else {
                header("Location: index.php?error=failure3");
                return false;
            }
        }
    }

    public function updateUser($data) {
        $champ = $data["champ"];
        $value = $data[$champ];
        $req = $this->userModel->updateUser($champ, $value);
        if ($req === true) {
            header("Location: index.php?action=accountPage");
        } else {
            header("Location: index.php?erreur=echec");
        }
    }

    public function getInfoUser(){
        $userInfo = $this->userModel->getUserById();
    }

    public function getFavoritesUser(){
        $tableFav = $this->userModel->getMyFavorites();
        foreach ($tableFav as $elmt){
            if(isset($elmt['id_ad'])){
                $listIdAds[] = $elmt['id_ad'];
            }
        }
        return $this->adModel->getAdsById($listIdAds);
    }

    public function deleteAccount(){
        if($this->userModel->deleteUser()){
            $this->userModel->logout();
            header("Location: index.php");
        } else {
            header("Location: index.php?erreur=echec");
        }
    }

    public function updatePasswordUser($data){
        $oldPassword = $data['password'];
        $newPassword = $data['changePassword'];
        $newConfirmPassword = $data['confirmChangePassword'];
        if($newPassword === $newConfirmPassword){
            if($this->userModel->updatePasswordUser($oldPassword, $newPassword)) {
            header("Location: index.php?action=accountPage");
            return  "Connexion réussie";
            }else{
                header("Location: index.php?error=failure");
                return  "Erreur de connexion";
            }
        }
        else{
            header("Location: index.php?error=failure");
            return  "Erreur de connexion";
        }
    }
}