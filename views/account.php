<?php 
include_once '../public/includes/header.php';
?>
<head>
    <style>
        .submitBtn{
            display: none;
        }
        #modalModif{
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }
    </style>
</head>
    <div>
        <h2>Mon compte</h2>
        <button id="modalModification" onclick="showPopup()">Afficher la popin</button>
        <div id="modalModif">
            <h3>JE SUIS UNE MODAL</h3>
            <form action="?action=updateUser" method="post" id="formulaireModification" >
                <div>
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" value="coco" disabled>
                    <input type="button" id="nomModif" value="modifier" onclick= "modifChamp('nom')"/>
                    <input type="hidden" id="champ" name="champ" value="nom"/>
                    <input type="submit" class="submitBtn "id="nomSubmit" value="enregistrer"/>
                </div>
            </form>
            <form action="?action=updateUser" method="post" id="formulaireModification" >
                <div>
                    <label for="prenom">Prenom :</label>
                    <input type="text" id="prenom" name="prenom" value="bouboubou" disabled/>
                    <input type="button" id="prenomModif" value="modifier" onclick= "modifChamp('prenom')"/>
                    <input type="hidden" id="champ" name="champ" value="prenom"/>
                    <input type="submit" class="submitBtn "id="prenomSubmit" value="enregistrer"/>
                </div>
            </form>
            <form action="?action=updateUser" method="post" id="formulaireModification" >
                <div>
                    <label for="email">E-mail :</label>
                    <input type="email" id="email" name="email" value="prenom.nom@example.com" disabled/>
                    <input type="button" id="emailModif" value="modifier" onclick= "modifChamp('email')"/>
                    <input type="hidden" id="champ" name="champ" value="email"/>
                    <input type="submit" class="submitBtn "id="emailSubmit" value="enregistrer"/>
                </div>
            </form>
            <form action="?action=updateUser" method="post" id="formulaireModification" >
                <div>
                    <label for="tel">Téléphone :</label>
                    <input type="tel" id="tel" name="tel" value="0123456789" disabled/>
                    <input type="button" id="telModif" value="modifier" onclick= "modifChamp('tel')"/>
                    <input type="hidden" id="champ" name="champ" value="tel"/>
                    <input type="submit" class="submitBtn "id="telSubmit" value="enregistrer"/>
                </div>
            </form>
        </div>
        
        <label for="mot_de_passe">Mot de passe :</label>
        <a href="index.php?action=logout">deconnexion</a>
    </div>
    <script>
        const tabIdBtnChamp= [document.getElementById('nomModif'),document.getElementById('prenomModif'), document.getElementById('emailModif'),document.getElementById('telModif')];
        function  modifChamp(champ) {
            document.getElementById(champ).disabled = !document.getElementById(champ).disabled;
            let champBtn = document.getElementById(champ.concat('Modif'));
            let submitBtn = document.getElementById(champ.concat('Submit'));
            var formModif = new FormData(document.getElementById('formulaireModification'));
            if(champBtn.value === 'modifier'){
                champBtn.value = 'annuler';
                tabIdBtnChamp.map((elmt)=>{
                    if(elmt !== champBtn){
                        elmt.disabled = true;
                    }
                });
            }else{
                champBtn.value = 'modifier';
                document.getElementById(champ).value = 'coco';
                tabIdBtnChamp.map((elmt)=>{
                    if(elmt !== champBtn){
                        elmt.disabled = false;
                    }
                });
            }
            submitBtn.style.display === 'block'?
                submitBtn.style.display = 'none':
                submitBtn.style.display = 'block';    
        }
        function showPopup() {
            document.getElementById('modalModif').style.display = 'block';
        }
    </script>

<?php 
include_once '../public/includes/footer.php';
?>