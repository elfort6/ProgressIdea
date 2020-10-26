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
$nombre = $_POST["nombre"];



//$uoa = 'UPDATE proyecto INNER JOIN usuario ON Usuario_idUsuario = idUsuario SET proyecto.nombreproyecto = "'.$_POST['nombre'].'" WHERE usuario.usuario ="'.$_SESSION["sesion"]["usuario"].'"';

$upa = "UPDATE proyecto INNER JOIN usuario ON Usuario_idUsuario = idUsuario SET  proyecto.nombreproyecto ='".$nombre."' WHERE usuario.usuario ='". $_SESSION['sesion']['usuario']."'";

$result = $conexion->query($upa);



//$update = 'UPDATE proyecto SET proyecto.nombreproyecto = '.$_POST['nombre'].', proyecto.Categoria_idCategoria = '.$_POST['categoria'].', proyecto.descripcion = '.$_POST['descripcion'].' INNER JOIN usuario ON Usuario_idUsuario = idUsuario WHERE usuario.usuario = "'.$_SESSION["sesion"]["usuario"].'"';
//$consulta='SELECT * FROM `proyecto` INNER JOIN usuario ON Usuario_idUsuario = idUsuario WHERE usuario.usuario ="'.$_SESSION["sesion"]["usuario"].'"';
//$resultProyecto = $conexion->query($consulta);
//$proyectAct = $resultProyecto-> fetch_assoc();

//$actualizar = 'UPDATE `proyecto` (`idProyecto`, `nombreproyecto`, `Categoria_idCategoria`, `descripcion`, `Usuario_idUsuario`) VALUES ('.$proyectAct.idProyecto.', '', '', '', '')';
//$actualizar = $result->fetch_assoc();



//$_POST['nombre'];
//$_POST['categoria'];
//$_POST['descripcion'];
//$_POST['imagen'];





?>