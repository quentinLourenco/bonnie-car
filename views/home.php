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

<p>La vente de véhicule en toute sécurité et accompagnée</p>
<p>Bonnie & Ride vous accompagne dans la vente ou l’achat d’un véhicule en toute sécurité grâce à nos équipes qui vous fournira un service de qualité vous assurant une tranquillité et un confort pour la vente de votre véhicule, et ce partout en France métropolitaine.</p>

<form action="index.php" method="GET">
    <input type="hidden" name="action" value="search">
        <label for="keyword">Mot-clé:</label>
        <input type="text" name="keyword" id="keyword" placeholder="Entrez un mot-clé">
    <label for="type">Type:</label>
    <select name="type" id="type">
        <option value="">Touts les types</option>
        <option value="moto">Moto</option>
        <option value="scooter">Scooter</option>
        <option value="quad">Quad</option>
    </select>

        <label for="brand">Marque:</label>
        <select name="brand" id="brand" onchange="updateModelOptions(event)">
            <option value="">Toutes les marques</option>
            <?php foreach ($brands as $brand): ?>
                <option value="<?= htmlspecialchars($brand['brand']) ?>"><?= htmlspecialchars($brand['brand']) ?></option>
            <?php endforeach; ?>
        </select>

    
        <label for="model">Modèle:</label>
        <select name="model" id="model" onchange="updateBrandFromModel(event)">
            <option value="">Tous les modèles</option>
        </select>
    
        <input type="submit" value="Rechercher">
</form>


<?php
if (!empty($brands)) {
    echo "<p>Les offres par marques</p>";
    foreach ($brands as $brand) {
        $marqueUrlEncoded = urlencode($brand['brand']);
        
        echo "<a href='index.php?action=search&keyword=&marque={$marqueUrlEncoded}&modele=&sort=default'>";
        echo "<p>" . htmlspecialchars($brand['brand']) . "</p>";
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
        $marqueUrlEncoded = urlencode($bikesAd['brand']);
        $idAd = $bikesAd['id'];

        echo "<a href='index.php?action=detail&id={$idAd}'>";
        echo "<p>" . htmlspecialchars($bikesAd['description']) . "</p>";
        echo "</a>";
    }
} else {
    echo "<p>Aucune annonces de moto trouvée.</p>";
}
?>

<?php
if (!empty($scooterAds)) {
    echo "<p>Nos annonces scooters</p>";
    echo "<a href='index.php?action=search&keyword=&type=scooter&marque=&modele=&sort=default'>Voir tous</a>";
    foreach ($scooterAds as $scooterAd) {
        $marqueUrlEncoded = urlencode($scooterAd['brand']);
        $idAd = $scooterAd['id'];

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
    echo "<p>Nos annonces quads</p>";
    echo "<a href='index.php?action=search&keyword=&type=quad&marque=&modele=&sort=default'>Voir tous</a>";
    foreach ($quadAds as $quadAd) {
        $marqueUrlEncoded = urlencode($quadAd['brand']);
        $idAd = $quadAd['id'];

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
