<?php
include 'conexion.php';
$id=$_POST["id"];
$valor=1;
$consulta5="UPDATE proyecto SET  Suspendido='". $valor."' WHERE idProyecto='".$id."'";
$result = $conexion->query($consulta5);
echo"valor eliminado correctamente";
?>