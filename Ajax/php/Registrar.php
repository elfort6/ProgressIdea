<?php
//se establece una conexion a la base de datos
include 'conexion.php';
//si se han enviado datos

    $usuario=mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contraseña=password_hash($_POST['pswd'], PASSWORD_DEFAULT);
    $idRandom = rand(0,100000);
    $insertTipoDeUsuario=mysqli_query($conexion, 'insert into tipodeusuario(tipoUsuario) values('.$idRandom.','.$_POST['userType'].')');
   // ("'.$usuario.'","'.$contraseña.'","'.$contraseña.'")') or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));
    //redirección
  //  header('location: ./');

echo implode("<br>", $_POST);
?>