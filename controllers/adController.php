<?php

require_once '../models/ad.php';

class AdController {
    private $adModel;

    public function __construct() {
        $this->adModel = new Ad();
    }

    public function home() {
        $brands = $this->adModel->getUniqueBrands();
        $bikeAds = $this->adModel->getBikeAds(); 
        $scooterAds = $this->adModel->getScooterAds(); 
        $quadAds = $this->adModel->getQuadAds();
        $partners = $this->adModel->getPartnersList(); 
        $testimonials = $this->adModel->getTestimonials();
        $articles = $this->adModel->getArticles();
        require_once '../views/home.php';
    }

    public function listAds() { 
        $keyword = $_GET['keyword'] ?? '';
        $type = $_GET['type'] ?? '';
        $brand = $_GET['brand'] ?? '';
        $model = $_GET['model'] ?? '';
        $cc_min = $_GET['cc_min'] ?? null;
        $cc_max = $_GET['cc_max'] ?? null;
        $price_min = $_GET['price_min'] ?? null;
        $price_max = $_GET['price_max'] ?? null;
        $first_hand = isset($_GET['first_hand']) ? 1 : null;
        $history = isset($_GET['history']) ? 1 : null;
        $sort = $_GET['sort'] ?? 'id_asc';
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 10;
    
        $totalAds = $this->adModel->getTotalAds($keyword, $type, $brand, $model, $cc_min, $cc_max, $price_min, $price_max, $first_hand, $history);
        $totalPages = ceil($totalAds / $perPage);
    
        $ads = $this->adModel->searchAdsWithPagination($keyword, $type, $brand, $model, $cc_min, $cc_max, $price_min, $price_max, $first_hand, $history, $sort, $page, $perPage);
        
        $brands = $this->adModel->getUniqueBrands();
        $models = $this->adModel->getUniqueModels();
        $types = $this->adModel->getUniqueTypes();
        require_once '../views/listing.php';
    }

    public function showAdDetail($id) { 
        $ad = $this->adModel->getAdById($id); 
        require_once '../views/ad.php';
    }

    public function showAddForm() {
        require_once '../views/add.php';
    }

    public function processAddAd($data) {
        if (isset($data['title'], $data['description'], $data['price'], $data['type'], $data['brand'], $data['model'], $data['year'], $data['mileage'])) {
            $title = $data['title'];
            $description = $data['description'];
            $price = floatval($data['price']);
            $type = $data['type'];
            $brand = $data['brand'];
            $model = $data['model'];
            $mileage = intval($data['mileage']);
            $year = intval($data['year']);

            $result = $this->adModel->addAd($title, $description, $price, $type, $brand, $model, $mileage, $year);
            if ($result) {
                header("Location: index.php");
            } else {
                echo "Erreur lors de l'ajout de l'annonce.";
            }
        } else {
            echo "Veuillez remplir tous les champs obligatoires.";
        }
    }
    
    public function searchAds() { 
        $keyword = $_GET['keyword'] ?? '';
        $type = $_GET['type'] ?? '';
        $brand = $_GET['brand'] ?? '';
        $model = $_GET['model'] ?? '';
        $cc_min = $_GET['cc_min'] ?? null;
        $cc_max = $_GET['cc_max'] ?? null;
        $price_min = $_GET['price_min'] ?? null;
        $price_max = $_GET['price_max'] ?? null;
        $first_hand = isset($_GET['first_hand']) ? 1 : null;
        $history = isset($_GET['history']) ? 1 : null;
        $sort = $_GET['sort'] ?? 'id_asc';
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 10;
    
        $totalAds = $this->adModel->getTotalAds($keyword, $type, $brand, $model, $cc_min, $cc_max, $price_min, $price_max, $first_hand, $history);
        $totalPages = ceil($totalAds / $perPage);
    
        $ads = $this->adModel->searchAdsWithPagination($keyword, $type, $brand, $model, $cc_min, $cc_max, $price_min, $price_max, $first_hand, $history, $sort, $page, $perPage);
        
        $brands = $this->adModel->getUniqueBrands();
        $models = $this->adModel->getUniqueModels();
        $types = $this->adModel->getUniqueTypes();
    
        require_once '../views/listing.php';
    }
    
}
