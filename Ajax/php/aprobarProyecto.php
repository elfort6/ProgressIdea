<?php
include 'conexion.php';
$id=$_POST["id"];
$valor=2;
$consulta5="UPDATE proyecto SET  Suspendido='". $valor."' WHERE idProyecto='".$id."'";

if ($result = $conexion->query($consulta5)) {
	echo"proyecto aprobado correctamente";
}else{
	echo "error";
}
?>