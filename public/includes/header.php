<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BonnieAndCar</title>
    <style>
        .nav-menu {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .nav-menu li {
            position: relative;
        }

        .nav-menu a {
            display: block;
            text-decoration: none;
        }

        .submenu {
            display: none;
            position: absolute;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-menu li:hover .submenu {
            display: block;
        }
    </style>
</head>
<body>
    <?php
    $menu_items = [
        ['Accueil', 'index.php'],
        ['Acheter', 'index.php'],
        ['Vendre', 'index.php'],
        ['A propos', 'index.php'],
        ['Contact', 'index.php'],
        [isset($_SESSION['idUtilisateur']) ? 'Mon compte' : 'Se connecter', isset($_SESSION['idUtilisateur']) ? 'index.php' : 'index.php?action=login']
    ];

    $submenu_items = [
        ['Moto', 'index.php'],
        ['Scooter', 'index.php'],
        ['Quad', 'index.php'],
        ['Electrique', 'index.php']
    ];
    ?>

    <nav>
        <ul class="nav-menu">
            <?php foreach ($menu_items as $item): ?>
                <li>
                    <a href="<?= htmlspecialchars($item[1]) ?>"><?= htmlspecialchars($item[0]) ?></a>
                    <?php if ($item[0] == 'Acheter'): ?>
                        <ul class="submenu">
                            <?php foreach ($submenu_items as $subitem): ?>
                                <li><a href="<?= htmlspecialchars($subitem[1]) ?>"><?= htmlspecialchars($subitem[0]) ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
                            