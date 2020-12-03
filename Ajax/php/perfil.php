<?php 
	include 'conexion.php';

	$usuario = $_POST["usuario"];

	$consulta = "SELECT primerNombrel, segundoNombre, primerApellido, segundoApellido, imagen, u.usuario, c.correo FROM persona p INNER JOIN usuario u ON u.Persona_idRegistro=p.idRegistro INNER JOIN correo c ON c.idCorreo=p.Correo_idCorreo WHERE u.usuario='".$usuario."' LIMIT 1";

	$result = $conexion->query($consulta);

    $fila = $result->fetch_assoc();

    if ($fila["imagen"]!=null) {
    	$avatar = '<img src="Ajax/'.$fila["imagen"].'">';
    }else{
    	$iniciales = substr($fila["primerNombrel"], 0,1).substr($fila["primerApellido"], 0,1);
    	$avatar = '<span><b>'.$iniciales.'</b></span>';
    }

    $info = '<div class="my-3 mx-2 avatar">'.$avatar.'</div>
            <div class="my-auto">
	            <p id="user" class="text-dark p-0"><b>'.$fila["primerNombrel"].' '.$fila["segundoNombre"].' '.$fila["primerApellido"].' '.$fila["segundoApellido"].'</b></p>
	            <p id="correo" class=""><a href="#">'.$fila["correo"].'</a></p>
            </div>';

    echo $info;
 ?>