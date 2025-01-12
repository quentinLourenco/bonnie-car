var  fieldValue;
function  modifChamp(field) {
    const tabIdBtnChamp= [document.getElementById('last_nameModif'),document.getElementById('first_nameModif'), document.getElementById('emailModif'),document.getElementById('phoneModif'),document.getElementById('passwordModif')];
    let fieldInput = document.getElementById(field);
    fieldInput.disabled = !fieldInput.disabled;
    fieldInput.style.border = 'solid 1px  black';
    fieldInput.style.padding = '10px';
    fieldInput.style.borderRadius = '5px';
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
        if(field === 'password'){
            document.getElementById('containerPassword').style.display='block';
        }
    }else{
        fieldInput.value = fieldValue;
        fieldInput.style.border = 'none';
        fieldInput.style.padding = '0px';
        fieldBtn.value = 'modifier';
        tabIdBtnChamp.map((elmt)=>{
            if(elmt !== fieldBtn){
                elmt.disabled = false;
            }
        });
        if(field === 'password'){
            document.getElementById('containerPassword').style.display='none';
        }
    }
    
    showPopup(field.concat('Submit')); 
}
function showPopup(modalId) {
    document.getElementById(modalId).style.display === 'block'?
    document.getElementById(modalId).style.display = 'none':
    document.getElementById(modalId).style.display = 'block';
}

function redirect(path){
    window.location.href = 'index.php?action='+path;
}
function verifierMotDePasse() {
    var motDePasseInput = document.getElementById("changePassword");
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
    var motDePasse = document.getElementById("changePassword").value;
    var confirmMdpInput = document.getElementById("confirmChangePassword");
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
function validateChangePassword(){
    if(verifierMotDePasse() && checkConfirmMdp()){
        return true;
    }
    return false;
}