const tabIdBtnChamp= [document.getElementById('last_nameModif'),document.getElementById('first_nameModif'), document.getElementById('emailModif'),document.getElementById('phoneModif'),document.getElementById('passwordModif')];
var  fieldValue;
function  modifChamp(field) {
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