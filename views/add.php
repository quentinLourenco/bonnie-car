<?php 
include_once '../public/includes/header.php';
?>
    <h1>Ajouter une annonce</h1>
    <form action="index.php?action=save" method="post">
        Titre: <input type="text" name="titre"><br>
        Description: <textarea name="description"></textarea><br>
        Prix: <input type="text" name="prix"><br>
        Type: 
            <select name="type" id="type">
                <option value="moto">Moto</option>
                <option value="scooter">Scooter</option>
                <option value="quad">Quad</option>
            </select>
        Marque: <input type="text" name="marque"><br>
        Modèle: <input type="text" name="modele"><br>
        Kilomètrage: <input type="text" name="kilometrage"><br>
        Année: <input type="text" name="annee"><br>
        <input type="submit" value="Ajouter">
    </form>
<?php 
include_once '../public/includes/footer.php';
?>