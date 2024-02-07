<?php
require_once '../models/utilisateur.php';
session_start(); 
$email = $_POST["email"];
$mot_de_passe = $_POST["mot_de_passe"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $utilisateur = new Utilisateur();
    $idUtilisateur = ($utilisateur->connexion($email,$mot_de_passe));
    isset($idUtilisateur) ?
    header("Location: ../views/home.php?idUtilisateur= " . $idUtilisateur)
    : header("Location: ../views/connexion.php?erreur=echec");

}