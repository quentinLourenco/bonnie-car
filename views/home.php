
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des annonces</title>
</head>
<body>
    <h1>Annonces</h1>
    <a href="?action=add">Ajouter une annonce</a>
    <ul>
        <?php foreach ($annonces as $annonce): ?>
            <li>
                <a href="?action=detail&id=<?= $annonce['id'] ?>">
                    <?= htmlspecialchars($annonce['titre']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
