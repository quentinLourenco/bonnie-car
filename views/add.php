<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une annonce</title>
</head>
<body>
    <h1>Ajouter une annonce</h1>
    <form action="index.php?action=save" method="post">
        Titre: <input type="text" name="titre"><br>
        Description: <textarea name="description"></textarea><br>
        Prix: <input type="text" name="prix"><br>
        Marque: <input type="text" name="marque"><br>
        Modèle: <input type="text" name="modele"><br>
        Kilomètrage: <input type="text" name="kilometrage"><br>
        Année: <input type="text" name="annee"><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
