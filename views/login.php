<?php 
include_once '../public/includes/header.php';
?>
    <div class="container">
        <h2>Connexion</h2>
        <form action="?action=login" method="post">
        
            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="connexion">
            <p>Pas encore de compte?</p>
            <a href="?action=registrationPage">Inscrivez vous ici.</a>
        </form>
    </div>

<?php 
include_once '../public/includes/footer.php';
?>