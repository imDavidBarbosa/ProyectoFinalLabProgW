<?php include("../topmenu.php") ?>
    <style> /*Estilo para ocultar el toast que aparece al redireccionar
            desde register.php hasta register.php según el valor de
            la variable success*/
       body {
            overflow: hidden;
        }
    </style>
        <section class="portada registro"> <!-- Sección de la imagen de portada -->
            <div class="container"> <!-- Formulario para el registro de un nuevo usuario -->
                <div class="title">¡Regístrate!</div>
                <div class="content">
                    <form action="procesos/registeruser.php" method="post"><!-- El registro de los datos en la BD se lleva a cabo en el registeruser.php donde se pueden ver las consultas correspondientes -->
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Nombre Completo</span>
                                <input type="text" placeholder="Ingrese su nombre completo" name="nomcom" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Nombre de Usuario</span>
                                <input type="text" placeholder="Ingrese su nombre de usuario" name="nomus" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Email</span>
                                <input type="text" placeholder="Ingrese su email" name="email" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Teléfono</span>
                                <input type="text" placeholder="Ingrese su teléfono celular" name="telcel" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Contraseña</span>
                                <input type="password" placeholder="Ingrese su contraseña" name="pass" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Confirmar Contraseña</span>
                                <input type="password" placeholder="Confirme su contraseña" name="passconf" required>
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" value="Registrar">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Toast para cuando se registra un nuevo usuario de forma exitosa y es
        redirigido al login.php -->
        <div class="toast">
            <div class="toast-content">
                <i class="fas fa-solid fa-xmark check"></i>
                <div class="message">
                    <span class="text text-1">¡Verifique sus contraseñas!</span>
                    <span class="text text-2">Las contraseñas no son iguales</span>
                </div>   
            </div>
            <i class="fa-solid fa-xmark close"></i>
            <div class="progress"></div>
        </div>
        <?php include("music.php") ?>
        <?php include("../footer.php") ?>
        <!-- Script para el toast -->
        <script src="../script/toast.js"></script>
    </body>
</html>
<?php 
    // Código que determina si un usuario ha ingresado anteriormente unas
    // contraseñas que no son iguales y ha vuelto a ser redirccionado al
    // register.php para la aparación del toast.
    if(isset($_GET['success'])){
        $success = $_GET['success'];
        if($success == 0) {
            echo '<script> showToast() </script>';
        }
    }
?>