<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['sesion'])){

    $consulta1="SELECT idUsuario FROM usuario WHERE usuario='{$_SESSION['sesion']['usuario']}'";

    $result = $conexion->query($consulta1);
    $fila = $result->fetch_assoc();
    $idUsuario = $fila['idUsuario'];
    

    $idProyecto = $_POST['idProyecto'];
    $like = $_POST['estrellas'];
   
    $consulta="INSERT INTO reaccion VALUES ({$idUsuario},'{$idProyecto}','',NOW(), '{$like}')";

    if($conexion->query($consulta)){
        $respuesta = array('status' => true);
    }else{

        $respuesta = array('status' => false, 'error' => 2);
    }

}else{
    $respuesta = array('status' => false, 'error' => 3);
}
    
    echo json_encode($respuesta);

?>