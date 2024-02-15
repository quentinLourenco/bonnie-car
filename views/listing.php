<?php
$keyword = $_GET['keyword'] ?? '';
$type = $_GET['type'] ?? '';
$brand = $_GET['brand'] ?? '';
$model = $_GET['model'] ?? '';
$sort = $_GET['sort'] ?? 'default';
$page = $_GET['page'] ?? 1;
$cc_min = $_GET['cc_min'] ?? null;
$cc_max = $_GET['cc_max'] ?? null;
$price_min = $_GET['price_min'] ?? null;
$price_max = $_GET['price_max'] ?? null;
$first_hand = $_GET['first_hand'] ?? null;
$history = $_GET['history'] ?? null;

$cc_min = is_numeric($cc_min) ? $cc_min : null;
$cc_max = is_numeric($cc_max) ? $cc_max : null;
$price_min = is_numeric($price_min) ? $price_min : null;
$price_max = is_numeric($price_max) ? $price_max : null;

$first_hand = isset($first_hand) ? 1 : null;
$history = isset($history) ? 1 : null;

$keyword = urlencode($keyword);
$type = urlencode($type);
$brand = urlencode($brand);
$model = urlencode($model);
$sort = urlencode($sort);

$page = (int)$page; 
$perPage = 10;
$offset = ($page - 1) * $perPage;

include_once '../public/includes/header.php';
?>
<body>
    <section class="container-search-ads">
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

        <label for="cc_min">Cylindrée Min (cc):</label>
        <input type="number" name="cc_min" id="cc_min" placeholder="Ex: 50">

        <label for="cc_max">Cylindrée Max (cc):</label>
        <input type="number" name="cc_max" id="cc_max" placeholder="Ex: 1200">

        <label for="price_min">Prix Min (€):</label>
        <input type="number" name="price_min" id="price_min" placeholder="Ex: 500">

        <label for="price_max">Prix Max (€):</label>
        <input type="number" name="price_max" id="price_max" placeholder="Ex: 15000">

        <label for="">Localisation:</label>
        <input type="text" name="" id="" placeholder="Code Postal">

        <label for="">Rayon (km):</label>
        <select name="" id="">
            <option value="">Sélectionnez le rayon</option>
            <option value="10">10 km</option>
            <option value="20">20 km</option>
            <option value="50">50 km</option>
            <option value="100">100 km</option>
            <option value="200">200 km</option>
        </select>

        <label for="first_hand">Première main:</label>
        <input type="checkbox" name="first_hand" id="first_hand" value="1">
        <label for="history">Historique disponible:</label>
        <input type="checkbox" name="history" id="history" value="1">

       
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
    </section>
    

    <section class="container-listing-ads">
        <ul>
            <?php foreach ($ads as $ad): ?>
                <li>
                <a href="?action=detail&id=<?= isset($ad['ad_id']) ? htmlspecialchars($ad['ad_id']) : '' ?>">
                        <?= htmlspecialchars($ad['title'] ?? '' ?: '', ENT_QUOTES | ENT_HTML5, 'UTF-8') ?> -
                        <?= htmlspecialchars($ad['type'] ?? 'Type inconnu') ?> 
                        <?= htmlspecialchars($ad['brand'] ?? 'Marque inconnue') ?> 
                        <?= htmlspecialchars($ad['model'] ?? 'Modèle inconnu') ?> - 
                        <?= htmlspecialchars(number_format($ad['price'] ?? 0, 2)) ?>€
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    
<?php

?>
<?php 
include_once '../public/includes/footer.php';
?>
