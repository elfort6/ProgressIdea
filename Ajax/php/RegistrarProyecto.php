<?php
session_start();
//se establece una conexion a la base de datos
include 'conexion.php';

    $consulta1="SELECT idUsuario FROM usuario WHERE usuario='{$_SESSION['sesion']['usuario']}'";

    $result = $conexion->query($consulta1);
    while($fila = $result->fetch_assoc()){
        $idUsuario = $fila['idUsuario'];
    }

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $idRandom = rand(0,100000);
    $supender=1;
    $consulta="INSERT INTO proyecto VALUES ({$idRandom},'{$nombre}',{$categoria},'{$descripcion}', '{$idUsuario}',{$supender})";

    if($conexion->query($consulta)){
        $_SESSION["sesion"]["idProyecto"]=$idRandom;
        $respuesta = array('status' => true);
    }else{
        $respuesta = array('status' => false);
    }

    echo json_encode($respuesta);

    

?>