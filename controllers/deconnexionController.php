<?php
require_once '../models/utilisateur.php';
session_start();

$utilisateur = new Utilisateur();
if($utilisateur->deconnexion()){
    header("Location: ../views/connexion.php");
}
