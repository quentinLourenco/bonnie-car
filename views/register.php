<?php 
include_once '../public/includes/header.php';
?>

<div id="containerRegister">
<h1>Créez votre compte</h1>
<div id=container>
    <h2>Inscrivez-vous pour profiter de toutes nos fonctionnalités</h2>
        <form action="?action=registration" method="post" id="formulaireInscription" onsubmit="return validateForm()">
            <label for="last_name">Nom</label>
            <label for="first_name" id="prenomLabel">Prenom</label>
            <br>
            <input type="text" id="last_name" name="last_name" placeholder="Nom" required>
            <input type="text" id="first_name" name="first_name" placeholder="Prenom" required>
            <br>
            <label for="email">Email</label>
            <br>
            <input type="email" id="email" name="email" placeholder="prenom.nom@domaine.ext" required>
            <br>
            <label for="phone">Téléphone</label>
            <br>
            <input type="tel" id="phone" name="phone" placeholder="0123456789" required>
            <br>
            <label for="password">Mot de passe</label>
            <br>
            <input type="password" id="password" name="password" onchange="verifierMotDePasse()" placeholder="mot de passe" required>
            <br>
            <div id="message"></div>
            <br>
            <label for="confirmPassword">Confirmation</label>
            <br>
            <input type="password" id="confirmPassword" name="confirmPassword" onchange="checkConfirmMdp()" placeholder="mot de passe" required>
            <br>
            <div id="message2"></div>
            <br>
            <input type="checkbox" id="checkBoxConfirmation" onchange="checkValidateConformite()">
            <label for="checkBoxConfirmation" id="checkBoxConfirmationLabel">J'accepte les conditions générales et la <a href="">politique de confidentialité</a></label>
            <br>
            <div id="containerSubmit">
                <input type='submit' value="inscription"/>
                <br>
                <p>Vous avez déjà un compte ? <a href="?action=loginPage">Connexion</a></p>
            </div>
        </form>
</div>
</div>


<script src="../public/js/registerScript.js"></script> 
<?php 
include_once '../public/includes/footer.php';
?>