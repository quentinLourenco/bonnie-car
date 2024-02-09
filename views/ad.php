<?php 
include_once '../public/includes/header.php';
?>
    <h1><?= htmlspecialchars($ad['title']) ?></h1>
    <p><?= htmlspecialchars($ad['description']) ?></p>
    <p>Prix : <?= htmlspecialchars($ad['price']) ?> €</p>
<?php 
include_once '../public/includes/footer.php';
?>