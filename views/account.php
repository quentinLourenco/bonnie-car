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
        #ModalSuppression{
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
        <button id="modalModification" onclick="showPopup('modalModif')">Afficher la popin</button>
        <div id="modalModif">
            <h3>JE SUIS UNE MODAL</h3>
            <form action="index.php?action=updateUser" method="post" id="formulaireModification" >
                <div>
                    <label for="last_name">Nom :</label>
                    <input type="text" id="last_name" name="last_name" value=<?php echo $userInfo['last_name'] ?> disabled>
                    <input type="button" id="last_nameModif" value="modifier" onclick= "modifChamp('last_name')"/>
                    <input type="hidden" id="champ" name="champ" value="last_name"/>
                    <input type="submit" class="submitBtn "id="last_nameSubmit" value="enregistrer"/>
                </div>
            </form>
            <form action="index.php?action=updateUser" method="post" id="formulaireModification" >
                <div>
                    <label for="first_name">Prenom :</label>
                    <input type="text" id="first_name" name="first_name" value=<?php echo $userInfo['first_name'] ?> disabled/>
                    <input type="button" id="first_nameModif" value="modifier" onclick= "modifChamp('first_name')"/>
                    <input type="hidden" id="champ" name="champ" value="first_name"/>
                    <input type="submit" class="submitBtn "id="first_nameSubmit" value="enregistrer"/>
                </div>
            </form>
            <form action="index.php?action=updateUser" method="post" id="formulaireModification" >
                <div>
                    <label for="email">E-mail :</label>
                    <input type="email" id="email" name="email" value=<?php echo $userInfo['email'] ?> disabled/>
                    <input type="button" id="emailModif" value="modifier" onclick= "modifChamp('email')"/>
                    <input type="hidden" id="champ" name="champ" value="email"/>
                    <input type="submit" class="submitBtn "id="emailSubmit" value="enregistrer"/>
                </div>
            </form>
            <form action="?action=updateUser" method="post" id="formulaireModification" >
                <div>
                    <label for="phone">Téléphone :</label>
                    <input type="tel" id="phone" name="phone" value=<?php echo $userInfo['phone'] ?> disabled/>
                    <input type="button" id="phoneModif" value="modifier" onclick= "modifChamp('phone')"/>
                    <input type="hidden" id="champ" name="champ" value="phone"/>
                    <input type="submit" class="submitBtn "id="phoneSubmit" value="enregistrer"/>
                </div>
            </form>
            <form action="index.php?action=updateUser" method="post" id="formulaireModification" >
                <div>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" disabled/>
                    <input type="button" id="passwordModif" value="modifier" onclick= "modifChamp('password')"/>
                    <input type="hidden" id="champ" name="champ" value="password"/>
                    <input type="submit" class="submitBtn "id="passwordSubmit" value="enregistrer"/>
                </div>
            </form>
            <button onclick="showPopup('modalModif')">quitter la modal</button>
        </div>
        <div id="ModalSuppression">
            <h2>Confirmation de suppression du compte utilisateur.</h2>
            <br/>
            <button onclick="AccountSuppression()">oui</button>
            <button onclick="showPopup('ModalSuppression')">non</button>
        </div>
        <a href="index.php?action=logout">deconnexion</a>
        <a onclick="showPopup('ModalSuppression')">suppression</a>
        <button onclick="redirectFavorites()">mes favoris</button>
    </div>
    <script>
        const tabIdBtnChamp= [document.getElementById('last_nameModif'),document.getElementById('first_nameModif'), document.getElementById('emailModif'),document.getElementById('phoneModif'),document.getElementById('passwordModif')];
        var  fieldValue;
        function  modifChamp(field) {
            let fieldInput = document.getElementById(field);
            fieldInput.disabled = !fieldInput.disabled;
            let fieldBtn = document.getElementById(field.concat('Modif'));
            let submitBtn = document.getElementById(field.concat('Submit'));
            if(fieldBtn.value === 'modifier'){
                fieldValue = fieldInput.value;
                fieldBtn.value = 'annuler';
                tabIdBtnChamp.map((elmt)=>{
                    if(elmt !== fieldBtn){
                        elmt.disabled = true;
                    }
                });
            }else{
                fieldInput.value = fieldValue;
                fieldBtn.value = 'modifier';
                tabIdBtnChamp.map((elmt)=>{
                    if(elmt !== fieldBtn){
                        elmt.disabled = false;
                    }
                });
            }
            showPopup(field.concat('Submit')); 
        }
        function showPopup(modalId) {
            document.getElementById(modalId).style.display === 'block'?
            document.getElementById(modalId).style.display = 'none':
            document.getElementById(modalId).style.display = 'block';
        }
        function AccountSuppression(){
            window.location.href = 'index.php?action=deleteAccount';
        }
        function redirectFavorites(){
            window.location.href = 'index.php?action=favoritePage';
        }
    </script>

<?php 
include_once '../public/includes/footer.php';
?>