<?php
	// Conexión con la BD
	include "../../database/connection.php";

    if ($_POST['pass'] == $_POST['passconf']) {

        $password = sha1($_POST['pass']);

        // Insertar usuario
        $call = "INSERT INTO usuarios (nombre_com, nombre_user, correo, contraseña, telefono, roll) VALUES ('$_POST[nomcom]','$_POST[nomus]','$_POST[email]','$password','$_POST[telcel]', 2)";

        if(!mysqli_query($conexion,$call)) {
            include ("register.php");
            die('Error al insertar registro en tabla de empleados en BD SBS');
        }

        header("Location: ../login.php?success=1");

    } else {
        header("Location: ../register.php?success=0");
    }
    //Cerrar conexión
    mysqli_close($conexion);
?>