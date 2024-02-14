<?php

require_once 'database.php';

class User {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function registerUser(string $firstName, string $lastName, string $email,string $tel, string $fieldPassword): bool {
        $passwordHash = password_hash($fieldPassword, PASSWORD_BCRYPT);
        try {
            $stmt = $this->db->prepare("INSERT INTO users(first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $firstName, $lastName, $email,$tel, $passwordHash);
            $stmt->execute();
            $userId = $stmt->insert_id;
            $stmt->close();
            $_SESSION['userId'] = $userId; 
            return true;
        } catch (\Exception $exception) {
            error_log('Unexpected error occurred: ' . $exception->getMessage());
            return false;
        }
    }

    public function getUserById(){
        $userId = $_SESSION['userId'];
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getUserByEmail(string $email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getIdByEmail(string $email): int {
        $user = $this->getUserByEmail($email);
        return intval($user['id']);
    }

    public function checkUser(string $email, string $password): bool {
        $user = $this->getUserByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            return true;
        }
        return false;
    }

    public function logout(): bool {
        unset($_SESSION['userId']);
        return !isset($_SESSION['userId']);
    }

    public function login(string $email, string $password): bool {
        if ($this->checkUser($email, $password)) {
            $_SESSION['userId'] = $this->getIdByEmail($email);
            return true;
        }
        return false;
    }

    public function updateUser(string $champ,string $value){
        $userId = $_SESSION['userId'];
        try{
            $stmt = $this->db->prepare("UPDATE users SET $champ=? WHERE id=? ");
            $stmt->bind_param("si", $value,$userId);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        catch (\Exception $exception) {
            error_log('Unexpected error occurred: ' . $exception->getMessage());
            return false;
        }
    }

    public function deleteUser(){
        $userId = $_SESSION['userId'];
        try{
            $stmt = $this->db->prepare("DELETE FROM users WHERE  id= ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        catch (\Exception $exception) {
            error_log('Unexpected error occurred: ' . $exception->getMessage());
            return false;
        }
    }

    public function getMyFavorites(){
        $userId = $_SESSION['userId'];
        try{
            $stmt = $this->db->prepare("SELECT * FROM favorites WHERE  id_user= ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        catch (\Exception $exception) {
            error_log('Unexpected error occurred: ' . $exception->getMessage());
            return false;
        }
    }
}
