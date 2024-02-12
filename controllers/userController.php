<?php

require_once '../models/user.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User(); 
    }

    public function showLoginPage() {
        require_once '../views/login.php'; 
    }

    public function showRegistrationPage() { 
        require_once '../views/register.php'; 
    }

    public function showAccountPage(){
        require_once '../views/account.php';
    }

    public function login($data) {
        $email = $data["email"];
        $password = $data["password"]; 
        if($this->userModel->login($email, $password )) {
            header("Location: index.php");
            return  "Connexion réussie";
        }else{
            return  "Erreur de connexion";
        }
    }

    public function logout() {
        $this->userModel->logout();
        header("Location: index.php");
    }

    public function register($data) {
        $firstName = $data["firstName"]; 
        $lastName = $data["lastName"];
        $email = $data["email"];
        $password = $data["password"];
        $confirmPassword = $data["confirmPassword"]; 
        $phone = $data["phone"];
    
        if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($phone) || $password != $confirmPassword) {
            header("Location: index.php?error=failure");
        } else {
            if (!$this->userModel->getUserByEmail($email)) {
                $response = $this->userModel->registerUser($firstName, $lastName, $email, $phone, $password); 
                if ($response) {
                    header("Location: index.php");
                } else {
                    header("Location: index.php?error=failure2");
                }
            } else {
                header("Location: index.php?error=failure3");
            }
        }
    }

    public function updateUser($data) {
        $champ = $data["champ"];
        $value = $data[$champ];
        $req = $this->userModel->updateUser($champ, $value);
        if ($req === true) {
            header("Location: index.php");
        } else {
            header("Location: index.php?erreur=echec");
        }
    }
}
