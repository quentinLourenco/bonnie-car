<?php 
include_once '../public/includes/header.php';
?>
<?php
if (!empty($brands)) {
    echo "<p>Les offres par marques</p>";
    foreach ($brands as $brand) {
        $marqueUrlEncoded = urlencode($brand['marque']);
        
        echo "<a href='index.php?action=search&keyword=&marque={$marqueUrlEncoded}&modele=&sort=default'>";
        echo "<p>" . htmlspecialchars($brand['marque']) . "</p>";
        echo "</a>";
    }
} else {
    echo "<p>Aucune marque trouvée.</p>";
}
?>

<?php
if (!empty($bikesAds)) {
    echo "<p>Nos annonces motos</p>";
    echo "<a href='index.php?action=search&keyword=&type=moto&marque=&modele=&sort=default'>Voir tous</a>";
    foreach ($bikesAds as $bikesAd) {
        $marqueUrlEncoded = urlencode($bikesAd['marque']);
        $idAd = $bikesAd['id'];

        echo "<a href='index.php?action=detail&id={$idAd}'>";
        echo "<p>" . htmlspecialchars($bikesAd['description']) . "</p>";
        echo "</a>";
    }
} else {
    echo "<p>Aucune annonces trouvée.</p>";
}
?>

<?php
if (!empty($scootersAds)) {
    echo "<p>Nos annonces scooters</p>";
    echo "<a href='index.php?action=search&keyword=&type=scooter&marque=&modele=&sort=default'>Voir tous</a>";
    foreach ($scootersAds as $scootersAd) {
        $marqueUrlEncoded = urlencode($scootersAd['marque']);
        $idAd = $scootersAd['id'];

        echo "<a href='index.php?action=detail&id={$idAd}'>";
        echo "<p>" . htmlspecialchars($scootersAd['description']) . "</p>";
        echo "</a>";
    }
} else {
    echo "<p>Aucune annonces trouvée.</p>";
}
?>

<?php
if (!empty($quadsAds)) {
    echo "<p>Nos annonces quads</p>";
    echo "<a href='index.php?action=search&keyword=&type=quad&marque=&modele=&sort=default'>Voir tous</a>";
    foreach ($quadsAds as $quadsAd) {
        $marqueUrlEncoded = urlencode($quadsAd['marque']);
        $idAd = $quadsAd['id'];

        echo "<a href='index.php?action=detail&id={$idAd}'>";
        echo "<p>" . htmlspecialchars($quadsAd['description']) . "</p>";
        echo "</a>";
    }
} else {
    echo "<p>Aucune annonces trouvée.</p>";
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
        echo "<h4>" . htmlspecialchars($testimonial['nom']) . " " . htmlspecialchars($testimonial['prenom']) . "</h4>";
        echo "<p>Avis : " . htmlspecialchars($testimonial['avis']) . "/5</p>";
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
        echo "<h4>" . htmlspecialchars($article['titre']) . "</h4>";
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
