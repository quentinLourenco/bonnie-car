<?php 
include_once '../public/includes/header.php';
?>

<section class="container-wantToSell">
    <p class="title">Vous souhaitez vendre ?</p>
    <p>Grâce à Bonnie&Ride, vendre sa moto d’occasion à un particulier est à présent plus simple, plus rapide et plus sécurisé.</p>
<p>Vendez sans contraintes et obtenez bien plus que si vous passiez par une reprise classique en garage, une reprise en concession, un site pour vendre sa moto à un professionnel ou une offre de rachat cash.</p>
<p>A noter que nous acceptons tout type de moto d'occasion : routière, 125, collection, cross, custom, trial, vintage, neuve, permis a2, enduro, circuit, course..</p>
    <div class="bg-yellow">
        Quelques statistiques de vente moto d'occasion :
        <div class="kpis">
            <div class="kpi">
                <p><span>3</span>Appels</p>
                <p>Un vendeur de sa moto a besoin, en moyenne, de moins de 3 contacts qualifiés chez nous</p>
            </div>
            <div class="kpi">
                <p><span>23</span>Jours</p>
                <p>Revendre une moto prend en moyenne 23 jours sur Bonnie&Ride </p>
            </div>
            <div class="kpi">
                <p><span>3</span>Appels</p>
                <p>54% des vendeurs de leur moto vendent en moins de 3 semaines sur notre Bonnie&Ride </p>
            </div>
        </div>
    </div>

    <div class="estimate">
        <p>Vous souhaitez vendre ?</p>
        <p>Votre moto :</p>
        <div class="inputs">
            <div class="input">Année<input type="number" name="year" id="year" placeholder="2004"></div>
            <div class="input">Kilométrage<input type="number" name="km" id="km" placeholder="23000 km"></div>
            <div class="input">Cylindrée<input type="number" name="cc" id="c" placeholder="1000 cc"></div>
            <div class="input">Modèle<input type="text" name="model" id="model" placeholder="Cb hornet"></div>
            <div class="input">Marque<input type="text" name="brand" id="brand" placeholder="Honda"></div>
            <div class="input">Immatriculation<input type="text" name="immat" id="immat" placeholder="GZ-2-TE"></div>
        </div>
        <a href="https://www.largus.fr/cote/motos-cyclos.html" class="btn">Estimer mon véhicule</a>
    </div>
</section>


<?php 
include_once '../public/includes/footer.php';
?>