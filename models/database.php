<?php

class Database {
    private $host = "localhost";
    private $dbName = "BonnieAndRide"; 
    private $username = "root";
    private $password = "root";
    private $conn = null;

    public function getConnection() {
        if ($this->conn === null) { 
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        return $this->conn;
    }
}
