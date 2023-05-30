<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        $ap = basename($_SERVER['PHP_SELF']);
        if ($ap == "inicio.php") {
            echo '<link rel="stylesheet" href="css/general.css">';
            echo '<link rel="stylesheet" href="css/portadas.css">';
            echo '<link rel="stylesheet" href="css/media.css">';
            echo '<link rel="stylesheet" href="css/extra.css">';
            echo '<link rel="stylesheet" href="css/toast.css">';
            echo '<link rel="stylesheet" href="css/jquery.flipster.min.css">';
            if(isset($_SESSION['rol'])) {
                echo '<link rel="stylesheet" href="css/modal.css">';
            }
        } else if($ap != "inicio.php" && isset($_SESSION['rol'])) {
            echo '<link rel="stylesheet" href="../css/general.css">';
            echo '<link rel="stylesheet" href="../css/portadas.css">';
            echo '<link rel="stylesheet" href="../css/media.css">';
            echo '<link rel="stylesheet" href="../css/extra.css">';
            echo '<link rel="stylesheet" href="../css/toastnb.css">';
            echo '<link rel="stylesheet" href="../css/estilosBotCarro.css">';
            echo '<link rel="stylesheet" href="../css/jquery.flipster.min.css">';
            echo '<link rel="stylesheet" href="../css/modal.css">';
        } else {
            echo '<link rel="stylesheet" href="../css/general.css">';
            echo '<link rel="stylesheet" href="../css/portadas.css">';
            echo '<link rel="stylesheet" href="../css/media.css">';
            echo '<link rel="stylesheet" href="../css/extra.css">';
            echo '<link rel="stylesheet" href="../css/toast.css">';
            echo '<link rel="stylesheet" href="../css/toastnb.css">';
            echo '<link rel="stylesheet" href="../css/estilosBotCarro.css">';
            echo '<link rel="stylesheet" href="../css/jquery.flipster.min.css">';
        }
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <?php 
        if ($ap == "inicio.php") {
            echo '<link rel="icon" type="image/png" href="media/img/logo.png"> ';
        } else {
            echo '<link rel="icon" type="image/png" href="../media/img/logo.png">';
        }
    ?>
    <title>SBS</title> <!-- Nombre de la pestaña -->
</head>
<body>
    <header>
        <?php 
            if ($ap == "inicio.php") {
                echo '<img src="media/img/logo.png" alt="logo" class="logo">';
            } else {
                echo '<img src="../media/img/logo.png" alt="logo" class="logo">';
            }
        ?>
        
      <!-- Lista de navegación del menú -->
      <nav>
            <div class="optionsmenu">
                <div id="marker"></div>
                <?php 
                     if ($ap == "inicio.php" && isset($_SESSION['rol'])) {
                        echo '<a href="inicio.php">Inicio</a>';
                        echo '<a href="pages/productos.php">Productos</a>';
                        echo '<a href="pages/cont.php">Contacto</a>';
                        echo '<a href="pages/cliente/dashboardcliente.php?view=p">Cuenta</a>';
                        echo '<a href="pages/procesos/logout.php">Cerrar Sesión</a>';
                    } else if ($ap != "inicio.php" && isset($_SESSION['rol'])) {
                        echo '<a href="../inicio.php">Inicio</a>';
                        echo '<a href="productos.php">Productos</a>';
                        echo '<a href="cont.php">Contacto</a>';
                        echo '<a href="cliente/dashboardcliente.php?view=p">Cuenta</a>';
                        echo '<a href="procesos/logout.php">Cerrar Sesión</a>';
                    } else if ($ap == "inicio.php" && !isset($_SESSION['rol'])) {
                        echo '<a href="inicio.php">Inicio</a>';
                        echo '<a href="pages/productos.php">Productos</a>';
                        echo '<a href="pages/cont.php">Contacto</a>';
                        echo '<a href="pages/register.php">Registrarse</a>';
                        echo '<a href="pages/login.php">Iniciar Sesión</a>';
                    } else {
                        echo '<a href="../inicio.php">Inicio</a>';
                        echo '<a href="productos.php">Productos</a>';
                        echo '<a href="cont.php">Contacto</a>';
                        echo '<a href="register.php">Registrarse</a>';
                        echo '<a href="login.php">Iniciar Sesión</a>';
                    }
                ?>
            </div>
            <!-- Lista de redes sociales -->
            <div class="socialmedia">
                <div id="marker_social"></div>
                <?php 
                    if ($ap != "inicio.php" && isset($_SESSION['rol'])) {
                        echo '<i data-toggle="modal" data-target="#exampleModal" class="fas fa-shopping-cart"></i>';
                        echo '<i class="fa-brands fa-whatsapp" onclick="whatsapps()"></i>';
                    } else {
                        echo '<i class="fa-brands fa-whatsapp" onclick="whatsapps()"></i>';
                    }
                ?>
            </div>
        </nav>
        <!-- Botón para pausar la música de ambientación -->
        <div class="toggle_btn">
            <?php 
                if ($ap == "inicio.php") {
                    echo '<img src="media/img/pause.png" alt="pause" id="pp">';
                } else {
                    echo '<img src="../media/img/pause.png" alt="pause" id="pp">';
                }
            ?>
        </div>
    </header>