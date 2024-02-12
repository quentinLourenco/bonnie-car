<?php 
include_once '../public/includes/header.php';
?>
<h2>Mes favoris</h2>
<ul>
    <?php foreach ($userFavorites as $ad): ?>
        <li>
        <a href="?action=detail&id=<?= isset($ad['ad_id']) ? htmlspecialchars($ad['ad_id']) : '' ?>">
                <?= htmlspecialchars($ad['title'] ?? '' ?: '', ENT_QUOTES | ENT_HTML5, 'UTF-8') ?> -
                <?= htmlspecialchars($ad['description'] ?? 'Type inconnu') ?> 
                <?= htmlspecialchars($ad['creation_date'] ?? 'Marque inconnue') ?> 
                <?= htmlspecialchars(number_format($ad['price'] ?? 0, 2)) ?>€
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<?php 
include_once '../public/includes/footer.php';
?>