<?php

require_once 'database.php';

class Ad {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT ads.*, vehicles.brand, vehicles.model, vehicles.year FROM ads JOIN vehicles ON ads.id = vehicles.ad_id ORDER BY ads.id ASC";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getAdsWithPagination($offset, $limit) {
        $query = "SELECT ads.id, ads.title, ads.description, ads.price, ads.creation_date, vehicles.type, vehicles.brand, vehicles.model, vehicles.year, vehicles.mileage FROM ads JOIN vehicles ON ads.id = vehicles.ad_id ORDER BY creation_date DESC LIMIT ?, ?";
        $stmt = $this->db->prepare($query);
    
        $stmt->bind_param('ii', $offset, $limit);
        $stmt->execute();
    
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getTotalAds($keyword = '', $type = '', $brand = '', $model = '', $cc_min = '', $cc_max = '', $price_min = '', $price_max = '', $first_hand = '', $history = '') {
        $query = "SELECT COUNT(*) as count FROM ads JOIN vehicles ON ads.id = vehicles.ad_id WHERE 1=1";
        
        $params = [];
        $types = '';
        
        if (!empty($keyword)) {
            $query .= " AND (ads.title LIKE ? OR ads.description LIKE ? OR vehicles.brand LIKE ? OR vehicles.model LIKE ? OR vehicles.type LIKE ? OR CAST(vehicles.year AS CHAR) LIKE ? OR CAST(vehicles.mileage AS CHAR) LIKE ?)";
            $keywordParam = "%$keyword%";
            array_push($params, $keywordParam, $keywordParam, $keywordParam, $keywordParam, $keywordParam, $keywordParam, $keywordParam);
            $types .= 'sssssss'; 
        }
        
        if (!empty($brand)) {
            $query .= " AND vehicles.brand = ?";
            array_push($params, $brand);
            $types .= 's';
        }
        
        if (!empty($model)) {
            $query .= " AND vehicles.model = ?";
            array_push($params, $model);
            $types .= 's';
        }
        
        if (!empty($type)) {
            $query .= " AND vehicles.type = ?";
            array_push($params, $type);
            $types .= 's';
        }
        
        if ($cc_min !== null && $cc_min !== '') {
            $query .= " AND vehicles.engine_size >= ?";
            $params[] = $cc_min;
            $types .= 'i';
        }
        if ($cc_max !== null && $cc_max !== '') {
            $query .= " AND vehicles.engine_size <= ?";
            $params[] = $cc_max;
            $types .= 'i';
        }
        if ($price_min !== null && $price_min !== '') {
            $query .= " AND ads.price >= ?";
            $params[] = $price_min;
            $types .= 'd';
        }
        if ($price_max !== null && $price_max !== '') {
            $query .= " AND ads.price <= ?";
            $params[] = $price_max;
            $types .= 'd';
        }
    
        if ($first_hand !== null) {
            $query .= " AND vehicles.first_hand = ?";
            $params[] = $first_hand;
            $types .= 'i'; 
        }
        if ($history !== null) {
            $query .= " AND vehicles.history = ?";
            $params[] = $history;
            $types .= 'i';
        }

        $stmt = $this->db->prepare($query);
        
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        
        return $result['count'];
    }
    

    public function getAdById($id) {
        $stmt = $this->db->prepare("SELECT * FROM ads WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addAd($title, $description, $price, $type, $brand, $model, $year, $mileage) {
        $stmt = $this->db->prepare("INSERT INTO ads (title, description, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $title, $description, $price);
        $stmt->execute();
        $ad_id = $stmt->insert_id;
        $stmt->close();
        if ($ad_id) {
            $stmt = $this->db->prepare("INSERT INTO vehicles (type, brand, model, year, mileage, ad_id) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssiii", $type, $brand, $model, $year, $mileage, $ad_id);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    public function searchAdsWithPagination($keyword, $type, $brand, $model, $cc_min, $cc_max, $price_min, $price_max, $first_hand, $history, $sort, $page, $perPage) {
        $offset = ($page - 1) * $perPage;
        $orderBy = $this->determineOrderBy($sort);
        
        $query = "SELECT ads.*, vehicles.* FROM ads JOIN vehicles ON ads.id = vehicles.ad_id WHERE 1=1";
        
        $params = [];
        $types = '';
    
        if (!empty($keyword)) {
            $query .= " AND (ads.title LIKE ? OR ads.description LIKE ? OR vehicles.brand LIKE ? OR vehicles.model LIKE ? OR vehicles.type LIKE ? OR CAST(vehicles.year AS CHAR) LIKE ? OR CAST(vehicles.mileage AS CHAR) LIKE ?)";
            $keywordParam = "%$keyword%";
            array_push($params, $keywordParam, $keywordParam, $keywordParam, $keywordParam, $keywordParam, $keywordParam, $keywordParam);
            $types .= 'sssssss';
        }
        
        if (!empty($type)) {
            $query .= " AND vehicles.type = ?";
            $params[] = $type;
            $types .= 's';
        }
    
        if (!empty($brand)) {
            $query .= " AND vehicles.brand = ?";
            $params[] = $brand;
            $types .= 's';
        }
    
        if (!empty($model)) {
            $query .= " AND vehicles.model = ?";
            $params[] = $model;
            $types .= 's';
        }
    
        if ($cc_min !== null && $cc_min !== '') {
            $query .= " AND vehicles.engine_size >= ?";
            $params[] = $cc_min;
            $types .= 'i';
        }
        if ($cc_max !== null && $cc_max !== '') {
            $query .= " AND vehicles.engine_size <= ?";
            $params[] = $cc_max;
            $types .= 'i';
        }
        if ($price_min !== null && $price_min !== '') {
            $query .= " AND ads.price >= ?";
            $params[] = $price_min;
            $types .= 'd';
        }
        if ($price_max !== null && $price_max !== '') {
            $query .= " AND ads.price <= ?";
            $params[] = $price_max;
            $types .= 'd';
        }
    
        if ($first_hand !== null) {
            $query .= " AND vehicles.first_hand = ?";
            $params[] = $first_hand;
            $types .= 'i'; 
        }
        if ($history !== null) {
            $query .= " AND vehicles.history = ?";
            $params[] = $history;
            $types .= 'i';
        }
    
        $query .= " ORDER BY $orderBy LIMIT ?, ?";
        $params[] = $offset;
        $params[] = $perPage;
        $types .= 'ii';
    
        $stmt = $this->db->prepare($query);
        if ($stmt === false) {
            throw new Exception("Erreur de préparation de la requête : " . $this->db->error);
        }
    
        if (!empty($types)) {
            $stmt->bind_param($types, ...$params);
        }
    
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
            case 'default': return 'ads.id ASC';
            case 'price_asc': return 'ads.price ASC';
            case 'price_desc': return 'ads.price DESC';
            case 'mileage_asc': return 'vehicles.mileage ASC';
            case 'mileage_desc': return 'vehicles.mileage DESC';
            case 'date_desc': return 'ads.creation_date DESC';
            case 'date_asc': return 'ads.creation_date ASC';
            case 'year_desc': return 'vehicles.year DESC';
            case 'year_asc': return 'vehicles.year ASC';
            default: return 'ads.id ASC';
        }
    }

    public function getUniqueBrands() {
        $query = "SELECT DISTINCT brand FROM vehicles ORDER BY brand ASC";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getUniqueModels() {
        $query = "SELECT DISTINCT model FROM vehicles ORDER BY model ASC";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getUniqueTypes() {
        $query = "SELECT DISTINCT type FROM vehicles ORDER BY type ASC";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getModelsByBrand($brand) {
        $stmt = $this->db->prepare("SELECT DISTINCT model FROM vehicles WHERE brand = ?");
        $stmt->bind_param("s", $brand);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getBrandByModel($model) {
        $stmt = $this->db->prepare("SELECT DISTINCT brand FROM vehicles WHERE model = ?");
        $stmt->bind_param("s", $model);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getBikeAds() {
        $query = "SELECT * FROM ads JOIN vehicles ON ads.id = vehicles.ad_id WHERE vehicles.type = 'moto' ORDER BY creation_date LIMIT 4";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getScooterAds() {
        $query = "SELECT * FROM ads JOIN vehicles ON ads.id = vehicles.ad_id WHERE vehicles.type = 'scooter' ORDER BY creation_date LIMIT 4";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getQuadAds() {
        $query = "SELECT * FROM ads JOIN vehicles ON ads.id = vehicles.ad_id WHERE vehicles.type = 'quad' ORDER BY creation_date LIMIT 4";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getPartnersList() {
        $result = glob('./images/partners/*.png');
        return $result;
    }

    public function getTestimonials() {
        $query = "
        SELECT testimonials.*, users.first_name, users.last_name, users.email FROM testimonials JOIN users ON testimonials.user_id = users.id ORDER BY testimonials.addition_date ASC;;
        ";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getArticles() {
        $query = "
            SELECT * FROM articles ORDER BY publication_date DESC;;
        ";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getBrandsByType($type) {
        $query = "SELECT DISTINCT brand FROM vehicles WHERE type = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $type);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getModelsByType($type) {
        $query = "SELECT DISTINCT model FROM vehicles WHERE type = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $type);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getAdsById($listAd){
        $placeholders = implode(',', array_fill(0, count($listAd), '?'));
        $query = "SELECT * FROM ads WHERE id IN ($placeholders)";
        $stmt = $this->db->prepare($query);

        if ($stmt) {
            $types = str_repeat('i', count($listAd));
            $stmt->bind_param($types, ...$listAd);
            $success = $stmt->execute();
            if ($success) {
                $result = $stmt->get_result();
                $ads = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close();
                return $ads;
            } else {
                echo "Erreur lors de l'exécution de la requête : " . $stmt->error;
            }
        } else {
            echo "Erreur lors de la préparation de la requête : " . $this->db->error;
        }
    }

    public function getSalesByIdUser(){
        $userId = $_SESSION['userId'];
        try{
            $stmt = $this->db->prepare("SELECT * FROM ads WHERE id_customer = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            return  $result->fetch_all(MYSQLI_ASSOC);
        }
        catch (\Exception $exception) {
            error_log('Unexpected error occurred: ' . $exception->getMessage());
            return false;
        }
    }

    public function getBrandsAds() {
        $query = "SELECT DISTINCT brand FROM vehicles ORDER BY brand ASC LIMIT 6";
        $result = $this->db->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
    
}
