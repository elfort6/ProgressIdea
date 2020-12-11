<?php
require '../../librerias/PHPMailer/PHPMailerAutoload.php';
require 'conexion.php';

$consultaId=mysqli_query($conexion, 'SELECT idRegistro, primerNombrel, primerApellido FROM `persona` INNER JOIN correo ON Correo_idCorreo = idCorreo WHERE correo.correo ="'.$_POST["correoRecu"].'"') or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));
 
if($consultaId){
	$consulta=$consultaId->fetch_assoc();

	$mail = new PHPMailer;
	$id=password_hash(rand(0, 1000000), PASSWORD_DEFAULT);
	$to = $_POST["correoRecu"];
	$asunto= "Recuperacion de contraseña PI";
	$name=   $consulta['primerNombrel'].' '.$consulta['primerApellido'] ;
	$email=  "suport@progressidea.tk";
	$sms =   'Parece que solicitaste la recuperación de tu cuenta, para que se haga efectivo el cambio de contraseña pulsa el siguiente link: <br> <a href="https://www.progressidea.tk/registro_login/newPassword.php?idpwd='.$id.'">clickee perrin</a>';

	$fechaCreacion = date("Y-m-d");
	$fechaExpiracion = date("Y-m-d",strtotime($fechaCreacion."+ 1 days"));

	$inserta = mysqli_query($conexion, 'INSERT INTO recuperacioncuenta(idRecuperacion, idUsuario, estado, fechaExpiracion, fechaCreacion) VALUE("'.$id.'","'.$consulta['idRegistro'].'", 1,"'.$fechaExpiracion.'","'.$fechaCreacion.'")')or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

	



	if ($name==""||$email==""||$sms=="") {
		echo '<div class="alert alert-warning" role="alert">todos los campos son requeridos!</div>';
	}else {
		$mail->From = $email;
		$mail->addAddress($to);
		$mail->Subject = $asunto;
		$mail->isHtml(true);
		$mail->Body = '<strong>'.$name.'</strong> Este es un correo de recuperacion de contraseña, si no lo has solicitado comunicate con soporte. <br><p>'.$sms.'</p>';
		$mail->CharSet = 'UTF-8';
		$mail->send();
		echo "Se le ha enviado un correo, ve y revisalo Perra!";
} 
}else{



}






?>

