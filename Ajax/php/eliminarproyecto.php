<?php
include 'conexion.php';
$id=$_POST["id"];
$valor=1;
$consulta="DELETE  from multimediaproyecto  WHERE Proyecto_idProyecto='".$id."'";
$result = $conexion->query($consulta);
$consulta2="DELETE   from proyecto    WHERE idProyecto='".$id."'";
$result2 = $conexion->query($consulta2);

echo"valor eliminado correctamente";
?>