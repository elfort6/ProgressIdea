<?php 
include 'conexion.php';
session_start();
$usu=$_SESSION["sesion"]["usuario"];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$idproyecto=$_POST['idProyecto'];
$idRandom = rand(0,100000);
$usuarioc=$_POST['usuarioc'];
$consulta5="INSERT INTO `comentario` (`id`, `descripcion`, `fecha`, `usuarioc`,`usuarioactual` ,`idproyecto_proyecto`) values  ('". $idRandom."', '". $descripcion."', '". $fecha ."', '". $usu."','". $usuarioc."','". $idproyecto."') ";
$result = $conexion->query($consulta5);
echo("La consulta Ha sido Realiza");