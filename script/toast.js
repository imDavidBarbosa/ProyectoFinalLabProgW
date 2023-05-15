const toast = document.querySelector(".toast"),
      toastnb = document.querySelector(".toastnb"),
      fas = document.querySelector(".check"),
      closeIcon = document.querySelector(".close"),
      closeIconNb = document.querySelector(".closenb"),
      progress = document.querySelector(".progress");

function showToast() {
    toast.classList.add("active");
    progress.classList.add("active");

    setTimeout(() => {
        toast.classList.remove("active");
    }, 5000)

    setTimeout(() => {
        progress.classList.remove("active");
    }, 5300)
}

function showToastPass() {
    document.getElementById("text1").innerHTML = "Correo o contraseña incorrectos";
    document.getElementById("text2").innerHTML = "Favor de verificar sus datos";

    fas.classList.replace("fa-check", "fa-xmark");
    toast.classList.add("active");
    progress.classList.add("active");

    setTimeout(() => {
        toast.classList.remove("active");
    }, 5000)
    
    setTimeout(() => {
        document.getElementById("text1").innerHTML = "¡Registro exitoso!";
        document.getElementById("text2").innerHTML = "Ya puede iniciar sesión";
        progress.classList.remove("active");
        fas.classList.replace("fa-xmark", "fa-check");
    }, 5300)
}

function showToastShop() {
    document.getElementById("text1").innerHTML = "Favor de iniciar sesión";
    document.getElementById("text2").innerHTML = "Para agregar productos inicie sesión";

    fas.classList.replace("fa-check", "fa-xmark");
    toast.classList.add("active");
    progress.classList.add("active");

    setTimeout(() => {
        toast.classList.remove("active");
    }, 5000)
    
    setTimeout(() => {
        document.getElementById("text1").innerHTML = "¡Registro exitoso!";
        document.getElementById("text2").innerHTML = "Ya puede iniciar sesión";
        progress.classList.remove("active");
        fas.classList.replace("fa-xmark", "fa-check");
    }, 5300)
}

closeIcon.addEventListener("click", () => {
    toast.classList.remove("active");

    setTimeout(() => {
        progress.classList.remove("active");
    }, 300)
})
    

function showToastNb() {
    toastnb.classList.add("active");
    progress.classList.add("active");

    setTimeout(() => {
        toastnb.classList.remove("active");
    }, 5000)

    setTimeout(() => {
        progress.classList.remove("active");
    }, 5300)
}

closeIconNb.addEventListener("click", () => {
    toastnb.classList.remove("active");

    setTimeout(() => {
        progress.classList.remove("active");
    }, 300)
})