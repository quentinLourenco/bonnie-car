<?php
require_once 'database.php';
class Utilisateur {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUser()  
    {
        if(isset($_SESSION['idUtilisateur'])){
            $stmt = $this->db->getConnection()->prepare("SELECT * FROM utilisateur WHERE id = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            return $result->fetch_assoc();
        }
        
    }

    public function getUserByEmail($email)  
    {
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc(); 
        return $user;
        
    }

    public function checkUser(string $email, string $mot_de_passe){
        $user= $this->getUserByEmail($email);
        $mdpHash = $user['mot_de_passe'];
        if(password_verify($mot_de_passe, $mdpHash)){
            return true;
        }
        return false;
    }

    public function logout():bool {
        unset($_SESSION['idUtilisateur']);
        if($_SESSION['idUtilisateur']){
            return false;
        }
        return true;
    }

    public function connexion(string $email,string $mot_de_passe){
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $utilisateur = $stmt->get_result()->fetch_assoc();
        $mdphasher = $utilisateur['mot_de_passe'];
        if(password_verify($mot_de_passe, $mdphasher)){
            $_SESSION['idUtilisateur'] = $utilisateur['id'];
            return true;
        }
        return false;
    }

    public function enregistrerUtilisateur(string $nom,string $prenom ,string $email,string $tel,string $mot_de_passe): bool {
        $mdpHash = password_hash($mot_de_passe, PASSWORD_BCRYPT );
        try{
            $stmt = $this->db->getConnection()->prepare("INSERT INTO utilisateur(nom, prenom, email,tel, mot_de_passe) VALUES (?, ?, ?,?,?)");
            $stmt->bind_param("sssss", $nom, $prenom, $email,$tel, $mdpHash);
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

    public function updateUser(string $champ,string $value){
        $idUser = $_SESSION['idUtilisateur'];
        try{
            $stmt = $this->db->getConnection()->prepare("UPDATE utilisateur SET $champ=? WHERE id=? ");
            $stmt->bind_param("si", $value,$idUser);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        catch(\Exception $exception){
            echo 'Une erreur inattendue s\'est produite '. $exception;
            return false;
        }
    }
}

?>