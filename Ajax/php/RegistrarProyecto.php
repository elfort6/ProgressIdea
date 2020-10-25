<?php
session_start();
//se establece una conexion a la base de datos
include 'conexion.php';

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $idRandom = rand(0,100000);
    
    $consulta="INSERT INTO proyecto VALUES ({$idRandom},'{$nombre}',{$categoria},'{$descripcion}')";

    if($conexion->query($consulta)){
        $_SESSION["sesion"]["idProyecto"]=$idRandom;
        $respuesta = array('status' => true);
    }else{
        $respuesta = array('status' => false);
    }

    echo json_encode($respuesta);

    

?>