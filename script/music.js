// DETECTAR VENTANA
var sPath = window.location.pathname;
var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);

// VARIABLES Y ELEMENTOS PARA EL AUDIO PARA EL BOTÓN DE REPRODUCCIÓN
if(sPage == "inicio.php") {
    var soundClick = new Audio("media/sound/click.wav");
    soundClick.volume = 0.25;
} else {
    var soundClick = new Audio("../media/sound/click.wav");
    soundClick.volume = 0.25;
}

const btnToggle = document.querySelector('.toggle_btn');

// VARIABLES Y ELEMENTOS PARA EL AUDIO PARA LA MÚSICA AMBIENTAL
i = Math.floor(Math.random() * 10);
const music = ['cero', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve'];
var song = document.getElementById(music[i]);
var play_pause = document.getElementById("pp");

window.onload = function(){ // Reproduce la música al cargar la página
    song.volume = 0.06;
    song.play();
}

if(sPage == "inicio.php") {
    btnToggle.addEventListener('click', function () { // Controla la música
        var btn = document.getElementById('pp');
        if (btn.src.match('pause')){
            btn.src = 'media/img/play.png';
            song.pause();
        } else {
            btn.src = 'media/img/pause.png';
            song.play();
        }
        soundClick.load();
        soundClick.play();
    });
} else {
    btnToggle.addEventListener('click', function () { // Controla la música
        var btn = document.getElementById('pp');
        if (btn.src.match('pause')){
            btn.src = '../media/img/play.png';
            song.pause();
        } else {
            btn.src = '../media/img/pause.png';
            song.play();
        }
        soundClick.load();
        soundClick.play();
    });
}
