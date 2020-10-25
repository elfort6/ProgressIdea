<?php
session_start();

include 'conexion.php';

$idProyecto = $_SESSION["sesion"]["idProyecto"];
$archivo = $_FILES["archivo"];

$rutaCarpeta = '../../MultimediaProyectos/'.$_SESSION["sesion"]["usuario"];

if(!file_exists($rutaCarpeta)){
    mkdir($rutaCarpeta, 0777, true);
}
$ruta = $rutaCarpeta."/".$archivo["name"];
								 /*Nombre temporal del arvhivo, Ruta / nombre como se guardara el archivo*/
$resultado = move_uploaded_file($archivo["tmp_name"], $ruta);
if ($resultado) {
	$consulta = "INSERT INTO multimediaproyecto (`rutaImagen`, `Proyecto_idProyecto`, `rutaVideo`) VALUES('{$ruta}',{$idProyecto},null)";
	if($conexion->query($consulta)){
        $respuesta = array('status' => true, 'ruta' => $ruta);
    }else{
        $respuesta = array('status' => false, 'ruta' => $ruta);
    }
} else {
    $respuesta = array('status' => false);
}

echo json_encode($respuesta);
?>