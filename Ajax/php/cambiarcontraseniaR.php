<?php 
include 'conexion.php';
$contraN=password_hash($_POST['contraN'], PASSWORD_DEFAULT);
    $consulta7="UPDATE usuario SET  contrasenia='". $contraN."'WHERE  idUsuario='".$_POST["usu"]."'";
    if($result = $conexion->query($consulta7)){
        $json = array("status"=>true, "mensaje"=>"Contraseña Actualizada al ususario: ".$_POST["usu"]."");
            echo json_encode($json);
    }else{
        $json = array("status"=>false, "mensaje"=>"Error");
            echo json_encode($json);
    }


 ?>