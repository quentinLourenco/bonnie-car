<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail de l'annonce</title>
</head>
<body>
    <h1><?= htmlspecialchars($annonce['titre']) ?></h1>
    <p><?= htmlspecialchars($annonce['description']) ?></p>
    <p>Prix : <?= htmlspecialchars($annonce['prix']) ?> €</p>
</body>
</html>
