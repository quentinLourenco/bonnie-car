<?php

require_once '../models/annonce.php';

class AnnonceController {
    private $annonceModel;

    public function __construct() {
        $this->annonceModel = new Annonce();
    }

    public function home() {
        $brands = $this->annonceModel->getUniqueBrands();
        $bikesAds = $this->annonceModel->getAdsOfBikes();
        require_once '../views/home.php';
    }

    public function listing() {
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 10; 
    
        $totalAnnonces = $this->annonceModel->getTotalAnnonces(); 
        $totalPages = ceil($totalAnnonces / $perPage);
    
        $annonces = $this->annonceModel->getAnnoncesWithPagination(($page - 1) * $perPage, $perPage); 
    
        $marques = $this->annonceModel->getUniqueBrands();
        $modeles = $this->annonceModel->getUniqueModeles();
    
        require_once '../views/listing.php';
    }

    public function detail($id) {
        $annonce = $this->annonceModel->getById($id);
        require_once '../views/annonce.php';
    }

    public function addForm() {
        require_once '../views/add.php';
    }

    public function addAnnonce($data) {
        if (isset($data['titre'], $data['description'], $data['prix'], $data['type'], $data['marque'], $data['modele'], $data['annee'], $data['kilometrage'])) {
            $titre = $data['titre'];
            $description = $data['description'];
            $prix = floatval($data['prix']);
            $type = $data['type'];
            $marque = $data['marque'];
            $modele = $data['modele'];
            $kilometrage = intval($data['kilometrage']);
            $annee = intval($data['annee']);

            $result = $this->annonceModel->addAnnonce($titre, $description, $prix, $type, $marque, $modele, $kilometrage, $annee);
            if ($result) {
                header("Location: index.php");
            } else {
                echo "Erreur lors de l'ajout de l'annonce.";
            }
        } else {
            echo "Veuillez remplir tous les champs obligatoires.";
        }
    }
    
    public function search() {
        $keyword = $_GET['keyword'] ?? '';
        $type = $_GET['type'] ?? '';
        $marque = $_GET['marque'] ?? '';
        $modele = $_GET['modele'] ?? '';
        $kilometrage = $_GET['kilometrage'] ?? '';
        $sort = $_GET['sort'] ?? 'id_asc';
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 10;

        
        $totalAnnonces = $this->annonceModel->getTotalAnnonces($keyword, $type, $marque, $modele);
        $totalPages = ceil($totalAnnonces / $perPage);

        $annonces = $this->annonceModel->searchAnnoncesWithPagination($keyword, $type, $marque, $modele, $sort, $page, $perPage);
        $marques = $this->annonceModel->getUniqueBrands();
        require_once '../views/listing.php';
    }

    public function getAllModels() {
        $modeles = $this->annonceModel->getUniqueModeles();
        header('Content-Type: application/json');
        echo json_encode($modeles);
    }
    
    public function getModels() {
        $marque = $_GET['marque'] ?? '';
        if (!empty($marque)) {
            $modeles = $this->annonceModel->getModelesByMarque($marque);
            echo json_encode($modeles);
        } else {
            echo json_encode([]);
        }
    }

    public function getBrand() {
        $modele = $_GET['modele'] ?? '';
        if (!empty($modele)) {
            $brand = $this->annonceModel->getMarqueByModeles($modele);
            echo json_encode($brand);
        } else {
            echo json_encode([]);
        }
    }
    
} 

