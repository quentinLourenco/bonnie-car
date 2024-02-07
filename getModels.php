<?php
require_once '/models/annonce.php';

$annonceModel = new Annonce();
$marque = $_GET['marque'] ?? '';

$modeles = $annonceModel->getModelesByMarque($marque);
echo json_encode(array_map(function($entry) { return $entry['modele']; }, $modeles));