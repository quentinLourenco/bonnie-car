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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchAllModels();
        });

        function fetchAllModels() {
            fetch('index.php?action=getAllModels')
                .then(response => response.json())
                .then(data => {
                    const modelSelect = document.getElementById('model');
                    modelSelect.innerHTML = '<option value="">Tous les modèles</option>';
                    data.forEach(model => {
                        modelSelect.innerHTML += `<option value="${model.model}">${model.model}</option>`;
                    });
                })
                .catch(error => console.error('Error loading models:', error));
        }

        function updateBrandOptionsFromType() {
            const typeSelect = document.getElementById('type');
            const selectedType = typeSelect.value;
            const brandSelect = document.getElementById('marque');

            fetch(`index.php?action=getMarquesByType&type=${selectedType}`)
                .then(response => response.json())
                .then(data => {
                    brandSelect.innerHTML = '<option value="">Toutes les marques</option>';
                    data.forEach(brand => {
                        brandSelect.innerHTML += `<option value="${brand.marque}">${brand.marque}</option>`;
                    });
                    // Reset and update model options
                    updateModelOptions();
                })
                .catch(error => console.error('Error loading brands:', error));
        }
        function updateModelOptionsFromBrand() {
            const brandSelect = document.getElementById('marque');
            const selectedBrand = brandSelect.value;

            fetch(`index.php?action=getModels&marque=${selectedBrand}`)
                .then(response => response.json())
                .then(data => {
                    const modelSelect = document.getElementById('modele');
                    modelSelect.innerHTML = '<option value="">Tous les modèles</option>';
                    data.forEach(model => {
                        modelSelect.innerHTML += `<option value="${model.modele}">${model.modele}</option>`;
                    });
                })
                .catch(error => console.error('Error loading models:', error));
        }

        function updateBrandFromModel() {
            const modelSelect = document.getElementById('modele');
            const selectedModel = modelSelect.value;

            if (selectedModel) {
                fetch(`index.php?action=getBrand&modele=${selectedModel}`)
                    .then(response => response.json())
                    .then(data => {
                        const brandSelect = document.getElementById('marque');
                        brandSelect.value = data[0].marque;
                    })
                    .catch(error => console.error('Error fetching brand:', error));
            }
        }

    </script>
</head>
<body>
    <?php
    $menu_items = [
        ['Accueil', 'index.php'],
        ['Acheter', 'index.php'],
        ['Vendre', 'index.php'],
        ['A propos', 'index.php'],
        ['Contact', 'index.php'],
        [isset($_SESSION['idUtilisateur']) ? 'Mon compte' : 'Se connecter', isset($_SESSION['idUtilisateur']) ? 'index.php' : 'index.php?action=loginPage']
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
                            