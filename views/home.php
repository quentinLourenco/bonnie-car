<?php
// Assurez-vous que toutes les variables sont initialisées correctement
$keyword = $_GET['keyword'] ?? '';
$type = $_GET['type'] ?? '';
$brand = $_GET['brand'] ?? '';
$model = $_GET['model'] ?? '';
$sort = $_GET['sort'] ?? 'default';
$page = $_GET['page'] ?? 1; // Modification ici pour utiliser $_GET directement
$cc_min = $_GET['cc_min'] ?? null;
$cc_max = $_GET['cc_max'] ?? null;
$price_min = $_GET['price_min'] ?? null;
$price_max = $_GET['price_max'] ?? null;
$first_hand = $_GET['first_hand'] ?? null;
$history = $_GET['history'] ?? null;

// Conversion des valeurs numériques
$cc_min = is_numeric($cc_min) ? $cc_min : null;
$cc_max = is_numeric($cc_max) ? $cc_max : null;
$price_min = is_numeric($price_min) ? $price_min : null;
$price_max = is_numeric($price_max) ? $price_max : null;

// Conversion en booléen pour les valeurs de case à cocher
$first_hand = isset($first_hand) ? 1 : null;
$history = isset($history) ? 1 : null;

// Encodage des paramètres pour utilisation dans les URL
$keyword = urlencode($keyword);
$type = urlencode($type);
$brand = urlencode($brand);
$model = urlencode($model);
$sort = urlencode($sort);

$page = (int)$page; // Assurez-vous que $page est un entier
$perPage = 10;
$offset = ($page - 1) * $perPage;



// Inclure les fichiers nécessaires ici
include_once '../public/includes/header.php';
?>

<header>
    <div class="description">
        <h1 class="title">La vente de véhicule en toute sécurité et accompagnée</h3>
        <p class="subtitle">Bonnie & Ride vous accompagne dans la vente ou l’achat d’un véhicule en toute sécurité grâce à nos équipes qui vous fournira un service de qualité vous assurant une tranquillité et un confort pour la vente de votre véhicule, et ce partout en France métropolitaine.</p>
    </div>


    <div class="research">
        <div class="btns">
            <a href="" class="btn-action btn-active">Acheter</a>
            <a href="" class="btn-action">Vendre</a>
        </div>
            
    
        <form action="index.php" method="GET" class="inputs">
            <input type="hidden" name="action" value="search">
            <select name="type" id="type">
                <option value="">Touts les types</option>
                <option value="moto">Moto</option>
                <option value="scooter">Scooter</option>
                <option value="quad">Quad</option>
            </select>

            <select name="brand" id="brand" onchange="updateModelOptions(event)">
                <option value="">Toutes les marques</option>
                <?php foreach ($brands as $brand): ?>
                    <option value="<?= htmlspecialchars($brand['brand']) ?>"><?= htmlspecialchars($brand['brand']) ?></option>
                <?php endforeach; ?>
            </select>

            <select name="model" id="model" onchange="updateBrandFromModel(event)">
                <option value="">Tous les modèles</option>
            </select>
        
            <input type="submit" value="Rechercher">
        </form>

    </div>
</header>





    <?php
    if (!empty($brandsAds)) {
        echo "<h2>Les offres par marques</h2>";
        ?>
        <div class="container-scroll-x">
        <?php
        foreach ($brandsAds as $brandsAd) {
            $marqueUrlEncoded = urlencode($brandsAd['brand']);
            ?>
            <a href="index.php?action=search&keyword=&type=&brand=<?php echo $marqueUrlEncoded; ?>&model=&cc_min=&cc_max=&price_min=&price_max=&sort=default" class="container-ads-brand">
                <img src="https://static.vecteezy.com/system/resources/previews/020/975/589/original/yamaha-logo-yamaha-icon-transparent-free-png.png" alt=""><?php echo htmlspecialchars($brandsAd['brand']);?>
            </a>
        <?php 
        }
        ?>
        </div>
        <?php
    } else {
        echo "<p>Aucune marque trouvée.</p>";
    }
?>

<?php
if (!empty($bikeAds)) {
    ?>
        <div class="container-title">
            <h2>Nos annonces motos</h2>
            <a href='index.php?action=search&keyword=&type=moto&brand=&model=&cc_min=&cc_max=&price_min=&price_max=&sort=default'>Voir tous</a>
        </div>
        <div class="container-bikes-ads">
        <?php foreach ($bikeAds as $bikeAd): 
            $model = isset($bikeAd['model']) ? $bikeAd['model'] : 'N/A';
            // Now you can safely use htmlspecialchars as you have ensured $model is a string.
            $model = htmlspecialchars($model);
            $marqueUrlEncoded = urlencode($bikeAd['brand']);
            $idAd = $bikeAd['ad_id']; 
        ?>
            <a href='index.php?action=detail&id=<?= $idAd ?>' class='bikes-ads'>
                <img src='<?= $glob_dev ?>/assets/images/<?= urlencode($bikeAd['picture_url']) ?>' alt='<?= htmlspecialchars($bikeAd['brand']) ?>' class="picture"/>
                <div class="bot">
                    <?php
                    echo "<p class='ad-brand'>" . htmlspecialchars($bikeAd['brand']) . "</p>";
                    echo "<p class='ad-model'>" . $model . "</p>";
                    // Corrected concatenation here
                    echo "<p class='ad-mileage-year-type'>" . 
                        (isset($bikeAd['mileage']) ? htmlspecialchars($bikeAd['mileage']) . " km" : "N/A") . " | " .
                        (isset($bikeAd['year']) ? htmlspecialchars($bikeAd['year']) : "N/A") . " | " .
                        (isset($bikeAd['type']) && $bikeAd['type'] == 'electrique' ? 'Électrique' : 'Essence') . "</p>";
                        echo "<div class='ad-full-location'><img src='" . $glob_dev . "/assets/icons/location.svg'/><p class='ad-location'>" . htmlspecialchars($bikeAd['location']) . "</p></div>";
                        echo "<p class='ad-price'> " . htmlspecialchars($bikeAd['price']) . '€'."</p>";
                    ?>
                </div>
            </a>
        <?php endforeach; ?>

        </div>
    <?php
    } else {
        echo "<p>Aucune annonce de moto trouvée.</p>";
    }
    ?>

<?php
if (!empty($scooterAds)) {
    echo "<h2>Nos annonces scooters</h2>";
    echo "<a href='index.php?action=search&keyword=&type=scooter&brand=&model=&cc_min=&cc_max=&price_min=&price_max=&sort=default'>Voir tous</a>";
    foreach ($scooterAds as $scooterAd) {
        $marqueUrlEncoded = urlencode($scooterAd['brand']);
        $idAd = $scooterAd['ad_id'];

        echo "<a href='index.php?action=detail&id={$idAd}'>";
        echo "<p>" . htmlspecialchars($scooterAd['description']) . "</p>";
        echo "</a>";
    }
} else {
    echo "<p>Aucune annonces de scooter trouvée.</p>";
}
?>

<?php
if (!empty($quadAds)) {
    echo "<h2>Nos annonces quads</h2>";
    echo "<a href='index.php?action=search&keyword=&type=quad&brand=&model=&cc_min=&cc_max=&price_min=&price_max=&sort=default'>Voir tous</a>";
    foreach ($quadAds as $quadAd) {
        $marqueUrlEncoded = urlencode($quadAd['brand']);
        $idAd = $quadAd['ad_id'];

        echo "<a href='index.php?action=detail&id={$idAd}'>";
        echo "<p>" . htmlspecialchars($quadAd['description']) . "</p>";
        echo "</a>";
    }
} else {
    echo "<p>Aucune annonces de quad trouvée.</p>";
}
?>

<?php
    $adsOfBonnieAndCar = [
        ["Transparence absolue", "A chaque vente, un mécanicien vous accompagne et regarde avec vous l'historique, l'état administratif, l'état mécanique et l'état esthétique du véhicule pour vous assurer une connaissance précise avant achat."],
        ["Le juste prix", "L'analyse approfondie de chaque véhicule et sa connaissance marché permet à Bonnie&Car d'être plus précis que les côtes d'occasion classiques. Garantissant à l'acheteur et au vendeur la juste valeur du véhicule au moment de la vente. Ainsi, plus besoin de négocier, vous êtes sûr d'avoir bien acheté votre voiture !"],
        ["Administratif et paiement sécurisé", "La présence physique lors du rendez-vous d'un agent Bonnie&Car vous assure des démarches administratives simplifiées et un paiement sécurisé."],
    ];


    foreach ($adsOfBonnieAndCar as $adOfBonnieAndCar) {
        echo "<h2>" . htmlspecialchars($adOfBonnieAndCar[0]) . "</h2>";
        echo "<p>" . htmlspecialchars($adOfBonnieAndCar[1]) . "</p>";
    }
?>

<?php

if (!empty($partners)) {
    echo "<p>Nos annonces quads</p>";
    foreach ($partners as $partner) {
        echo '<img src="' . $partner . '" alt="Image" style="width: 100px;height:auto;"/>';
    }
} else {
    echo "<p>Aucun partenaire trouvé.</p>";
}

?>

<?php

if (!empty($testimonials)) {
    echo "<p>Nos témoignages</p>";
    foreach ($testimonials as $testimonial) {
        echo "<h4>" . htmlspecialchars($testimonial['last_name']) . " " . htmlspecialchars($testimonial['first_name']) . "</h4>";
        echo "<p>Avis : " . htmlspecialchars($testimonial['rating']) . "/5</p>";
        echo "<p>" . htmlspecialchars($testimonial['description']) . "</p>";
    }
} else {
    echo "<p>Aucun témoignage trouvé.</p>";
}

?>

<?php

if (!empty($articles)) {
    echo "<h1>Nos articles</h1>";
    foreach ($articles as $article) {
        echo "<h4>" . htmlspecialchars($article['title']) . "</h4>";
        echo "<p>"  . htmlspecialchars($article['description']) . "/5</p>";
        echo "<p>" . htmlspecialchars($article['image']) . "</p>";
    }
    echo "<a href='#'>Voir tous</a>";
} else {
    echo "<p>Aucun article trouvé.</p>";
}

?>



<br>
<a href="index.php?action=listing">Go to listing</a>

<?php 
include_once '../public/includes/footer.php';
?>
