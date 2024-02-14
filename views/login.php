<?php 
include_once '../public/includes/header.php';
?>
<link rel="stylesheet" type = "text/css" href ="../public/css/login.css">
    <h1>Connectez-vous à votre compte</h1>
    <div id="container">
        <h2>Connectez-vous pour profiter de toutes nos fonctionnalités</h2>
            <form action="?action=login" method="post">
                <div id="inputAndLabel">
                    <label for="email">Email</label>
                    <br>
                    <input type="email" id="email" name="email" placeholder="prenom.nom@domaine.ext" required>
                    <br>
                    <label for="password">Mot de passe</label>
                    <br>
                    <input type="password" id="password" name="password" placeholder="mot de passe" required>
                    <br>
                </div>
                <div id="textPasswordForgot">
                    <a id="passwordForgot" href="#">Mot de passe oublié ?</a>
                </div>
                <br>
                <input type="submit" value="CONNEXION">
            </form>
        <p>Pas de compte ?<a href="?action=registrationPage">Créez-en un !</a></p>
    </div>

<?php 
include_once '../public/includes/footer.php';
?>