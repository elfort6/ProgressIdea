<?php 
	include 'conexion.php';

	$opciones = "";
	$consulta = 'SELECT idCategoria, nombreCategoria FROM categoria';
	$result = $conexion->query($consulta);

	while($fila = $result->fetch_assoc()){
        $opciones .= '<option value="'.$fila["idCategoria"].'">'.$fila["nombreCategoria"]."</option>";
    }
    echo $opciones;
 ?>