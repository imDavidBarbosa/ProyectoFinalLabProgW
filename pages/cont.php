<?php 
    session_start();
    include("../topmenu.php");
    
    if(isset($_SESSION['rol'])) {
        include('modal.php');
    }
?>

<?php
if(isset($_POST['submit'])){
    $to = "tucorreo@example.com"; //Correo al que se enviará el mensaje
    $name = $_POST['nomcom'];
    $email = $_POST['nomus'];
    $message = $_POST['msj'];

    $headers = "From: ".$name." <".$email.">\r\n";
    $headers .= "Reply-To: ".$email."\r\n";
    $headers .= "CC: tucorreo@example.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $body = "Has recibido un nuevo mensaje de contacto:<br><br>";
    $body .= "<strong>Nombre:</strong> ".$name."<br>";
    $body .= "<strong>Correo:</strong> ".$email."<br>";
    $body .= "<strong>Mensaje:</strong> ".$message."<br>";
    mail($to, $message , $body, $headers);       
}
?>
    <section class="portada contactform"> <!-- Sección de la imagen de portada -->
            <div class="container"> 
                <div class="title">Contactanos</div>
                <div class="content">
                    <form method="post">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Nombre Completo</span>
                                <input type="text" placeholder="Ingrese su nombre completo" name="nomcom" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Usuario</span>
                                <input type="text" placeholder="Ingrese su nombre de usuario" name="nomus" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Mensaje</span>
                                <textarea type="text" cols=10 placeholder="Ingrese su mensaje" name="msj" required></textarea>
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" name="submit" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </section>



<?php include("music.php") ?>
<?php include("../footer.php") ?>