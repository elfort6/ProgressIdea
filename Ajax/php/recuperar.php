<?php
require '../PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$to = "elfort6@gmail.com";
$asunto= "cantactanos de elfort6.tk";
$name=   $_POST['name'];
$email=  $_POST['email'];
$sms =   nl2br($_POST['message']);

if ($name==""||$email==""||$sms=="") {
    echo '<div class="alert alert-warning" role="alert">todos los campos son requeridos!</div>';
}else {
    $mail->From = $email;
	$mail->addAddress($to);
	$mail->Subject = $asunto;
	$mail->isHtml(true);
	$mail->Body = '<strong>'.$name.'</strong> le ha contactado desde su web, y le ha enviado el siguiente mensaje: <br><p>'.$sms.'</p>';
    
	$mail->CharSet = 'UTF-8';
    $mail->send();
	echo 1;
} 

?>

