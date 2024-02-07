<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bouton de Déconnexion</title>
    </head>
    <body>
    <div class="container">
        <h2>Connexion</h2>
        <form action="../controllers/connexionController.php" method="post">
           

            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" required>

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>

            <input type="submit" value="connexion">
        </form>
    </div>


    </body>
</html>