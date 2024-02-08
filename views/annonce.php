<?php 
include_once '../public/includes/header.php';
?>
    <h1><?= htmlspecialchars($annonce['titre']) ?></h1>
    <p><?= htmlspecialchars($annonce['description']) ?></p>
    <p>Prix : <?= htmlspecialchars($annonce['prix']) ?> €</p>
<?php 
include_once '../public/includes/footer.php';
?>