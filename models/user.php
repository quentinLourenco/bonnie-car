<?php

require_once 'database.php';

class User {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function registerUser(string $firstName, string $lastName, string $email, string $password): bool {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        try {
            $stmt = $this->db->prepare("INSERT INTO users(first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $firstName, $lastName, $email, $passwordHash);
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
}
