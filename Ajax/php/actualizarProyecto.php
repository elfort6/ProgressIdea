<?php
require "conexion.php";
include 'SesionEmprendedor.php';


$upa = "UPDATE proyecto  SET  nombreproyecto ='".$_POST["nombre"]."', Categoria_idCategoria=".$_POST["categoria"].", descripcion='".$_POST["descripcion"]."' WHERE idProyecto ='".$_POST["idProyecto"]."'";
$result = $conexion->query($upa);
echo('<div class="alert alert-primary" role="alert">
Actualizacion De Proyecto</div>');


?>