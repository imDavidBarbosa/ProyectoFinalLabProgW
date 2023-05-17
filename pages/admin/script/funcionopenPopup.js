function openPopup() {
    var fondoDesenfocado = document.createElement("div");
    fondoDesenfocado.setAttribute("id", "fondo-desenfocado");
    document.body.appendChild(fondoDesenfocado);

    var url = event.currentTarget.href;
    var width = 600;
    var height = 600;
    var left = (screen.width/2)-(width/2);
    var top = (screen.height/1)-(height/1);
    window.open(url, 'edit_popup', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width='+width+', height='+height+', top='+top+', left='+left);        
}