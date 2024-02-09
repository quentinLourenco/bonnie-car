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

    public function login($data) {
        $email = $data["email"];
        $password = $data["password"]; 
        $userId = $this->userModel->login($email, $password); 
        
        if ($userId) {
            $_SESSION['userId'] = $userId;
            header("Location: index.php");
        } else {
            header("Location: ../views/login.php?error=failure");
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
    
        if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || $password != $confirmPassword) {
            header("Location: index.php?error=failure");
        } else {
            if (!$this->userModel->getUserByEmail($email)) {
                $response = $this->userModel->registerUser($firstName, $lastName, $email, $password); 
                if ($response) {
                    header("Location: index.php");
                } else {
                    header("Location: index.php?error=failure");
                }
            } else {
                header("Location: index.php?error=failure");
            }
        }
    }
}
