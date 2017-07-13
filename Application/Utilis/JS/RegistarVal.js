function RegistarVal(eventObject) {
    die('adeus');
    var username = document.forms['registarForm']['username'].value;
    var nome = document.forms['registarForm']['nome'].value;
    var morada = document.forms['registarForm']['morada'].value;
    var contacto = document.forms['registarForm']['contacto'].value;
    var password = document.forms['registarForm']['password'].value;
    var hasError = false;

    if(username.lengh < 6){
        alert("O campo username tem que ter mais de 6 caracteres");
        hasError = true;
    }
    if(nome.lengh <3 ){
        alert("Nome muito pequeno");
        hasError = true;
    }
    
    if (hasError) {
        eventObject.preventDefault();
    }else{
        return true;
    }
}
function initEvents() {

    document.getElementById('registar').addEventListener('click', RegistarVal, false);

}

document.addEventListener('DOMContentLoaded', initEvents, false);

