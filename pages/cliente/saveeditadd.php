<?php 
    echo '<script>window.close(); window.opener.location.reload();</script>';
    session_start();
    require("../../database/connection.php");
    // Valores actualizados en el formulario
    $calle = $_POST['calle'];
    $numext = $_POST['numext'];
    $numint = $_POST['numint'];
    $col = $_POST['col'];
    $mun = $_POST['mun'];
    $id = $_SESSION['userid'];

    if($numint == "") {
        $actualizar = "UPDATE direcciones SET calle = '$calle', numext = $numext, colonia = '$col', municipio = '$mun' WHERE iduser = $id";
    } else {
        $actualizar = "UPDATE direcciones SET calle = '$calle', numext = $numext, numint = $numint, colonia = '$col', municipio = '$mun' WHERE iduser = $id";
    }
    // Modificar Producto
    
    if(!mysqli_query($conexion,$actualizar))
    {
        die('Error');
    }

    // Cerrar la conexión
    mysqli_close($conexion);

?>