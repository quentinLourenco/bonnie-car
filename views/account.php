<?php 
include_once '../public/includes/header.php';
$glob_dev = '/bonnie-car/public';
?>
<head>
    <style>
        #main{
            display: flex;
            flex-direction: row;
        }
        h1 {
            font-size: 50px;
            text-align: center;
            margin-top: 90px;
            margin-bottom: 10px;
            font-family: BritanicBoldRegular;
        }
        #divContainer{
            margin: 120px;
            display: flex;
            flex-direction: column;
            align-items: left;
            
        }
        .boxRedirect {      
            width: 287px;
            height: 287px;
            margin: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: #7C7C7C;
            gap: 24px;
        }
        .boxRedirect:hover {
            color: #12486B;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
        }
        .boxRedirect:hover #heartIconRedirect{
            fill: #E72828;
        }
        .boxRedirect:hover .iconRedirect{
            fill: #12486B;
        }
        #boxAction{
            width: 288px;
            height: 152px;
            margin: 8px;
            text-align: right;
            line-height: 40px;
            padding: 15px 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        #boxAction > a {
            font-size: 16px;
            text-decoration: underline;
        }
        #boxAction > #supprimer{
            color: #E72828;
        }

        .submitBtn{
            display: none;
        }
        #modalModif{
            width: 539px;
            height: 579px;
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
        h2{
            font-size: 24px;
            font-family: BritanicBoldRegular;
        }
        label{
            font-size:20px;
            font-family: BritanicBoldRegular;
        }
        .logoInBox{
            width: 63px;
            height: 63px;
        }
        .formInModal{
            margin: 25px 0px;
        }
        .formInModal  input[type=text],input[type=password],input[type=email], input[type=tel]{
            border: none;
            width: 60%;
            margin-bottom: 12px;
        }
        .formInModal input[type=button]{
            border: none;
            text-decoration: underline;
        }
        .formInModal input[type=submit]{
            width: 140px;
            height: 42px;
        }
        #svgExit{
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
        }
    </style>
</head>
    <div id="main">
    <div id="divContainer">
            <div class="boxRedirect" onclick="redirect('favoritePage')">
                <svg width="72" height="61" viewBox="0 0 72 61" xmlns="http://www.w3.org/2000/svg">
                    <path id="heartIconRedirect" fill="#7C7C7C" d="M70.4867 20.4216L70.4855 20.4516V20.4816C70.4855 26.3826 67.1647 32.7643 62.138 38.9857C57.1442 45.1664 50.6428 50.9739 44.666 55.6977L44.665 55.6986C42.2492 57.6113 39.1813 58.6692 36 58.6692C32.8187 58.6692 29.7508 57.6113 27.335 55.6986L27.334 55.6977C21.3572 50.9739 14.8558 45.1664 9.86202 38.9857C4.83532 32.7643 1.51452 26.3826 1.51452 20.4816V20.4516L1.51332 20.4216C1.3272 15.7742 3.09905 11.229 6.47181 7.78224C9.83819 4.34196 14.5274 2.27702 19.5263 2.06202C22.6413 2.11454 25.6824 2.93727 28.3443 4.44214C31.0176 5.95345 33.2091 8.09627 34.7066 10.6456L36 12.8473L37.2934 10.6456C38.7909 8.09627 40.9824 5.95345 43.6557 4.44214C46.3176 2.93727 49.3587 2.11454 52.4737 2.06202C57.4726 2.27702 62.1618 4.34196 65.5282 7.78224C68.9009 11.229 70.6728 15.7742 70.4867 20.4216Z" stroke-width="3"/>
                </svg>
                <h2>Mes favoris</h2>
            </div>

            <div class="boxRedirect" onclick="redirect('salesPage')">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="72" height="72">
                    <path class="iconRedirect" fill="#7C7C7C" d="M21.526,8.284L13.937,.879C13.278,.219,12.33-.104,11.409,.028L4.521,.97c-.547,.075-.93,.579-.855,1.126,.075,.547,.578,.929,1.127,.855l6.889-.942c.306-.042,.622,.063,.851,.292l7.59,7.405c1.045,1.045,1.147,2.68,.323,3.847-.234-.467-.523-.912-.911-1.3l-7.475-7.412c-.658-.658-1.597-.975-2.528-.851l-6.889,.942c-.454,.062-.808,.425-.858,.881l-.765,6.916c-.1,.911,.214,1.804,.864,2.453l7.416,7.353c.944,.945,2.199,1.464,3.534,1.464h.017c1.342-.004,2.6-.532,3.543-1.487l3.167-3.208c.927-.939,1.393-2.159,1.423-3.388l.577-.576c1.925-1.95,1.914-5.112-.032-7.057Zm-15.526,1.716c-.552,0-1-.448-1-1,.006-1.308,1.994-1.307,2,0,0,.552-.448,1-1,1Z"/>
                </svg>
                <h2>Mes ventes</h2>
            </div>

            <div class="boxRedirect" onclick="redirect('documentPage')">
                <svg id="Layer_1" height="72" viewBox="0 0 24 24" width="72" fill="#7C7C7C" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                    <path class="iconRedirect" fill="#7C7C7C" d="m14 7v-6.54a6.977 6.977 0 0 1 2.465 1.59l3.484 3.486a6.954 6.954 0 0 1 1.591 2.464h-6.54a1 1 0 0 1 -1-1zm8 3.485v8.515a5.006 5.006 0 0 1 -5 5h-10a5.006 5.006 0 0 1 -5-5v-14a5.006 5.006 0 0 1 5-5h4.515c.163 0 .324.013.485.024v6.976a3 3 0 0 0 3 3h6.976c.011.161.024.322.024.485zm-8 8.515a1 1 0 0 0 -1-1h-5a1 1 0 0 0 0 2h5a1 1 0 0 0 1-1zm3-4a1 1 0 0 0 -1-1h-8a1 1 0 0 0 0 2h8a1 1 0 0 0 1-1z"/>
                </svg>
                <h2>Mes documents</h2>
            </div>
            <div id="boxAction">
                <a id="modalModification" onclick="showPopup('modalModif')">Voir mes infos personnelles</a>
                <br>
                <a onclick="redirect('logout')" >Déconnexion</a>
                <br>
                <a id="supprimer" onclick="showPopup('ModalSuppression')">Supprimer mon compte</a>
            </div>
        </div>
        <div id="modalModif">
        <h1>Mon Profil</h1>
            <h2>Mes informations personnelles</h2>
            <svg id="svgExit" onclick="showPopup('modalModif')" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.021 512.021" style="enable-background:new 0 0 512.021 512.021;" xml:space="preserve" width="30" height="30">
                <path d="M301.258,256.01L502.645,54.645c12.501-12.501,12.501-32.769,0-45.269c-12.501-12.501-32.769-12.501-45.269,0l0,0   L256.01,210.762L54.645,9.376c-12.501-12.501-32.769-12.501-45.269,0s-12.501,32.769,0,45.269L210.762,256.01L9.376,457.376   c-12.501,12.501-12.501,32.769,0,45.269s32.769,12.501,45.269,0L256.01,301.258l201.365,201.387   c12.501,12.501,32.769,12.501,45.269,0c12.501-12.501,12.501-32.769,0-45.269L301.258,256.01z"/>
            </svg>
            <form action="index.php?action=updateUser" method="post" id="formulaireModification" >
                <div class="formInModal">
                    <label for="last_name">Nom</label>
                    <br>
                    <input type="text" id="last_name" name="last_name" value=<?php echo $userInfo['last_name'] ?> disabled>
                    <input type="button" id="last_nameModif" value="modifier" onclick= "modifChamp('last_name')"/>
                    <input type="hidden" id="champ" name="champ" value="last_name"/>
                    <input type="submit" class="submitBtn "id="last_nameSubmit" value="enregistrer"/>
                </div>
            </form>
            <hr>
            <form action="index.php?action=updateUser" method="post" id="formulaireModification" >
                <div class="formInModal">
                    <label for="first_name">Prenom</label>
                    <br>
                    <input type="text" id="first_name" name="first_name" value=<?php echo $userInfo['first_name'] ?> disabled/>
                    <input type="button" id="first_nameModif" value="modifier" onclick= "modifChamp('first_name')"/>
                    <input type="hidden" id="champ" name="champ" value="first_name"/>
                    <input type="submit" class="submitBtn "id="first_nameSubmit" value="enregistrer"/>
                </div>
            </form>
            <hr>
            <form action="index.php?action=updateUser" method="post" id="formulaireModification" >
                <div class="formInModal">
                    <label for="email">E-mail</label>
                    <br>
                    <input type="email" id="email" name="email" value=<?php echo $userInfo['email'] ?> disabled/>
                    <input type="button" id="emailModif" value="modifier" onclick= "modifChamp('email')"/>
                    <input type="hidden" id="champ" name="champ" value="email"/>
                    <input type="submit" class="submitBtn "id="emailSubmit" value="enregistrer"/>
                </div>
            </form>
            <hr>
            <form action="?action=updateUser" method="post" id="formulaireModification" >
                <div class="formInModal">
                    <label for="phone">Téléphone</label>
                    <br>
                    <input type="tel" id="phone" name="phone" value=<?php echo $userInfo['phone'] ?> disabled/>
                    <input type="button" id="phoneModif" value="modifier" onclick= "modifChamp('phone')"/>
                    <input type="hidden" id="champ" name="champ" value="phone"/>
                    <input type="submit" class="submitBtn "id="phoneSubmit" value="enregistrer"/>
                </div>
            </form>
            <hr>
            <form action="index.php?action=updateUser" method="post" id="formulaireModification" >
                <div class="formInModal">
                    <label for="password">Mot de passe</label>
                    <br>
                    <input type="password" id="password" name="password" disabled/>
                    <input type="button" id="passwordModif" value="modifier" onclick= "modifChamp('password')"/>
                    <input type="hidden" id="champ" name="champ" value="password"/>
                    <input type="submit" class="submitBtn "id="passwordSubmit" value="enregistrer"/>
                </div>
            </form>
            <hr>
        </div>
        <div id="ModalSuppression">
            <h2>Confirmation de suppression du compte utilisateur.</h2>
            <button onclick="redirect('deleteAccount')">oui</button>
            <button onclick="showPopup('ModalSuppression')">non</button>
        </div>
    </div>
    <script src="../public/js/account.js"></script>
<?php 
include_once '../public/includes/footer.php';
?>