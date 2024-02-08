<?php 
include_once '../public/includes/header.php';
?>
        <h2>Inscription</h2>
        <form action="?action=registration" method="post" id="formulaireInscription" onsubmit="return validateForm()">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prenom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" required>

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" onchange="verifierMotDePasse()" required>
            <div id="message"></div>

            <label for="confirmMdp">Confirmation :</label>
            <input type="password" id="confirm_mdp" name="confirm_mdp" onchange="checkConfirmMdp()" required>
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