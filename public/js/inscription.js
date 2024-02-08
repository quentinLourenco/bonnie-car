function validateForm() {
    if(verifierMotDePasse() && checkConfirmMdp()){
        return true;
    }
    return false;
}

function verifierMotDePasse() {
    var motDePasseInput = document.getElementById("mot_de_passe");
    // Récupérer la valeur du mot de passe
    var motDePasse = motDePasseInput.value;

    // Vérifier les critères
    var longueurOK = motDePasse.length >= 8;
    var majusculeOK = /[A-Z]/.test(motDePasse);
    var caractereSpecialOK = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(motDePasse);

    // Afficher un message en fonction des résultats
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
    var motDePasse = document.getElementById("mot_de_passe").value;
    var confirmMdpInput = document.getElementById("confirm_mdp");
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