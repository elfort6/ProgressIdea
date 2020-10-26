<?php
require "conexion.php";
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


$consulta='SELECT * FROM `proyecto` INNER JOIN usuario ON Usuario_idUsuario = idUsuario WHERE usuario.usuario ="'.$_SESSION["sesion"]["usuario"].'"';
$result = $conexion->query($consulta);
$proyectoActual = $result->fetch_assoc();


//$_POST['nombre'];
//$_POST['categoria'];
//$_POST['descripcion'];
//$_POST['imagen'];





?>