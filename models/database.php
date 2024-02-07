<?php

class Database {
    private $host = "localhost";
    private $db_name = "BonnieAndCar";
    private $username = "root";
    private $password = "";
    
    public $conn;

    public function getConnection() {
        $this->conn = null;

        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Échec de la connexion : " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
