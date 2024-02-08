<?php
require_once '../models/utilisateur.php';

class UserController {
    public function connexion() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $mot_de_passe = $_POST["mot_de_passe"];
            
            $utilisateur = new Utilisateur();
            $idUtilisateur = $utilisateur->connexion($email, $mot_de_passe);
            
            if ($idUtilisateur) {
                $_SESSION['idUtilisateur'] = $idUtilisateur;
                header("Location: ../views/home.php");
                exit();
            } else {
                header("Location: ../views/connexion.php?erreur=echec");
                exit();
            }
        }
    }

    public function deconnexion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        unset($_SESSION['idUtilisateur']);
        // session_destroy();
        header("Location: '../views/connexion.php'") ;
        exit();
    }

    public function inscription() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $email = $_POST["email"];
            $mot_de_passe = $_POST["mot_de_passe"];
            $confirmMdp = $_POST["confirmMdp"];
    
            if (empty($nom) || empty($prenom) || empty($email) || empty($mot_de_passe) || $mot_de_passe != $confirmMdp) {
                $_SESSION['erreurInscription'] = "Vous devez remplir tous les champs et les mots de passe doivent correspondre.";
                header("Location: ../views/inscription.php");
                exit();
            } else {
                $utilisateur = new Utilisateur();
                if (!($utilisateurExiste = $utilisateur->getUserByEmail($email))) {
                    $reponse = $utilisateur->enregistrerUtilisateur($nom, $prenom, $email, $mot_de_passe);
                    if ($reponse === true) {
                        header("Location: ../views/home.php");
                        exit();
                    } else {
                        $_SESSION['erreurInscription'] = "Une erreur est survenue lors de l'inscription.";
                        header("Location: ../views/inscription.php");
                        exit();
                    }
                } else {
                    $_SESSION['erreurInscription'] = "L'email est déjà utilisé par un autre compte.";
                    header("Location: ../views/inscription.php");
                    exit();
                }
            }
        }
    }
    
}