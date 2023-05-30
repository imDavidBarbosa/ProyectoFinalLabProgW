<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    session_start();
    include("../topmenu.php");

    if(isset($_SESSION['rol'])) {
        include('modal.php');
    }
?>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['nomcom'];
    $email = $_POST['mail'];
    $message = $_POST['msj'];

    require('../phpmailer/src/Exception.php');
    require('../phpmailer/src/PHPMailer.php');
    require('../phpmailer/src/SMTP.php');
    $phpmailer = new PHPMailer();
    $phpmailer -> isSMTP();
    $phpmailer -> Mailer="smtp";
    $phpmailer -> SMTPAuth = true;
    $phpmailer->SMTPSecure = "tls";
    $phpmailer->Port       = 587;
    $phpmailer->Host       = "smtp-mail.outlook.com";
    $phpmailer->Username   = "sbs_no_reply@outlook.com";
    $phpmailer->Password   = "1234567890ABC";
    $phpmailer->CharSet = "UTF-8";
    $phpmailer->Encoding = 'base64';
    $phpmailer->SetFrom("sbs_no_reply@outlook.com", $name);

    $phpmailer -> IsHTML(true);
    $phpmailer -> AddAddress("sbs_no_reply@outlook.com","sbs_no_reply@outlook.com");
    $phpmailer -> Subject = ("Mensaje de SBS de ".$name);

    $body = "Has recibido un nuevo mensaje de contacto:<br><br>";
    $body .= "<strong>Nombre:</strong> ".$name."<br>";
    $body .= "<strong>Correo:</strong> ".$email."<br>";
    $body .= "<strong>Mensaje:</strong> ".$message."<br>";
    $phpmailer -> Body = $body;
    $phpmailer -> send();
    $phpmailer -> smtpClose();
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
                                <span class="details">Correo Electronico</span>
                                <input type="text" placeholder="Ingrese su correo electronico" name="mail" required>
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