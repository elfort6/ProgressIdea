<?php 
include 'conexion.php';
session_start();
$usu=$_SESSION["sesion"]["usuario"];
$consulta='select * from usuario where usuario="'.$_SESSION["sesion"]["usuario"].'"';
$result = $conexion->query($consulta);
$usu = $result->fetch_assoc();
$consulta2='select * from persona where idRegistro="'.$usu['Persona_idRegistro'].'"';
$resultado2 = $conexion->query($consulta2);
$persona= $resultado2->fetch_assoc();
$consulta3='select * from correo  where idCorreo="'.$persona['Correo_idCorreo'].'"';
$resultado3 = $conexion->query($consulta3);
$correos= $resultado3->fetch_assoc();
$consulta4='select * from telefono where idTelefono="'.$persona['Telefono_idTelefono'].'"';
$resultado4 = $conexion->query($consulta4);
$telefono=$resultado3->fetch_assoc();

$nombre = $_POST['nombre'];
$snombre = $_POST['snombre'];
$apellido=$_POST['apellido'];
$sapellido=$_POST['sapellido'];
$usuario=$_POST['usuario'];
$identidad=$_POST['identidad'];
$correo=$_POST['correo'];
$codPostal=$_POST['codPostal'];
$direccion=$_POST['direccion'];
$consulta5="UPDATE persona SET  primerNombrel='". $nombre."', segundoNombre='". $snombre."',  numId='". $identidad."',  codigoPostal='". $codPostal."',  direccion='". $direccion."', segundoNombre='". $snombre."',primerApellido= '". $apellido."', segundoApellido='". $sapellido."'WHERE idRegistro='". $persona['idRegistro']."'";
$result = $conexion->query($consulta5);
$consulta6="UPDATE usuario SET  usuario='". $usuario."'  WHERE Persona_idRegistro='". $persona['idRegistro']."'";
$result = $conexion->query($consulta6);
$consulta7="UPDATE correo SET  correo='". $correo."'WHERE  idCorreo='". $persona['Correo_idCorreo']."'";
$result = $conexion->query($consulta7);
 ?>