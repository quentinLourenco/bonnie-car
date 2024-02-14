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
        text-align: center;
        border: solid 1px  black;
        border-radius: 20px;
        width: 592px;
        height: 554px;
        margin:5vw auto;
        padding: 0px 5vw;
        display: flex;
        flex-direction: column;
    }
    #formContainer{
        text-align: left;
    }
    #formContainer input[type=email],input[type=password]{
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
    <h1>Connectez-vous à votre compte</h1>
    <div id="container">
        <h2>Connectez-vous pour profiter de toutes nos fonctionnalités</h2>
        <div id="formContainer">
            <form action="?action=login" method="post">
        
            <label for="email">Email</label>
            <br>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Mot de passe</label>
            <br>
            <input type="password" id="password" name="password" required>
            <br>
            <a id="passwordForgot" href="#">Mot de passe oublié ?</a>
            <br>
            <input type="submit" value="connexion">
        </form>
        </div>
            <p>Pas de compte ?<a href="?action=registrationPage">Créez-en un !</a></p>
    </div>

<?php 
include_once '../public/includes/footer.php';
?>