function esconde() {
    var x = document.getElementById('utilizadores');
    
    if (x.hidden === 'true') {
        x.hidden = 'false';
    } else {
        x.hidden = 'true';
    }

}


function initEvents() {
    
    document.getElementById('partilhar').addEventListener('click', esconde, false);

}
die('asdasd');
document.addEventListener('DOMContentLoaded', initEvents, false);

