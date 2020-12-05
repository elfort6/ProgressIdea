<?php
include 'conexion.php';
$id=$_POST["id"];
$valor=1;
$consulta5="UPDATE comentario SET  visto='". $valor."' WHERE id='".$id."'";
$result = $conexion->query($consulta5);
echo"valor eliminado correctamente";
?>