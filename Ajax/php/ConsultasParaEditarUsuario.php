<?php 
include 'conexion.php';
session_start();
if (!isset($_SESSION["sesion"])) {
    header("location: ../index.html");
}else if(($nivel = $_SESSION["sesion"]["nivel"])!=1){
    if($nivel == 2){
        header("location: ../index.html");
    }else if($nivel == 3){
        header("location: ../index.html");
    }
}
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
 ?>