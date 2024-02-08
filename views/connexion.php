<?php
session_start();

?>

<?php 
include_once '../public/includes/header.php';
?>
    <div class="container">
        <h2>Connexion</h2>
        <form action="../controllers/connexionController.php" method="post">
           

            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" required>

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>

            <input type="submit" value="connexion">
            <p>Pas encore de compte?</p>
            <a href="inscription.php">Inscrivez vous ici.</a>
        </form>
    </div>

<?php 
include_once '../public/includes/footer.php';
?>