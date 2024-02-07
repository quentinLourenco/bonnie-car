<?php
session_start();
if($_SESSION['idUtilisateur']===' '){
    header("Location: connexion.php");
}else{
   $idUtilisateur =  $_SESSION['idUtilisateur'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouton de Déconnexion</title>
</head>
<body>
    <p>Bienvenue, Utilisateur <?php echo $idUtilisateur ?>!</p>
    
    <a href="../controllers/deconnexionController.php" onclick="deconnexion()">Déconnexion</a>

    </body>
</html>