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
$perPage = 9;
$offset = ($page - 1) * $perPage;

$type = $_GET['type'] ?? '';

$type = urldecode($type);

include_once '../public/includes/header.php';
?>

<body>
    <section class="container-search-ads">
        <form action="index.php" method="GET">
            <input type="hidden" name="action" value="search">
            <h3>
                <svg xmlns="http://www.w3.org/2000/svg" id="Isolation_Mode" data-name="Isolation Mode" viewBox="0 0 24 24" width="512" height="512">
                    <path d="M10.7,2.625a3.481,3.481,0,0,0-6.3,0H0v3H4.395a3.481,3.481,0,0,0,6.3,0H24v-3Z" fill="#12486B" />
                    <path d="M16.455,8.5a3.492,3.492,0,0,0-3.151,2H0v3H13.3a3.481,3.481,0,0,0,6.3,0H24v-3H19.605A3.492,3.492,0,0,0,16.455,8.5Z" fill="#12486B" />
                    <path d="M7.545,16.375a3.492,3.492,0,0,0-3.15,2H0v3H4.395a3.481,3.481,0,0,0,6.3,0H24v-3H10.7A3.492,3.492,0,0,0,7.545,16.375Z" fill="#12486B" />
                </svg>Filtres
            </h3>
            <input type="text" name="keyword" id="keyword" placeholder="Entrez un mot-clé">
            <h3>Marques</h3>
            <select name="type" id="type">
                <option value="">Toutes les types</option>
                <?php foreach ($types as $type) : ?>
                    <option value="<?= htmlspecialchars($type['type']) ?>"><?= htmlspecialchars($type['type']) ?></option>
                <?php endforeach; ?>
            </select>
            <select name="brand" id="brand">
                <option value="">Toutes les marques</option>
                <?php foreach ($brands as $brand) : ?>
                    <option value="<?= htmlspecialchars($brand['brand']) ?>"><?= htmlspecialchars($brand['brand']) ?></option>
                <?php endforeach; ?>
            </select>
            <select name="model" id="model">
                <option value="">Tous les modèles</option>
                <?php foreach ($models as $model) : ?>
                    <option value="<?= htmlspecialchars($model['model']) ?>"><?= htmlspecialchars($model['model']) ?></option>
                <?php endforeach;
                ?>
            </select>
            <h3>Caractéristiques</h3>
            <p class="subtitle">Année</p>
            <div>
                <input type="number" name="year_min" id="year_min" placeholder="2004">
                <input type="number" name="year_max" id="year_max" placeholder="2024">
            </div>
            <p class="subtitle">Kilométrage</p>
            <div>
                <input type="number" name="km_min" id="km_min" placeholder="50 km">
                <input type="number" name="km_max" id="km_max" placeholder="1200 km">
            </div>
            <h3>Cylindrée</h3>
            <select name="" id="">
                <option value="">Tous les cylindrées</option>
                <option value="50">50 cm</option>
                <option value="80">80 km</option>
                <option value="125">125 km</option>
                <option value="250">250 km</option>
                <option value="400">400 km</option>
                <option value="500">500 km</option>
                <option value="600">600 km</option>
                <option value="700">700 km</option>
                <option value="850">850 km</option>
                <option value="1000">1 000 km</option>
                <option value="1200">1 200 km</option>
                <option value="1400">1 400 km</option>
                <option value="1600">1 600 km</option>
                <option value="1800">1 800 km</option>
                <option value="2000">2 000 km</option>
            </select>
            <h3>Prix</h3>
            <div>
                <input type="number" name="price_min" id="price_min" placeholder="Prix min">
                <input type="number" name="price_max" id="price_max" placeholder="Prix max">
            </div>
            <h3>Location</h3>
            <p class="subtitle">Code postal</p>
            <input type="text" placeholder="Exemple: 76323">
            <p class="subtitle">Dans un rayon de :</p>
            <input type="range" min="0" max="200" value="100">
            <h3>Historique</h3>
            <div class="space"><label for="first_hand">Première main:</label><input type="checkbox" name="first_hand" id="first_hand" value="1"></div>
            <div class="space"><label for="history">Historique disponible:</label><input type="checkbox" name="history" id="history" value="1"></div>
            <input type="hidden" name="sort">
            <input type="submit" value="Rechercher">
        </form>
        <div>
            <div class="counter-sort">
                <p><span><?php echo htmlspecialchars($totalAds); ?></span> annonce</p>
                <div>
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
                </div>
            </div>
            <div class="container-grid-ads">
                <?php foreach ($ads as $ad) : ?>
                    <a href='index.php?action=detail&id=<?= htmlspecialchars($ad['ad_id']) ?>' class='type-ads'>
                        <img src='<?= htmlspecialchars($glob_dev) ?>/assets/images/<?= htmlspecialchars(urlencode($ad['picture_url'])) ?>' alt='<?= htmlspecialchars(is_array($ad['brand']) ? implode(', ', $ad['brand']) : $ad['brand']) ?>' class="picture" />
                        <div class="bot">
                            <p class='ad-brand'><?= htmlspecialchars(is_array($ad['brand']) ? implode(', ', $ad['brand']) : $ad['brand']) ?></p>
                            <p class='ad-model'><?= htmlspecialchars(is_array($model) ? implode(', ', $model) : $model) ?></p>
                            <p class='ad-mileage-year-type'><?= htmlspecialchars(isset($ad['mileage']) ? $ad['mileage'] . " km" : "N/A") ?> | <?= htmlspecialchars(isset($ad['year']) ? $ad['year'] : "N/A") ?> | <?= htmlspecialchars(isset($ad['type']) && $ad['type'] == 'electrique' ? 'Électrique' : 'Essence') ?></p>
                            <div class='ad-full-location'>
                                <img src='<?= htmlspecialchars($glob_dev) ?>/assets/icons/location.svg' />
                                <p class='ad-location'><?= htmlspecialchars($ad['location']) ?></p>
                            </div>
                            <p class='ad-price'><?= htmlspecialchars($ad['price']) ?>€</p>
                        </div>
                    </a>

                <?php endforeach; ?>
            </div>
        </div>
        </div>
    </section>
    <?php

    ?>
    <?php
    include_once '../public/includes/footer.php';
    ?>