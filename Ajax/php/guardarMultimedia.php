<?php
session_start();

include 'conexion.php';

$idProyecto = $_SESSION["sesion"]["idProyecto"];
$archivo = $_FILES["archivo"];

$rutaCarpeta = '../MultimediaProyectos/'.$_SESSION["sesion"]["usuario"];
$rutaCarpeta2 = '../'.$rutaCarpeta;

if(!file_exists($rutaCarpeta2)){
    mkdir($rutaCarpeta2, 0777, true);
}
$ruta = $rutaCarpeta2."/".$archivo["name"];
$ruta2 = $rutaCarpeta.'/'.$archivo["name"];
								 /*Nombre temporal del arvhivo, Ruta / nombre como se guardara el archivo*/
$resultado = move_uploaded_file($archivo["tmp_name"], $ruta);
if ($resultado) {
	$consulta = "INSERT INTO multimediaproyecto (`rutaImagen`, `Proyecto_idProyecto`, `rutaVideo`) VALUES('{$ruta2}',{$idProyecto},null)";
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