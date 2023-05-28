<?php 
    session_start();
    if(!isset($_SESSION['rol'])) {
        header('location: ../login.php');
    }

    include("../../database/connection.php");

    $ap = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/general.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="../../css/portadas.css">
    <link rel="stylesheet" href="../../css/media.css">
    <link rel="stylesheet" href="../../css/extra.css">
    <link rel="stylesheet" href="../../css/modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="icon" type="image/png" href="../../media/img/logo.png">
    <title>SBS</title> <!-- Nombre de la pestaña -->
</head>
<body>
    <header>
        <img src="../../media/img/logo.png" alt="logo" class="logo">
        <!-- Lista de navegación del menú -->
        <nav>
            <div class="optionsmenu">
                <div id="marker"></div>
                <a href="../../inicio.php">Inicio</a>
                <a href="../productos.php">Productos</a>
                <a href="../cont.php">Contacto</a>
                <a href="dashboardcliente.php?view=p">Cuenta</a>
                <a href="../procesos/logout.php">Cerrar Sesión</a>
            </div>
            <div class="socialmedia">
                <div id="marker_social"></div>
                <i data-toggle="modal" data-target="#exampleModal" class="fas fa-shopping-cart"></i>
            </div>
        </nav>
        <?php 
            $idnow = $_SESSION['userid'];
            $query = "SELECT nombre_user FROM usuarios WHERE iduser = $idnow";
            $consulta = mysqli_query($conexion, $query);
            $nombre = mysqli_fetch_row($consulta);
        ?>
        <div class="toggle_btn">
            <p>Welcome <?php echo $nombre[0]?>!</p>
        </div>
    </header>