<?php
    echo '<script>window.close(); window.opener.location.reload();</script>';
    // Conexión a base de datos
    require("../../../database/connection.php");
    // Valores actualizados en el formulario
    $id = $_POST['id'];
    $Nombre = $_POST['nombre'];
    $Usuario = $_POST['usuario'];
    $Correo = $_POST['correo'];
    $Tel = $_POST['telefono'];
    $Rol = $_POST['rol'];

    // Modificar Producto
    $actualizar = "UPDATE usuarios 
    SET nombre_com = '$Nombre', nombre_user = '$Usuario', correo = '$Correo', telefono = '$Tel', roll = '$Rol' 
    WHERE iduser = $id";

    if(!mysqli_query($conexion,$actualizar))
    {
        die('Error');
    }

    // Cerrar la conexión
    mysqli_close($conexion);
?>