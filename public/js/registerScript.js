function validateForm() {
    if(verifierMotDePasse() && checkConfirmMdp() && checkValidateConformite() ){
        return true;
    }
    return false;
}

function verifierMotDePasse() {
    var motDePasseInput = document.getElementById("password");
    var motDePasse = motDePasseInput.value;

    var longueurOK = motDePasse.length >= 8;
    var majusculeOK = /[A-Z]/.test(motDePasse);
    var caractereSpecialOK = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(motDePasse);

    var message = "";
    if (longueurOK && majusculeOK && caractereSpecialOK) {
        message = "";
        motDePasseInput.style.border = '';
        document.getElementById("message").innerHTML = message;
        return true;
    } else {
        message = "Le mot de passe doit avoir au moins 8 caractères, 1 majuscule et 1 caractère spécial.";
        motDePasseInput.style.border = '1px solid red';
        document.getElementById("message").innerHTML = message;
        return false;
    }
}

function checkConfirmMdp(){
    var motDePasse = document.getElementById("password").value;
    var confirmMdpInput = document.getElementById("confirmPassword");
    var confirmMdp = confirmMdpInput.value;
    var message = "";

    if(motDePasse === confirmMdp){
        message = "";
        confirmMdpInput.style.border = '';
        document.getElementById("message2").innerHTML = message;
        return true;
    }
    else{
        message = "les 2 mots de passes sont différents";
        confirmMdpInput.style.border = '1px solid red';
        document.getElementById("message2").innerHTML = message;
        return false;
    }
    
}

function checkValidateConformite(){
    var checkBoxValidate = document.getElementById("checkBoxConfirmation");
    if(checkBoxValidate.checked){
        document.getElementById("checkBoxConfirmationLabel").style.color = "black";
        return true;
    }
    else{
        document.getElementById("checkBoxConfirmationLabel").style.color = "red";
        return false;
    }
}