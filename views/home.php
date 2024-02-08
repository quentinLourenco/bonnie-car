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


<a href="index.php?action=listing">Go to listing</a>





<?php 
include_once '../public/includes/footer.php';
?>
