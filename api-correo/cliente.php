<?php
require 'conexion.php';

$consultaId=mysqli_query($conexion, 'SELECT idRegistro, primerNombrel, primerApellido FROM `persona` INNER JOIN correo ON Correo_idCorreo = idCorreo WHERE correo.correo ="'.$_POST["correoRecu"].'"') or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));
if($consultaId){
	$consulta=$consultaId->fetch_assoc();
	$id=password_hash(rand(0, 1000000), PASSWORD_DEFAULT);
	$to = $_POST["correoRecu"];
	$name=   $consulta['primerNombrel'].' '.$consulta['primerApellido'] ;
	$fechaCreacion = date("Y-m-d");
	$fechaExpiracion = date("Y-m-d",strtotime($fechaCreacion."+ 1 days"));
    $inserta = mysqli_query($conexion, 'INSERT INTO  `recuperacioncuenta` (`idRecuperacion`, `estado`, `fechaExpiracion`, `fechaCreacion`, `idUsuario`) VALUE("'.$id.'", 1,"'.$fechaExpiracion.'","'.$fechaCreacion.'","'.$consulta['idRegistro'].'")')or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));
    header("Location: https://progressidea.tk/api-correo/servidor.php?id=".$id."&CorreoRecu=".$to."&nombre=".$name);
}else{
}
?>
