// Detecta el evento de cierre de la ventana
window.addEventListener('beforeunload', function() {
    // Recarga la página de fondo
    window.opener.location.reload();
});