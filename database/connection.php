<?php
    $conexion  = mysqli_connect("localhost","David Barbosa","contraseña", "sbsrenew");

    if (!$conexion ) {
        die('No se estableció la conexión con el servidor de BD:' . mysqli_connect_error());
    }
?>