/*Si clicamos en el botón del sol, borrarémos la clase css dark-mode del div 
con id page y se aplicará el estilo active al sol*/
document.getElementById('id-sun').onclick = function () {
    document.getElementById('page').classList.remove('dark-mode')
    document.getElementById('id-moon').classList.remove('active')
    this.classList.add('active')
    var image = document.getElementById('logonav');
    if (image.src.match("on")) {
        image.src = "IMG/logonav.png";
    } else {
        image.src = "IMG/logonavnoche.png";
    }
    document.getElementById('letra2').classList.add('letradedia')
    document.getElementById('letra2').classList.remove('letradenoche')
    document.getElementById('letra3').classList.add('letradedia')
    document.getElementById('letra3').classList.remove('letradenoche')
    document.getElementById('divtabla').classList.remove('tablanoche')

}
/*Si clicamos en el botón de la luna, añadiremos la clase css dark-mode del div 
con id page y se aplicará el estilo active a la luna*/
document.getElementById('id-moon').onclick = function () {
    document.getElementById('page').classList.add('dark-mode')
    document.getElementById('page').classList.add('dark-mode')
    document.getElementById('id-sun').classList.remove('active')
    this.classList.add('active')
    var image = document.getElementById('logonav');
    if (image.src.match("on")) {
        image.src = "IMG/logonavnoche.png";
    } else {
        image.src = "IMG/logonav.png";
    }
    document.getElementById('letra2').classList.remove('letradedia')
    document.getElementById('letra2').classList.add('letradenoche')
    document.getElementById('letra3').classList.remove('letradedia')
    document.getElementById('letra3').classList.add('letradenoche')

}
