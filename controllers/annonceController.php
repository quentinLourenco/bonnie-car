<?php

require_once '../models/Annonce.php';

class AnnonceController {
    private $annonceModel;

    public function __construct() {
        $this->annonceModel = new Annonce();
    }

    public function home() {
        $annonces = $this->annonceModel->getAll();
        require_once '../views/home.php';
    }

    public function detail($id) {
        $annonce = $this->annonceModel->getById($id);
        require_once '../views/annonce.php';
    }

    public function addForm() {
        require_once '../views/add.php';
    }

    public function addAnnonce($titre, $description, $prix, $marque, $modele, $annee) {
        $this->annonceModel->store($titre, $description, $prix, $marque, $modele, $annee);
        header('Location: index.php');
    }
}
