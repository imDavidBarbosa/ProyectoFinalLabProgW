<?php
    echo '<script>window.close(); window.opener.location.reload();</script>';
    // Conexión a base de datos
    require("../../../database/connection.php");
    // Valores actualizados en el formulario
    $id = $_POST['idventa'];
    $estatus = $_POST['estatus'];

    // Modificar Producto
    $actualizar = "UPDATE ventas SET idestatus = '$estatus' WHERE idventa = $id";

    if(!mysqli_query($conexion,$actualizar))
    {
        die('Error');
    }

    // Cerrar la conexión
    mysqli_close($conexion);
?>