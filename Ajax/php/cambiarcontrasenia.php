<?php 
include 'conexion.php';
session_start();
$consulta='select contrasenia from usuario where usuario="'.$_SESSION["sesion"]["usuario"].'"';
$result = $conexion->query($consulta);
$usu = $result->fetch_assoc();

$contraA=password_hash($_POST['contraA'], PASSWORD_DEFAULT);
$contraN=password_hash($_POST['contraN'], PASSWORD_DEFAULT);
if (password_verify($_POST['contraA'],$usu['contrasenia'])){
    $consulta7="UPDATE usuario SET  contrasenia='". $contraN."'WHERE  usuario='".$_SESSION["sesion"]["usuario"]."'";
    if($result = $conexion->query($consulta7)){
        $json = array("status"=>true, "mensaje"=>"Contraseña Actualizada");
            echo json_encode($json);
            session_destroy();
    }else{
        $json = array("status"=>false, "mensaje"=>"Error");
            echo json_encode($json);
    }
}else{
    $json = array("status"=>false, "mensaje"=>"Contraseña Incorrecta");
    echo json_encode($json);
}

 ?>