<?php
$keyword = $keyword ?? '';
$type = $type ?? '';
$brand = $brand ?? '';
$model = $model ?? '';
$sort = $sort ?? 'default';
$page = $page ?? 1;

$keyword = $keyword !== null ? urlencode($keyword) : '';
$type = $type !== null ? urlencode($type) : '';
$brand = $brand !== null ? urlencode($brand) : '';
$model = $model !== null ? urlencode($model) : '';
$sort = $sort !== null ? urlencode($sort) : '';

include_once '../public/includes/header.php';
?>
<body>
    <h1>Annonces</h1>
    <a href="?action=add">Ajouter une annonce</a>
    <form action="index.php" method="GET">
        <input type="hidden" name="action" value="search">
    
        <label for="keyword">Mot-clé:</label>
        <input type="text" name="keyword" id="keyword" placeholder="Entrez un mot-clé">
        
        <label for="type">Type:</label>
        <select name="type" id="type">
            <option value="">Toutes les types</option>
            <?php foreach ($types as $type): ?>
                    <option value="<?= htmlspecialchars($type['type']) ?>"><?= htmlspecialchars($type['type']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="brand">Marque:</label>
        <select name="brand" id="brand">
            <option value="">Toutes les marques</option>
            <?php foreach ($brands as $brand): ?>
                <option value="<?= htmlspecialchars($brand['brand']) ?>"><?= htmlspecialchars($brand['brand']) ?></option>
            <?php endforeach; ?>
        </select>
       
        <label for="model">Modèle:</label>
        <select name="model" id="model">
            <option value="">Tous les modèles</option>
            <?php foreach ($models as $model): ?>
                    <option value="<?= htmlspecialchars($model['model']) ?>"><?= htmlspecialchars($model['model']) ?></option>
            <?php endforeach;
            ?>
        </select>

       
        <input type="submit" value="Rechercher">

        <label for="sort">Trier par :</label>
        <select name="sort" id="sort" onchange="this.form.submit()">
            <option value="default" <?= $sort == 'default' ? 'selected' : '' ?>>Par défaut</option>
            <option value="prix_asc" <?= $sort == 'prix_asc' ? 'selected' : '' ?>>Prix croissant</option>
            <option value="prix_desc" <?= $sort == 'prix_desc' ? 'selected' : '' ?>>Prix décroissant</option>
            <option value="km_asc" <?= $sort == 'km_asc' ? 'selected' : '' ?>>Kilométrage croissant</option>
            <option value="km_desc" <?= $sort == 'km_desc' ? 'selected' : '' ?>>Kilométrage décroissant</option>
            <option value="date_asc" <?= $sort == 'date_asc' ? 'selected' : '' ?>>Plus récent</option>
            <option value="date_desc" <?= $sort == 'date_desc' ? 'selected' : '' ?>>Plus ancien</option>
        </select>
    </form>

    <ul>
    <?php foreach ($ads as $ad): ?>
        <li>
            <a href="?action=detail&id=<?= htmlspecialchars($ad['id']) ?>">
                <?= htmlspecialchars($ad['title']) ?> -
                <?= htmlspecialchars($ad['type'] ?? 'Type inconnu') ?> 
                <?= htmlspecialchars($ad['brand'] ?? 'Marque inconnue') ?> 
                <?= htmlspecialchars($ad['model'] ?? 'Modèle inconnu') ?> - 
                <?= htmlspecialchars(number_format($ad['price'], 2)) ?>€
            </a>
        </li>
    <?php endforeach; ?>
    </ul>

    <nav>
        <ul>
            <?php $totalPages = $totalPages ?? 0;
                for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                    <a href="?action=search&keyword=<?= $keyword ?>&marque=<?= $brand ?>&modele=<?= $model ?>&sort=<?= $sort ?>&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav> 

<?php 
include_once '../public/includes/footer.php';
?>
