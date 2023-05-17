<?php 
    session_start();
    if(!isset($_SESSION['rol'])) {
        header('location: ../login.php');
    } elseif ($_SESSION['rol'] != 1) {
        header('location: ../login.php');
    } elseif ($_SESSION['rol'] == 2) {
        header('location: ../../inicio.php');
    }
    include("../../database/connection.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/general.css">
    <link rel="stylesheet" href="../../css/portadas.css">
    <link rel="stylesheet" href="../../css/media.css">
    <link rel="stylesheet" href="../../css/extra.css">
    <link rel="stylesheet" href="../../css/toast.css">
    <link rel="stylesheet" href="../../css/jquery.flipster.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/estiloreportes.css">
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
                <a href="dashboardadmin.php">Pedidos</a>
                <a href="usuarios.php">Usuarios</a>
                <a href="productos.php">Productos</a>
                <a href="reportes.php?view=rv">Reportes</a>
                <a href="../procesos/logout.php">Cerrar Sesión</a>
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