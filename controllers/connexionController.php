<?php
require_once '../models/utilisateur.php';
$email = $_POST["email"];
$mot_de_passe = $_POST["mot_de_passe"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $utilisateur = new Utilisateur();
    if($utilisateur->connexion($email,$mot_de_passe)){
        header("Location: ../views/home.php");
    }
    else{
        header("Location: ../views/connexion.php?erreur=echec");
    }
}