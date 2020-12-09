<?php 
session_start();

include 'conexion.php';

//$idProyecto = $_SESSION["sesion"]["idProyecto"];
$archivo = $_FILES["archivo"];
$tipo = $archivo["type"];
//echo $tipo;

if(preg_match("/image/i",$tipo)){
	$rutaCarpeta = 'fotoPerfiles/'.$_SESSION["sesion"]["usuario"];

	if(!file_exists('../'.$rutaCarpeta)){
	    mkdir('../'.$rutaCarpeta, 0777, true);
	}
	$nombreImagen = $_SESSION["sesion"]["usuario"].'.'.explode("/",$tipo)[1];
	$ruta2 = $rutaCarpeta.'/'.$nombreImagen;
									 /*Nombre del usuario, Ruta / tipo de archivo*/
	$resultado = move_uploaded_file($archivo["tmp_name"], '../'.$ruta2);
	if ($resultado) {
		$consulta = "UPDATE persona SET imagen='".$ruta2."' WHERE idRegistro=(SELECT Persona_idRegistro FROM usuario WHERE usuario='".$_SESSION["sesion"]["usuario"]."' LIMIT 1)";
		if($conexion->query($consulta)){
			$respuesta = array('status' => true, 'src'  => $ruta2);
	    }else{
	        $respuesta = array('status' => false, 'src' => $ruta2);
	    }
	}else {
	    $respuesta = array('status' => false);
	}
}else{
	$respuesta = array('status' => false);
}

echo json_encode($respuesta);

 ?>