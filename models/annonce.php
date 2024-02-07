<?php

require_once 'database.php';

class Annonce {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $query = "SELECT * FROM annonces";
        $result = $this->db->getConnection()->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM annonces WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function store($titre, $description, $prix, $marque, $modele, $annee) {
        $stmt = $this->db->getConnection()->prepare("INSERT INTO annonces (titre, description, prix) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $titre, $description, $prix);
        $stmt->execute();
        $annonce_id = $stmt->insert_id;
        $stmt->close();

        if ($annonce_id) {
            $stmt = $this->db->getConnection()->prepare("INSERT INTO vehicules (marque, modele, annee, annonce_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssii", $marque, $modele, $annee, $annonce_id);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }
}
