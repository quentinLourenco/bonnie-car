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


<header>
    <div class="description">
        <h1 class="title">La vente de véhicule en toute sécurité et accompagnée</h3>
            <p class="subtitle">Bonnie & Ride vous accompagne dans la vente ou l’achat d’un véhicule en toute sécurité grâce à nos équipes qui vous fournira un service de qualité vous assurant une tranquillité et un confort pour la vente de votre véhicule, et ce partout en France métropolitaine.</p>
    </div>

    <form action="index.php" method="GET" class="research">
        <h2>Rechercher une annonce</h2>
        <input type="hidden" name="action" value="search">
        <input type="hidden" name="keyword">
        <input type="hidden" id="selectedType" name="type" value="">
        <div class="chips" name="type" id="type">
            <a onclick="toggleChipState(this)" class="chips-off" value="moto">Moto
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 384 512'>
                    <path fill='var(--black)' d='M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z' />
                </svg></a>
            <a onclick="toggleChipState(this)" class="chips-off" value="scooter">Scooter
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 384 512'>
                    <path fill='var(--black)' d='M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z' />
                </svg></a>
            <a onclick="toggleChipState(this)" class="chips-off" value="quad">Quad
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 384 512'>
                    <path fill='var(--black)' d='M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z' />
                </svg></a>
            <a onclick="toggleChipState(this)" class="chips-off" value="electrique">Electrique
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 384 512'>
                    <path fill='var(--black)' d='M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z' />
                </svg></a>
        </div>
        <select name="brand" id="brand">
            <option value="">Tous les modèles</option>
        </select>
        <select name="model" id="model">
            <option value="">Tous les modèles</option>
        </select>
        <input type="hidden" name="cc_min">
        <input type="hidden" name="cc_max">
        <input type="hidden" name="price_min">
        <input type="hidden" name="price_max">
        <input type="hidden" name="sort" value="default">
        <input type="submit" value="Rechercher">
    </form>

</header>
<?php
if (!empty($brandsAds)) {
?>
    <div class="container-title">
        <h2>Les offres par marques</h2>
    </div>
    <div class="container-scroll-x">
        <?php
        foreach ($brandsAds as $brandsAd) {
            $marqueUrlEncoded = urlencode($brandsAd['brand']);
            // Correctly use strtolower to convert brand names to lowercase
            $url = strtolower($brandsAd['brand']);
        ?>
            <a href="index.php?action=search&keyword=&type=&brand=<?= $marqueUrlEncoded ?>&model=&cc_min=&cc_max=&price_min=&price_max=&sort=default" class="container-ads-brand">
                <img src='<?= $glob_dev ?>/assets/images/logos/logo_<?= $url ?>.png' alt='<?= htmlspecialchars($brandsAd['brand']) ?>'/>
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
    <div class="container-bike-ads">
        <?php foreach ($bikeAds as $bikeAd) :
            $model = isset($bikeAd['model']) ? $bikeAd['model'] : 'N/A';
            $model = htmlspecialchars($model);
            $marqueUrlEncoded = urlencode($bikeAd['brand']);
            $idAd = $bikeAd['ad_id'];
        ?>
            <a href='index.php?action=detail&id=<?= $idAd ?>' class='type-ads'>
                <img src='<?= $glob_dev ?>/assets/images/<?= urlencode($bikeAd['picture_url']) ?>' alt='<?= htmlspecialchars($bikeAd['brand']) ?>' class="picture" />
                <p class="reduction">-30%</p>
                <img src='<?= $glob_dev ?>/assets/icons/Coeur.svg' alt='' class="like" />
                <div class="bot">
                    <?php
                    echo "<p class='ad-brand'>" . htmlspecialchars($bikeAd['brand']) . "</p>";
                    echo "<p class='ad-model'>" . $model . "</p>";
                    echo "<p class='ad-mileage-year-type'>" .
                        (isset($bikeAd['mileage']) ? htmlspecialchars($bikeAd['mileage']) . " km" : "N/A") . " | " .
                        (isset($bikeAd['year']) ? htmlspecialchars($bikeAd['year']) : "N/A") . " | " .
                        (isset($bikeAd['type']) && $bikeAd['type'] == 'electrique' ? 'Électrique' : 'Essence') . "</p>";
                    echo "<div class='ad-full-location'><img src='" . $glob_dev . "/assets/icons/location.svg'/><p class='ad-location'>" . htmlspecialchars($bikeAd['location']) . "</p></div>";
                    echo "<p class='ad-price'> " . htmlspecialchars($bikeAd['price']) . '€' . "</p>";
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
?>
    <div class="container-title">
        <h2>Nos annonces scooters</h2>
        <a href='index.php?action=search&keyword=&type=scooter&brand=&model=&cc_min=&cc_max=&price_min=&price_max=&sort=default'>Voir tous</a>
    </div>
    <div class="container-scooter-ads">
        <?php foreach ($scooterAds as $scooterAd) :
            $model = isset($scooterAd['model']) ? $scooterAd['model'] : 'N/A';
            $model = htmlspecialchars($model);
            $marqueUrlEncoded = urlencode($scooterAd['brand']);
            $idAd = $scooterAd['ad_id'];
        ?>
            <a href='index.php?action=detail&id=<?= $idAd ?>' class='type-ads'>
                <img src='<?= $glob_dev ?>/assets/images/<?= urlencode($scooterAd['picture_url']) ?>' alt='<?= htmlspecialchars($scooterAd['brand']) ?>' class="picture" />
                <div class="bot">
                    <?php
                    echo "<p class='ad-brand'>" . htmlspecialchars($scooterAd['brand']) . "</p>";
                    echo "<p class='ad-model'>" . $model . "</p>";
                    echo "<p class='ad-mileage-year-type'>" .
                        (isset($scooterAd['mileage']) ? htmlspecialchars($scooterAd['mileage']) . " km" : "N/A") . " | " .
                        (isset($scooterAd['year']) ? htmlspecialchars($scooterAd['year']) : "N/A") . " | " .
                        (isset($scooterAd['type']) && $scooterAd['type'] == 'electrique' ? 'Électrique' : 'Essence') . "</p>";
                    echo "<div class='ad-full-location'><img src='" . $glob_dev . "/assets/icons/location.svg'/><p class='ad-location'>" . htmlspecialchars($scooterAd['location']) . "</p></div>";
                    echo "<p class='ad-price'> " . htmlspecialchars($scooterAd['price']) . '€' . "</p>";
                    ?>
                </div>
            </a>
        <?php endforeach; ?>

    </div>
<?php
} else {
    echo "<p>Aucune annonce de scooter trouvée.</p>";
}
?>
<?php
if (!empty($quadAds)) {
?>
    <div class="container-title">
        <h2>Nos annonces quads</h2>
        <a href='index.php?action=search&keyword=&type=quad&brand=&model=&cc_min=&cc_max=&price_min=&price_max=&sort=default'>Voir tous</a>
    </div>
    <div class="container-quad-ads">
        <?php foreach ($quadAds as $quadAd) :
            $model = isset($quadAd['model']) ? $quadAd['model'] : 'N/A';
            $model = htmlspecialchars($model);
            $marqueUrlEncoded = urlencode($quadAd['brand']);
            $idAd = $quadAd['ad_id'];
        ?>
            <a href='index.php?action=detail&id=<?= $idAd ?>' class='type-ads'>
                <img src='<?= $glob_dev ?>/assets/images/<?= urlencode($quadAd['picture_url']) ?>' alt='<?= htmlspecialchars($quadAd['brand']) ?>' class="picture" />
                <div class="bot">
                    <?php
                    echo "<p class='ad-brand'>" . htmlspecialchars($quadAd['brand']) . "</p>";
                    echo "<p class='ad-model'>" . $model . "</p>";
                    echo "<p class='ad-mileage-year-type'>" .
                        (isset($quadAd['mileage']) ? htmlspecialchars($quadAd['mileage']) . " km" : "N/A") . " | " .
                        (isset($quadAd['year']) ? htmlspecialchars($quadAd['year']) : "N/A") . " | " .
                        (isset($quadAd['type']) && $quadAd['type'] == 'electrique' ? 'Électrique' : 'Essence') . "</p>";
                    echo "<div class='ad-full-location'><img src='" . $glob_dev . "/assets/icons/location.svg'/><p class='ad-location'>" . htmlspecialchars($quadAd['location']) . "</p></div>";
                    echo "<p class='ad-price'> " . htmlspecialchars($quadAd['price']) . '€' . "</p>";
                    ?>
                </div>
            </a>
        <?php endforeach; ?>

    </div>
<?php
} else {
    echo "<p>Aucune annonce de quad trouvée.</p>";
}
?>

<?php
$adsOfBonnieAndCar = [
    ["poignée de main.svg", "Transparence absolue", "A chaque vente, un mécanicien vous accompagne et regarde avec vous l'historique, l'état administratif, l'état mécanique et l'état esthétique du véhicule pour vous assurer une connaissance précise avant achat."],
    ["balance.svg", "Le juste prix", "L'analyse approfondie de chaque véhicule et sa connaissance marché permet à Bonnie&Car d'être plus précis que les côtes d'occasion classiques. Garantissant à l'acheteur et au vendeur la juste valeur du véhicule au moment de la vente. Ainsi, plus besoin de négocier, vous êtes sûr d'avoir bien acheté votre voiture !"],
    ["Sécurité.svg", "Administratif et paiement sécurisé", "La présence physique lors du rendez-vous d'un agent Bonnie&Car vous assure des démarches administratives simplifiées et un paiement sécurisé."],
];
?>
<div class="container-ads-bonnieAndCar">
    <?php foreach ($adsOfBonnieAndCar as $adOfBonnieAndCar) : ?>
        <div class="container-ad-bonnieAndCar">
            <img src="<?= htmlspecialchars($glob_dev) ?>/assets/icons/<?= htmlspecialchars($adOfBonnieAndCar[0]) ?>" alt="" class="img-ad-bonnieAndCar">
            <h2 class="title-ad-bonnieAndCar"><?= htmlspecialchars($adOfBonnieAndCar[1]) ?></h2>
            <p class="text-ad-bonnieAndCar"><?= htmlspecialchars($adOfBonnieAndCar[2]) ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php
if (!empty($partners)) {
?>
    <div class="container-title">
        <h2>Nos partenaires</h2>
    </div>
    <div class="container-partners">
        <?php
        foreach ($partners as $partner) {
            echo '<div class="container-partner">';
            echo '<img src="' . htmlspecialchars($partner) . '" alt="Image partenaire" style="width: 100px; height:auto;"/>';
            echo '</div>';
        }
        ?>
    </div>
<?php
} else {
    echo "<p>Aucun partenaire trouvé.</p>";
}
?>

<?php
if (!empty($testimonials)) {
?>
    <div class="container-title">
        <h2>Nos témoignages</h2>
        <img src="<?= htmlspecialchars($glob_dev) ?>/assets/images/google-rating.png" alt="Google Rating" class="google-rating">
    </div>
    <div class="container-testimonials">
        <?php
        foreach ($testimonials as $testimonial) {
        ?>
            <div class="container-testimonial">
                <h4><?= htmlspecialchars($testimonial['last_name']) . " " . htmlspecialchars($testimonial['first_name']) ?></h4>
                <p class="subtitle"><?= htmlspecialchars($testimonial['age']) ?> ans</p>
                <p class="stars">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $testimonial['rating']) {
                    ?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="#FFD43B" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                            </svg>
                        <?php
                        } else {
                        ?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="#ffffff" d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z" />
                            </svg>
                    <?php
                        }
                    }
                    ?>

                </p>
                <p class="description"><?= htmlspecialchars($testimonial['description']) ?></p>
            </div>
        <?php
        }
        ?>
    </div>
<?php
} else {
    echo "<p>Aucun témoignage trouvé.</p>";
}
?>

<?php
if (!empty($articles)) {
?>
    <div class="container-title">
        <h2>L'actualité</h2>
    </div>
    <div class="container-articles">
        <?php
        foreach ($articles as $article) {
            echo '<a href="#" class="container-article">';
            if (!empty($article['image'])) {
                echo "<img src='" . htmlspecialchars($glob_dev) . "/assets/images/" . urlencode($article['image']) . "' alt='" . htmlspecialchars($article['title']) . "' class='picture'/>";
            }
            echo "<h4>" . htmlspecialchars($article['title']) . "</h4>";
            echo "<p>"  . htmlspecialchars($article['description']) . "</p>";
            echo '</a>';
        }
        ?>
        <a href='index.php?action=search&keyword=&type=quad&brand=&model=&cc_min=&cc_max=&price_min=&price_max=&sort=default' class="btn-second">Voir tous les articles</a>
    </div>
<?php
} else {
    echo "<p>Aucun article trouvé.</p>";
}
?>
<?php
include_once '../public/includes/footer.php';
?>