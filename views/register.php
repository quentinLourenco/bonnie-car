<?php 
include_once '../public/includes/header.php';
?>
        <h2>Inscription</h2>
        <form action="?action=registration" method="post" id="formulaireInscription" onsubmit="return validateForm()">
            <label for="last_name">Nom :</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="first_name">Prenom :</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Téléphone :</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" onchange="verifierMotDePasse()" required>
            <div id="message"></div>

            <label for="confirmPassword">Confirmation :</label>
            <input type="password" id="confirmPassword" name="confirmPassword" onchange="checkConfirmMdp()" required>
            <div id="message2"></div>

            <input type='submit' value="inscription"/>
            <p>Déjà un compte?</p>
            <a href="?action=loginPage">Connectez vous ici.</a>
        </form>
    </div>
    <script src="../public/js/inscription.js"></script>
<?php 
include_once '../public/includes/footer.php';
?>