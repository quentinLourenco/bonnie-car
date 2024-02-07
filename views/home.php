<?php
session_start();
if($_SESSION['idUtilisateur']===' '){
    header("Location: connexion.php");
}else{
   $idUtilisateur =  $_SESSION['idUtilisateur'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des annonces</title>
    <script>
        function updateModelOptions(event) {
        const marque = event.target.value;
        fetch(`index.php?action=getModels&marque=${marque}`)
            .then(response => response.json())
            .then(data => {
                const modeleSelect = document.getElementById('modele');
                modeleSelect.innerHTML = '<option value="">Tous les modèles</option>';
                data.forEach(modele => {
                    modeleSelect.innerHTML += `<option value="${modele.modele}">${modele.modele}</option>`;
                });
            })
            .catch(error => console.error('Erreur lors du chargement des modèles:', error));
        }
    </script>
</head>
<body>
  <a href="../controllers/deconnexionController.php" onclick="deconnexion()">Déconnexion</a>
    <h1>Annonces</h1>
    <a href="?action=add">Ajouter une annonce</a>
    <form action="index.php" method="GET">
        <input type="hidden" name="action" value="search">
        <div>
            <label for="keyword">Mot-clé:</label>
            <input type="text" name="keyword" id="keyword" placeholder="Entrez un mot-clé">
        </div>
            <div>
                <label for="marque">Marque:</label>
                <select name="marque" id="marque" onchange="updateModelOptions(event)">
                    <option value="">Toutes les marques</option>
                    <?php foreach ($marques as $marqueItem): ?>
                        <option value="<?= htmlspecialchars($marqueItem['marque']) ?>"><?= htmlspecialchars($marqueItem['marque']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="modele">Modèle:</label>
                <select name="modele" id="modele">
                    <option value="">Tous les modèles</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Rechercher">
            </div>

            <label for="sort">Trier par :</label>
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="prix_asc" <?= $sort == 'prix_asc' ? 'selected' : '' ?>>Prix croissant</option>
                <option value="prix_desc" <?= $sort == 'prix_desc' ? 'selected' : '' ?>>Prix décroissant</option>
                <option value="km_asc" <?= $sort == 'km_asc' ? 'selected' : '' ?>>Kilométrage croissant</option>
                <option value="km_desc" <?= $sort == 'km_desc' ? 'selected' : '' ?>>Kilométrage décroissant</option>
                <option value="date_asc" <?= $sort == 'date_asc' ? 'selected' : '' ?>>Plus récent</option>
                <option value="date_desc" <?= $sort == 'date_desc' ? 'selected' : '' ?>>Plus ancien</option>
            </select>
        </form>

    <ul>
    <?php foreach ($annonces as $annonce): ?>
        <li>
            <a href="?action=detail&id=<?= htmlspecialchars($annonce['id']) ?>">
                <?= htmlspecialchars($annonce['titre']) ?> -
                <?= htmlspecialchars($annonce['marque'] ?? 'Marque inconnue') ?> 
                <?= htmlspecialchars($annonce['modele'] ?? 'Modèle inconnu') ?> - 
                <?= htmlspecialchars(number_format($annonce['prix'], 2)) ?>€
            </a>
        </li>
    <?php endforeach; ?>
    </ul>

    <nav>
        <ul class="pagination">
            <?php $totalPages = $totalPages ?? 0;
                for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                    <a class="page-link" href="?action=search&keyword=<?= urlencode($keyword) ?>&marque=<?= urlencode($marque) ?>&modele=<?= urlencode($modele) ?>&sort=<?= urlencode($sort) ?>&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
 </body>
</html>