<?php
require_once 'database.php';
class Utilisateur {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function enregistrerUtilisateur(string $nom,string $prenom ,string $email,string $mot_de_passe): bool {
        $mdpHash = password_hash($mot_de_passe, PASSWORD_DEFAULT );
        try{
            $stmt = $this->db->getConnection()->prepare("INSERT INTO utilisateur(nom, prenom, email, mot_de_passe) VALUES (?, ?, ?,?)");
            $stmt->bind_param("ssss", $nom, $prenom, $email, $mdpHash);
            $stmt->execute();
            $idUtilisateur = $stmt->insert_id;
            $stmt->close();
            $_SESSION['idUtilisateur'] = $idUtilisateur;
            return true;
        }
        catch(\Exception $exception){
            echo 'Une erreur inattendue s\'est produite '. $exception;
            return false;
        }
    }

    public function getUserByEmail(string $email)  
    {
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getIdByEmail(string $email): int {
        $user= $this->getUserByEmail($email);
        return intval($user['id']);
    }

    public function checkUser(string $email, string $mot_de_passe): bool {
        $user= $this->getUserByEmail($email);
        $mdpHash = $user['mot_de_passe'];
        return(password_verify($mot_de_passe, $mdpHash));
        
    }

    public function deconnexion():bool {
        unset($_SESSION['idUtilisateur']);
        if($_SESSION['idUtilisateur']){
            return false;
        }
        return true;
    }

    public function connexion(string $email,string $mot_de_passe): bool{
        if($this->checkUser($email, $mot_de_passe)){
            $idUtilisateur = $this->getIdByEmail( $email );
            $_SESSION['idUtilisateur'] = $idUtilisateur;
            return true;
        }
        return false;
    }
}

?>