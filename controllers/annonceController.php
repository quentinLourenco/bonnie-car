<?php

require_once '../models/annonce.php';

class AnnonceController {
    private $annonceModel;

    public function __construct() {
        $this->annonceModel = new Annonce();
    }

    public function home() {
        $annonces = $this->annonceModel->getAll();
        $marques = $this->annonceModel->getUniqueBrands();
        require_once '../views/home.php';
    }

    public function detail($id) {
        $annonce = $this->annonceModel->getById($id);
        require_once '../views/annonce.php';
    }

    public function addForm() {
        require_once '../views/add.php';
    }

    public function addAnnonce($data) {
        if (isset($data['titre'], $data['description'], $data['prix'], $data['marque'], $data['modele'], $data['annee'])) {
            $titre = $data['titre'];
            $description = $data['description'];
            $prix = floatval($data['prix']);
            $marque = $data['marque'];
            $modele = $data['modele'];
            $annee = intval($data['annee']);

            $result = $this->annonceModel->addAnnonce($titre, $description, $prix, $marque, $modele, $annee);
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
        $marque = $_GET['marque'] ?? '';
        $modele = $_GET['modele'] ?? '';
        $annonces = $this->annonceModel->searchAnnonces($keyword, $marque, $modele);
        $marques = $this->annonceModel->getUniqueBrands();
        require_once '../views/home.php';
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
    
} 

