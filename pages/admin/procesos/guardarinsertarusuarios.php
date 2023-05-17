<?php
    echo '<script>window.close(); window.opener.location.reload();</script>';
    // Conexión a base de datos
    require("../../../database/connection.php");

    if ($_POST['pass']) {

        $password = sha1($_POST['pass']);

        // Insertar usuario
        $insertar = "INSERT INTO usuarios (nombre_com, nombre_user, correo, contraseña, telefono, roll) VALUES ('$_POST[nombre]','$_POST[usuario]','$_POST[correo]','$password','$_POST[telefono]','$_POST[rol]')";

        if(!mysqli_query($conexion,$insertar)) {
            die('Error al insertar registro en tabla de empleados en BD SBS');
        }
    }
    //Cerrar conexión
    mysqli_close($conexion);
?>