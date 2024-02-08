<?php
require_once '../models/utilisateur.php';
session_start(); 

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$mot_de_passe = $_POST["mot_de_passe"];
$confirmMdp = $_POST["confirm_mdp"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($nom) || empty($prenom) || empty($email) || empty($mot_de_passe) || $mot_de_passe != $confirmMdp) {
        echo "Vous devez remplir tout les champs.";
    } else{
        
        $utilisateur = new Utilisateur();
        if(!($utilisateurExiste = $utilisateur->getUserByEmail($email))){
            $reponse = $utilisateur->enregistrerUtilisateur($nom, $prenom, $email, $mot_de_passe);
            if($reponse === true) {
                $idUtilisateur = $utilisateur->getIdByEmail( $email );
                header("Location: ../views/home.php?idUtilisateur=". $idUtilisateur);
            }else{
                header("Location: ../views/inscription.php?erreur=echec");
            }
        }
        else{
            echo "ECHEC";
        }
    }

}
