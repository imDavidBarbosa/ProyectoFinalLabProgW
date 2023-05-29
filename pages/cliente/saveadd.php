<?php 
    session_start();

    require("../../database/connection.php");

    $calle = $_POST['calle'];
    $numext = $_POST['numext'];
    $numint = $_POST['numint'];
    $col = $_POST['col'];
    $mun = $_POST['mun'];
    $id = $_SESSION['userid'];

    
    if($numint == "") {
        $sql = "INSERT INTO direcciones (calle, numext, colonia, municipio, iduser) VALUES ('$calle', $numext,'$col', '$mun', $id)";
    } else {
        $sql = "INSERT INTO direcciones VALUES ('$calle', '$numext', '$numint','$col', '$mun', $id)";
    }

    $query = mysqli_query($conexion, $sql);

    header("Location: dashboardcliente.php?view=a");
?>