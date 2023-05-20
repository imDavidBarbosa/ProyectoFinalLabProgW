// SCRIPT PARA EL MENÚ SUPERIOR
window.addEventListener("scroll" , function(){
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
})

// SCRIPT PARA EL PORTAL
window.onscroll = function() {
    const neon = document.querySelector("h2");
    if (window.scrollY >= 300){
        if(neon.classList != "active"){
            neon.classList.toggle("active");
        }
    } else if(window.scrollY < 300) {
        if(neon.classList == "active"){
            neon.classList.toggle("active");
        }
    }
}

// SCRIPT NAV BAR OPTIONS
var marker = document.querySelector('#marker');
var item = document.querySelectorAll('div.optionsmenu a');

function indicador(e) {
    marker.style.left = e.offsetLeft+"px";
    marker.style.width = e.offsetWidth+"px";
}

item.forEach(link => {
    link.addEventListener('mouseover', (e) => {
        indicador(e.target);
    })
})

// SCRIPT NAV BAR SOCIAL
var marker2 = document.querySelector('#marker_social');
var item2 = document.querySelectorAll('div.socialmedia i');

function indicador2(a) {
    marker2.style.left = a.offsetLeft+"px";
    marker2.style.width = a.offsetWidth+"px";
}

item2.forEach(link => {
    link.addEventListener('mouseover', (a) => {
        indicador2(a.target);
    })
})

// LINKS DE LOS ICONOS
function shoppingCart() {
    var sPath = window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    if(sPage == "inicio.php") {
        window.location.href = "pages/cliente/carrito.php";
    } else if (sPage == "dashboardcliente.php") {
        window.location.href = "carrito.php";
    } else {
        window.location.href = "cliente/carrito.php";
    }
}

function whatsapp() {
    window.location.href = "#";
}
