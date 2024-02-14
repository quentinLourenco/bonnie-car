<?php 
include_once '../public/includes/header.php';
?>
<style>
        h1{
        font-size: 50px;
        text-align: center;
        margin-top: 10vh;
        margin-bottom: 5vh;
        font-family: BritanicBoldRegular;
    }
    h2{
        text-align: center;
        font-size: 24px;
        margin:5vh;
        font-family: BritanicBoldRegular;
    }
    
    label{
        font-family: BritanicBoldRegular;
    }
    #container{
        text-align: left;
        border: solid 1px  black;
        border-radius: 20px;
        width: 592px;
        height: 1100px;
        margin:5vw auto;
        padding: 0px 5vw;
        display: flex;
        flex-direction: column;
    }
    #container input[type=email],input[type=password],input[type=tel],input[type=text]{
        width: 390px;
        height: 68px;
        margin: 12px 0px;
        border-radius: 5px;
        padding-left: 1vw;
    }
    #passwordForgot{
        text-decoration: none;
    }
    input[type=submit]{
        text-align: center;
        margin: 5vh auto;
        margin-bottom: 70px;
        background-color: #FFDE59;
        height: 40px;
        width: 126px;
        border:none;
        border-radius: 5px;
        font-size: 16px;
        font-family: BritanicBoldRegular;
    }
</style>
<h1>Créez votre compte</h1>
<div id=container>
    <h2>Inscrivez-vous pour profiter de toutes nos fonctionnalités</h2>
        <form action="?action=registration" method="post" id="formulaireInscription" onsubmit="return validateForm()">
            <label for="last_name">Nom</label>
            <br>
            <input type="text" id="last_name" name="last_name" required>
            <br>
            <label for="first_name">Prenom</label>
            <br>
            <input type="text" id="first_name" name="first_name" required>
            <br>
            <label for="email">E-mail</label>
            <br>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="phone">Téléphone</label>
            <br>
            <input type="tel" id="phone" name="phone" required>
            <br>
            <label for="password">Mot de passe</label>
            <br>
            <input type="password" id="password" name="password" onchange="verifierMotDePasse()" required>
            <br>
            <div id="message"></div>
            <br>
            <label for="confirmPassword">Confirmation</label>
            <br>
            <input type="password" id="confirmPassword" name="confirmPassword" onchange="checkConfirmMdp()" required>
            <br>
            <div id="message2"></div>

            <input type='submit' value="inscription"/>
            <br>
            <p>Vous avez déjà un compte?<a href="?action=loginPage">Connexion</a></p>
            
        </form>
</div>
        
    <script src="../public/js/inscription.js"></script>
<?php 
include_once '../public/includes/footer.php';
?>