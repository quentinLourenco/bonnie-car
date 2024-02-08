<?php
require_once '../models/utilisateur.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new Utilisateur();
    }

    public function loginPage(){
        require_once '../views/connexion.php';
    }

    public function registrationPage(){
        require_once '../views/inscription.php';
    }

    public function login($data) {
            $email = $data["email"];
            $mot_de_passe = $data["mot_de_passe"];
            $idUtilisateur = $this->userModel->connexion($email, $mot_de_passe);
            
            if ($idUtilisateur) {
                $_SESSION['idUtilisateur'] = $idUtilisateur;
                header("Location: index.php");
            } else {
                header("Location: ../views/connexion.php?erreur=echec");
            }
    }

    public function logout() {  
        $this->userModel->logout();
        header("Location: index.php");
    }

    public function registration($data) {  
        $nom = $data["nom"];
        $prenom = $data["prenom"];
        $email = $data["email"];
        $mot_de_passe = $data["mot_de_passe"];
        $confirmMdp = $data["confirm_mdp"];
    
        if (empty($nom) || empty($prenom) || empty($email) || empty($mot_de_passe) || $mot_de_passe != $confirmMdp) {
            header("Location: index.php?erreur=echec");
        } else {
            $utilisateur = new Utilisateur();
            if (!($utilisateurExiste = $utilisateur->getUserByEmail($email))) {
                $reponse = $utilisateur->enregistrerUtilisateur($nom, $prenom, $email, $mot_de_passe);
                if ($reponse === true) {
                    header("Location: index.php");
                } else {
                    header("Location: index.php?erreur=echec");
                }
            } else {
                header("Location: index.php?erreur=echec");
            }
        }
    }
}