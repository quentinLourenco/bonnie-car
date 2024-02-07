<?php

require_once 'database.php';

class Annonce {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection(); 
    }

    public function getAll() {
        $query = "SELECT annonces.*, vehicules.marque, vehicules.modele, vehicules.annee 
                  FROM annonces 
                  JOIN vehicules ON annonces.id = vehicules.annonce_id
                  ORDER BY annonces.id ASC";
    
        $result = $this->db->query($query); 
    
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM annonces WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addAnnonce($titre, $description, $prix, $marque, $modele, $annee) {
        $stmt = $this->db->prepare("INSERT INTO annonces (titre, description, prix) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $titre, $description, $prix);
        $stmt->execute();
        $annonce_id = $stmt->insert_id;
        $stmt->close();

        if ($annonce_id) {
            $stmt = $this->db->prepare("INSERT INTO vehicules (marque, modele, annee, annonce_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssii", $marque, $modele, $annee, $annonce_id);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    public function searchAnnonces($keyword, $marque, $modele) {
        $query = "SELECT annonces.*, vehicules.marque, vehicules.modele, vehicules.annee FROM annonces JOIN vehicules ON annonces.id = vehicules.annonce_id WHERE 1=1";
    
        $params = [];
        $types = "";
    
        if (!empty($keyword)) {
            $query .= " AND (annonces.titre LIKE ? OR annonces.description LIKE ? OR annonces.prix LIKE ? OR vehicules.marque LIKE ?)";
            $keywordParam = "%$keyword%";
            $params = array_merge($params, array_fill(0, 4, $keywordParam));
            $types .= 'ssss';
        }
        if (!empty($marque)) {
            $query .= " AND vehicules.marque = ?";
            $params[] = $marque;
            $types .= 's';
        }
        if (!empty($modele)) {
            $query .= " AND vehicules.modele = ?";
            $params[] = $modele;
            $types .= 's';
        }
    
        $stmt = $this->db->prepare($query);
        if ($params) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    

    public function getUniqueBrands() {
        $query = "SELECT DISTINCT marque FROM vehicules ORDER BY marque ASC";
        $result = $this->db->query($query);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function getModelesByMarque($marque) {
        $query = "SELECT DISTINCT modele FROM vehicules WHERE marque = ? ORDER BY modele ASC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $marque);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
