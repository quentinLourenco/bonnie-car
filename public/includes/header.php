<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BonnieAndCar</title>
    <link rel="stylesheet" type = "text/css" href ="../public/css/style.css">
    <script>
        var checkbox = document.querySelector('.nav-container .checkbox');
        var body = document.body;

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                body.classList.add('no-scroll');
            } else {
                body.classList.remove('no-scroll');
            }
        });
        // document.addEventListener('DOMContentLoaded', function() {
        //     fetchAllModels();
        // });
        // function fetchAllModels() {
        //     fetch('index.php?action=getAllModels')
        //         .then(response => response.json())
        //         .then(data => {
        //             const modelSelect = document.getElementById('model');
        //             modelSelect.innerHTML = '<option value="">Tous les modèles</option>';
        //             data.forEach(model => {
        //                 modelSelect.innerHTML += `<option value="${model.model}">${model.model}</option>`;
        //             });
        //         })
        //         .catch(error => console.error('Error loading models:', error));
        // }
        // function updateBrandOptionsFromType() {
        //     const typeSelect = document.getElementById('type');
        //     const selectedType = typeSelect.value;
        //     const brandSelect = document.getElementById('marque');

        //     fetch(`index.php?action=getMarquesByType&type=${selectedType}`)
        //         .then(response => response.json())
        //         .then(data => {
        //             brandSelect.innerHTML = '<option value="">Toutes les marques</option>';
        //             data.forEach(brand => {
        //                 brandSelect.innerHTML += `<option value="${brand.marque}">${brand.marque}</option>`;
        //             });
        //             updateModelOptions();
        //         })
        //         .catch(error => console.error('Error loading brands:', error));
        // }
        // function updateModelOptionsFromBrand() {
        //     const brandSelect = document.getElementById('marque');
        //     const selectedBrand = brandSelect.value;

        //     fetch(`index.php?action=getModels&marque=${selectedBrand}`)
        //         .then(response => response.json())
        //         .then(data => {
        //             const modelSelect = document.getElementById('modele');
        //             modelSelect.innerHTML = '<option value="">Tous les modèles</option>';
        //             data.forEach(model => {
        //                 modelSelect.innerHTML += `<option value="${model.modele}">${model.modele}</option>`;
        //             });
        //         })
        //         .catch(error => console.error('Error loading models:', error));
        // }

        // function updateBrandFromModel() {
        //     const modelSelect = document.getElementById('modele');
        //     const selectedModel = modelSelect.value;

        //     if (selectedModel) {
        //         fetch(`index.php?action=getBrand&modele=${selectedModel}`)
        //             .then(response => response.json())
        //             .then(data => {
        //                 const brandSelect = document.getElementById('marque');
        //                 brandSelect.value = data[0].marque;
        //             })
        //             .catch(error => console.error('Error fetching brand:', error));
        //     }
        // }

    </script>
</head>
<body>
    <?php
    $year = date("Y");

    $glob_dev = '/bonnie-car/public';

    $menu_items = [
        ['Accueil', 'index.php'],
        ['Acheter', 'index.php'],
        ['Vendre', 'index.php'],
        ['A propos', 'index.php'],
        ['Contact', 'index.php']
    ];

    $submenu_items_buy = [
        ['Moto', 'index.php'],
        ['Scooter', 'index.php'],
        ['Quad', 'index.php'],
        ['Electrique', 'index.php']
    ];

    $submenu_items_about = [
        ['Qui sommes nous', 'index.php'],
        ['Notre méthodologie', 'index.php'],
        ['FAQ', 'index.php']
    ];
    ?>
    <header>
        <div class="navbar">
            <div class="container nav-container">
                <img src="<?= $glob_dev ?>/assets/logonew.png" alt="logo">
                <input class="checkbox" type="checkbox" name="" id="" />
                <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
                </div>
                <ul class="menu-items">
                    <?php foreach ($menu_items as $item): ?>
                        <li>
                            <a href="<?= htmlspecialchars($item[1]) ?>"><?= htmlspecialchars($item[0]) ?></a>
                            <?php if ($item[0] == 'Acheter'): ?>
                                <ul class="submenu">
                                    <?php foreach ($submenu_items_buy as $subitembuy): ?>
                                        <li><a href="<?= htmlspecialchars($subitembuy[1]) ?>" class="sub"><?= htmlspecialchars($subitembuy[0]) ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <?php if ($item[0] == 'A propos'): ?>
                                <ul class="submenu">
                                    <?php foreach ($submenu_items_about as $subitemabout): ?>
                                        <li><a href="<?= htmlspecialchars($subitemabout[1]) ?>" class="sub"><?= htmlspecialchars($subitemabout[0]) ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    <a href="<?php echo isset($_SESSION['idUtilisateur']) ? 'index.php' : 'index.php?action=loginPage'; ?>" class="btn">
                        <?php echo isset($_SESSION['idUtilisateur']) ? 'Mon compte' : 'Se connecter'; ?>
                    </a>
                </ul>
                
            
            </div>
        </div>
    </header>
    
  
                            