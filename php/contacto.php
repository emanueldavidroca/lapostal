<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    $empresa =  htmlentities($_POST["empresa"],ENT_COMPAT,"UTF-8");
    $nombre = htmlentities($_POST["nombre"],ENT_COMPAT,"UTF-8");
    $cargo = htmlentities($_POST["cargo"],ENT_COMPAT,"UTF-8");
    $email = htmlentities($_POST["email"],ENT_COMPAT,"UTF-8");
    $mensaje = htmlentities($_POST["mensaje"],ENT_COMPAT,"UTF-8");
    $telefono = htmlentities($_POST["telefono"],ENT_COMPAT,"UTF-8");

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = FALSE;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'emanueldavidroca@gmail.com';//SMTP username
        $mail->Password   = 'mqow ilxu dbwz tont';//SMTP password
        $mail->SMTPSecure = "ssl";//Enable implicit TLS encryption
        $mail->Port       = 465;//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($email, $nombre);
        $mail->addAddress('emarctreintayocho@gmail.com', 'LaPostal info');     

        //Content
        $mail->isHTML(true);//Set email format to HTML
        $mail->Subject = 'LaPostal.com.ar Mensaje de contacto:'.$nombre." ".$empresa;//En el body podes ponerle HTML para mostrar un mensaje en el mail.

        $mail->Body    = '<h4 style="color:red;text-align:center;">Este correo fue enviado automaticamente desde el sistema de contacto de lapostal.com.ar</h4>
        <p> de: <b>'.$nombre.'</b></p>
        <p> Empresa: <b>'.$empresa.'</b></p>
        <p> Cargo: <b>'.$cargo.'</b></p>
        <p> Email: <b>'.$email.'</b></p>
        <p> Telefono: <b>'.$telefono.'</b></p>
        <p> Mensaje: <b style="font-size:16px;">'.$mensaje.'</b></p>';

        if ($mail->send() == true) {
            header("location: ../contacto.html?respuesta=exito");
        } 
    } catch (Exception $e) {
        //Exception es cuando sucede un error critico, $e tendra adentro un error cual sea que suceda.
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>