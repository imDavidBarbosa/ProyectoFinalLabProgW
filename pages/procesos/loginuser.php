<?php 
    session_start();
    // Conexión con la BD
	include "../../database/connection.php";

    // Variables enviadas por POST desde login.php
    $correo = $_POST["email"];
    $pass = sha1($_POST["password"]);

    // Llamada para verificar que exista el usuario registrado
    $cal = "SELECT * FROM usuarios WHERE correo = '$correo'AND contraseña = '$pass'";
    $resultado = mysqli_query($conexion,$cal);

    // Validación de usuarios, ya sea admin, ya sea cliente.
    if(mysqli_num_rows($resultado)>0) {
        $cal = "SELECT roll FROM usuarios WHERE correo = '$correo'";
        $consulta = mysqli_query($conexion,$cal);
        $rol = mysqli_fetch_row($consulta); //Obtiene el rol (admin/cliente)
        $_SESSION['rol'] = implode("", $rol); //Guardar el rol en array de SESSION
        switch($_SESSION['rol']) { // Switch para redireccionar según sea el rol
            case 1: // Admin
                header("Location: ../admin/dashboardadmin.php");
                break;
            case 2: // Cliente
                $cal = "SELECT iduser FROM usuarios WHERE correo = '$correo'";
                $consulta = mysqli_query($conexion,$cal);
                $userid = mysqli_fetch_row($consulta);
                $_SESSION['userid'] = implode("", $userid); // Obtiene el id único del cliente
                header("Location: ../../inicio.php");
                break;
            default:
        }
    } else {
        // En caso de no existir en la BD, se redirige a login.php con 
        // la variable success=2 para la apariación del Toast que menciona
        // el error.
        header("Location: ../login.php?success=2");
    }

?>