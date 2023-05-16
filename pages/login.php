<?php 
    session_start();
    if(isset($_SESSION['rol'])) {
        switch($_SESSION['rol']) {
            case 1:
                header('location: admin/dashboardadmin.php');
                break;
            case 2:
                header('location: ../inicio.php');
                break;
            default:
        }
    }
?>
<?php include("../topmenu.php"); ?> 
    <style> /*Estilo para ocultar el toast que aparece al redireccionar
            desde register.php hasta login.php*/
        body {
            overflow: hidden;
        }
    </style>
    <section class="portada registro"> <!-- Sección de la imagen de portada -->
    <div class="container"> <!-- Formulario para el inicio de sesión -->
            <div class="title">Iniciar Sesión</div>
            <div class="content">
                <form action="procesos/loginuser.php" method="post">
                    <div class="user-details"> 
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="text" placeholder="Ingrese su email" name="email" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Contraseña</span>
                            <input type="password" placeholder="Ingrese su contraseña" name="password" required>
                        </div>
                    </div>
                    <div class="button">
                        <input class="submitbtn" type="submit" value="Iniciar Sesión">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Toast para cuando se registra un nuevo usuario de forma exitosa y es
    redirigido al login.php -->
    <div class="toast"> 
        <div class="toast-content">
            <i class="fas fa-solid fa-check check"></i>
            <div class="message">
                <span class="text text-1" id="text1">¡Registro exitoso!</span>
                <span class="text text-2" id="text2">Ya puede iniciar sesión</span>
            </div>   
        </div>
        <i class="fa-solid fa-xmark close"></i>
        <div class="progress"></div>
    </div>
    <?php include("music.php"); ?> 
    <?php include("../footer.php"); ?> 
    <!-- Script para el toast -->
    <script src="../script/toast.js"></script>
</body>
</html>
<?php 
    // Código que determina si se ha registrado antes un nuevo usuario
    // y por cual se hace la validación de aparacer o no el toast a través
    // de la obtención de información del POST en la url.
    if(isset($_GET['success'])){
        $success = $_GET['success'];
        if($success == 1) {
            echo '<script> showToast() </script>';
        } else if($success == 2) {
            echo '<script> showToastPass() </script>';
        } else if($success == 3) {
            echo '<script> showToastShop() </script>';
        }
    }
?>