<?php

require_once 'database.php';

class Annonce {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT annonces.*, vehicules.marque, vehicules.modele, vehicules.annee FROM annonces JOIN vehicules ON annonces.id = vehicules.annonce_id ORDER BY annonces.id ASC";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM annonces WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addAnnonce($titre, $description, $prix, $marque, $modele, $annee, $kilometrage) {
        $stmt = $this->db->prepare("INSERT INTO annonces (titre, description, prix) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $titre, $description, $prix);
        $stmt->execute();
        $annonce_id = $stmt->insert_id;
        $stmt->close();
        if ($annonce_id) {
            $stmt = $this->db->prepare("INSERT INTO vehicules (marque, modele, annee, kilometrage, annonce_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiii", $marque, $modele, $annee, $kilometrage, $annonce_id);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    public function searchAnnoncesWithPagination($keyword, $marque, $modele, $sort, $page, $perPage) {
        $offset = ($page - 1) * $perPage;
        $orderBy = $this->determineOrderBy($sort);
        
        $query = "SELECT annonces.*, vehicules.marque, vehicules.modele, vehicules.annee FROM annonces JOIN vehicules ON annonces.id = vehicules.annonce_id WHERE 1=1";
        
        $params = [];
        $types = '';
    
        if (!empty($keyword)) {
            $query .= " AND (annonces.titre LIKE ? OR annonces.description LIKE ? OR vehicules.marque LIKE ? OR vehicules.modele LIKE ?)";
            array_push($params, "%$keyword%", "%$keyword%", "%$keyword%", "%$keyword%");
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
    
        $query .= " ORDER BY $orderBy LIMIT ?, ?";
        array_push($params, $offset, $perPage);
        $types .= 'ii';
    
        $stmt = $this->db->prepare($query);
    
        $this->bindDynamicParams($stmt, $types, $params);
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
    
    private function bindDynamicParams($stmt, $types, $params) {
        $stmt->bind_param($types, ...$params);
    }

    private function determineOrderBy($sort) {
        switch ($sort) {
            case 'default': return 'annonces.id ASC';
            case 'prix_asc': return 'annonces.prix ASC';
            case 'prix_desc': return 'annonces.prix DESC';
            case 'km_asc': return 'vehicules.kilometrage ASC';
            case 'km_desc': return 'vehicules.kilometrage DESC';
            case 'date_desc': return 'annonces.date_creation DESC';
            case 'date_asc': return 'annonces.date_creation ASC';
            case 'annee_desc': return 'vehicules.annee DESC';
            case 'annee_asc': return 'vehicules.annee ASC';
            default: return 'annonces.id ASC';
        }
    }

    public function getUniqueBrands() {
        $query = "SELECT DISTINCT marque FROM vehicules ORDER BY marque ASC";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getUniqueModeles() {
        $query = "SELECT DISTINCT modele FROM vehicules ORDER BY modele ASC";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getModelesByMarque($marque) {
        $stmt = $this->db->prepare("SELECT DISTINCT modele FROM vehicules WHERE marque = ?");
        $stmt->bind_param("s", $marque);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getMarqueByModeles($modele) {
        $stmt = $this->db->prepare("SELECT DISTINCT marque FROM vehicules WHERE modele = ?");
        $stmt->bind_param("s", $modele);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getTotalAnnonces($keyword = '', $marque = '', $modele = '') {
        $query = "SELECT COUNT(*) as count FROM annonces JOIN vehicules ON annonces.id = vehicules.annonce_id WHERE 1=1";
        
        $params = []; 
        $types = ''; 
    
        if (!empty($keyword)) {
            $query .= " AND (annonces.titre LIKE ? OR annonces.description LIKE ? OR vehicules.marque LIKE ? OR vehicules.modele LIKE ?)";
            $keywordParam = "%$keyword%";
            array_push($params, $keywordParam, $keywordParam, $keywordParam, $keywordParam);
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
    
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
    
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['count'];
    }
    
}
