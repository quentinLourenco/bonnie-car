<?php
require_once 'Database.php';
class Utilisateur {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function enregistrerUtilisateur(string $nom,string $prenom ,string $email,string $mot_de_passe) {
        $mdpHash = password_hash($mot_de_passe, PASSWORD_DEFAULT );
        $stmt = $this->db->getConnection()->prepare("INSERT INTO utilisateur(nom, prenom, email, mot_de_passe) VALUES (?, ?, ?,?)");
        $stmt->bind_param("ssss", $nom, $prenom, $email, $mdpHash);
        $stmt->execute();
        $idUtilisateur = $stmt->insert_id;
        $stmt->close();
        session_start();
        $_SESSION['idUtilisateur'] = $idUtilisateur;
        return true;
    }

    public function getUserByEmail(string $email)  
    {
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getIdByEmail(string $email){
        $user= $this->getUserByEmail($email);
        return intval($user['id']);
    }

    public function checkUser(string $email, string $mot_de_passe): bool {
        $user= $this->getUserByEmail($email);
        $mdpHash = $user['mot_de_passe'];
        return(password_verify($mot_de_passe, $mdpHash));
        
    }

    public function deconnexion(){
        unset($_SESSION['idUtilisateur']);
        return true;
    }

    public function connexion(string $email,string $mot_de_passe){
        if($this->checkUser($email, $mot_de_passe)){
            return $this->getIdByEmail( $email );
        }
        return null;
    }
}

?>