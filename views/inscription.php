<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../public/css/inscription.css">
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form action="../controllers/inscriptionController.php" method="post" id="formulaireInscription" onsubmit="return validateForm()">
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
        </form>
    </div>
    <script src="../public/js/inscription.js"></script>
</body>
</html>