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

    <a href="index.php?action=listing">Go to listing</a>





<?php 
include_once '../public/includes/footer.php';
?>
