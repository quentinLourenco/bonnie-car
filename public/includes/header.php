<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BonnieAndCar</title>
    <link rel="stylesheet" type = "text/css" href =".<?php $glob_dev ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.css" integrity="sha512-imTMcrMfwTWMwbgH3ComWWGCoDCo2jO1Qrvoa7B/Kcy7MrP5XMojK/Ede5uYofzcYyx4aFXdwzsm1QxdQXZreg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type = "text/css" href ="../public/css/account.css">
    <link rel="stylesheet" type = "text/css" href ="../public/css/login.css">
    <link rel="stylesheet" type = "text/css" href ="../public/css/register.css">
    <link rel="stylesheet" type = "text/css" href ="../public/css/ad.css">
    <script>
        
        function toggleChipState(clickedElement) {
            document.querySelectorAll('.chips a').forEach(element => {
                if (element !== clickedElement) {
                    element.classList.remove('chips-on');
                    element.classList.add('chips-off');
                    element.querySelector('svg').style.display = 'none';
                }
            });

            if (clickedElement.classList.contains('chips-off')) {
                clickedElement.classList.remove('chips-off');
                clickedElement.classList.add('chips-on');
                clickedElement.querySelector('svg').style.display = '';
                document.getElementById('selectedType').value = clickedElement.getAttribute('value');
                fetchAllBrands(document.getElementById('selectedType').value );
                
            } else {
                clickedElement.classList.remove('chips-on');
                clickedElement.classList.add('chips-off');
                clickedElement.querySelector('svg').style.display = 'none';
                document.getElementById('selectedType').value = '';
            }
        }

        function fetchAllBrands(type) {
            const url = `index.php?action=getAllBrands${type ? `&type=${type}` : ''}`;
            fetch(url)
            .then(response => response.json())
            .then(data => {
                const brandSelect = document.getElementById('brand');
                brandSelect.innerHTML = '<option value="">Toutes les marques</option>';
                data.brands.forEach(brand => {
                    brandSelect.innerHTML += `<option value="${brand.brand}">${brand.brand}</option>`;
                });
            })
            .catch(error => console.error('Error loading brands:', error));

            const brandSelect = document.getElementById('brand');
            brandSelect.onchange = () => {
                const selectedBrand = brandSelect.value;
                const selectedType = type; 
                fetchAllModels(selectedType, selectedBrand);
            };
        }

        function fetchAllModels(type, brand) {
            let url = 'index.php?action=getAllModels';
            if (type) {
                url += `&type=${type}`;
                if (brand) {
                    url += `&brand=${brand}`;
                }
            }
            
            fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log(data)
                const modelSelect = document.getElementById('model');
                modelSelect.innerHTML = '<option value="">Tous les modèles</option>';
                data.models.forEach(model => {
                    modelSelect.innerHTML += `<option value="${model.model}">${model.model}</option>`;
                });
            })
            .catch(error => console.error('Error loading models:', error));
        }
    </script>
</head>
<body>
    <?php
    $year = date("Y");

    // $glob_dev = '/bonnie-car/public';
    $glob_dev = '';

    $menu_items = [
        ['Accueil', 'index.php'],
        ['Acheter', 'index.php?action=listing'],
        ['Vendre', 'index.php?action=wantToSell'],
        ['A propos', 'index.php'],
        ['Contact', 'https://www.bonnieandcar.com/concept#faq']
    ];

    $submenu_items_buy = [
        ['Moto', "index.php?action=search&keyword=&type=moto&brand=&model=&cc_min=&cc_max=&price_min=&price_max=&sort=default"],
        ['Scooter', 'index.php?action=search&keyword=&type=sccoter&brand=&model=&cc_min=&cc_max=&price_min=&price_max=&sort=default'],
        ['Quad', 'index.php?action=search&keyword=&type=quad&brand=&model=&cc_min=&cc_max=&price_min=&price_max=&sort=default'],
        ['Electrique', 'iindex.php?action=search&keyword=&type=electrique&brand=&model=&cc_min=&cc_max=&price_min=&price_max=&sort=default']
    ];

    $submenu_items_about = [
        ['Qui sommes nous', 'index.php'],
        ['Notre méthodologie', 'index.php'],
        ['FAQ', 'index.php']
    ];
    ?>
        <div class="navbar">
                <img src="<?= $glob_dev ?>/assets/logonew.png" alt="navbar-logo" class="navbar-logo">
                <ul class="navbar-links">
                    <?php foreach ($menu_items as $item): ?>
                        <li>
                            <a href="<?= htmlspecialchars($item[1]) ?>" class="navbar-link <?= ($item[0] == 'Acheter' || $item[0] == 'A propos') ? 'navbar-link--has-submenu' : '' ?>"><?= htmlspecialchars($item[0]) ?></a>
                            <?php if ($item[0] == 'Acheter'): ?>
                                <ul class="navbar-sublinks">
                                <?php foreach ($submenu_items_buy as $subitembuy): ?>
                                    <li><a href="<?= htmlspecialchars($subitembuy[1]) ?>" class="navbar-sublink"><?= htmlspecialchars($subitembuy[0]) ?></a></li>
                                <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <?php if ($item[0] == 'A propos'): ?>
                                <ul class="navbar-sublinks">
                                <?php foreach ($submenu_items_about as $subitemabout): ?>
                                    <li><a href="<?= htmlspecialchars($subitemabout[1]) ?>" class="sub"><?= htmlspecialchars($subitemabout[0]) ?></a></li>
                                <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            </li>
                    <?php endforeach; ?>
                    
                </ul>
                <a href="<?php echo isset($_SESSION['userId']) ? 'index.php?action=accountPage' : 'index.php?action=loginPage'; ?>" class="btn">
                <img src="<?= $glob_dev ?>/assets/icons/myaccount.svg" alt="btn-icon" class="btn-icon">
                    <?php echo isset($_SESSION['userId']) ? 'Mon compte' : 'Se connecter'; ?>
                </a>
            </div>
        </div>

    
  
                            