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

    public function accountPage(){
        require_once '../views/account.php';
    }

    public function login($data) {
        $email = $data["email"];
        $mot_de_passe = $data["mot_de_passe"];
        if($this->userModel->connexion($email, $mot_de_passe)){
            header("Location: index.php");
            return  "Connexion réussie";
        }else{
            return  "Erreur de connexion";
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
        $tel = $data["tel"];
    
        if (empty($nom) || empty($prenom) || empty($email) || empty($mot_de_passe) || empty($tel) || $mot_de_passe != $confirmMdp) {
            header("Location: index.php?erreur=echec");
        } else {
            if (!($utilisateurExiste = $this->userModel->getUserByEmail($email))) {
                $reponse = $this->userModel->enregistrerUtilisateur($nom, $prenom, $email,$tel, $mot_de_passe);
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

    public function updateUser($data) {
        $champ = $data["champ"];
        $value = $data[$champ];
        $reponse = $this->userModel->updateUser($champ, $value);
        if ($reponse === true) {
            header("Location: index.php");
        } else {
            header("Location: index.php?erreur=echec");
        }
    }
}