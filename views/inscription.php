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
        <form action="../controllers/inscriptionController.php" method="post">
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
            <input type="password" id="confirmMdp" name="confirmMdp" required>

            <input type="submit" value="inscription">
        </form>
    </div>
    <script>
        function verifierMotDePasse() {

            var motDePasseInput = document.getElementById("mot_de_passe");
            // Récupérer la valeur du mot de passe
            var motDePasse = motDePasseInput.value;

            // Vérifier les critères
            var longueurOK = motDePasse.length >= 8;
            var majusculeOK = /[A-Z]/.test(motDePasse);
            var caractereSpecialOK = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(motDePasse);

            // Afficher un message en fonction des résultats
            var message = "";
            if (longueurOK && majusculeOK && caractereSpecialOK) {
                message = "";
                motDePasseInput.style.border = '';
            } else {
                message = "Le mot de passe doit avoir au moins 8 caractères, 1 majuscule et 1 caractère spécial.";
                motDePasseInput.style.border = '1px solid red';
            }

            // Afficher le message
            document.getElementById("message").innerHTML = message;
        }
    </script>
</body>
</html>