<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require '../vendor/autoload.php';

function send_email($email, $asunto, $mensaje)
{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Username = '77b96502d5d71b';
    $mail->Password = '4be68d991e1eed';
    $mail->Port = 465;
    $mail->SMTPSecure = 'tls';
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('registro@mipagina.com', 'Registro');
    $mail->addAddress($email);
    $mail->Subject = $asunto;
    $mail->Body = $mensaje;
    if ($mail->send()) {
        $emailSent = true;
    }
}
