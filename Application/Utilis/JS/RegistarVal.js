function RegistarVal(evt) {
    var username = document.forms['registarForm']['username'].value;
    var nome = document.forms['registarForm']['nome'].value;
    var morada = document.forms['registarForm']['morada'].value;
    var contacto = document.forms['registarForm']['contacto'].value;
    var password = document.forms['registarForm']['password'].value;
    var pattern_username = new RegExp("[^a-zA-Z0-9]", "g");
    var pattern_nome = new RegExp("[a-zA-Z]");
    var pattern_contacto = new RegExp("^9[1236][0-9]{7}|2[1-9][0-9]{7}$", "g");
    var hasError = false;

    if(username.lengh < 6){
        alert("O campo username tem que ter mais de 6 caracteres");
        hasError = true;
    }else if (pattern_username.test(username)){
        alert("O campo username so pode conter letras e numeros");
    }
    if(nome.lengh <3 ){
        alert("Nome muito pequeno");
        hasError = true;
    }else if(pattern_nome.test(nome)){
        alert("O nome so pode conter letras");
        
        hasError = true;
    }
    
    if (hasError) {
        evt.preventDefault();
    }
}
function initEvents() {

    document.getElementById('registar').addEventListener('click', RegistarVal, false);

}

document.addEventListener('DOMContentLoaded', initEvents, false);

