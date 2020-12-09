<?php 

	include 'conexion.php';

	$idProyecto = $_POST['idProyecto'];

	$consulta = "SELECT COUNT(*) AS Conteo, SUM(r.like) AS Total FROM reaccion r WHERE r.Proyecto_idProyecto={$idProyecto}";
	if($result = $conexion->query($consulta)){
    	$fila = $result->fetch_assoc();
    	
    	if ($fila["Conteo"] != 0) {
    		$estrellas = round(($fila["Total"]/$fila["Conteo"]), 0);
    		$puntaje = round(($fila["Total"]/$fila["Conteo"]), 1);
    		$respuesta = array('estrellas' => $estrellas, 'puntaje' => $puntaje, 'votos' => $fila["Conteo"]);
    	}else{
    		$puntaje = 0;
    		$respuesta = array('puntaje' => $puntaje, 'votos' => $fila["Conteo"]);
    	}
	}else{
		$puntaje = 0;
		$respuesta = array('puntaje' => $puntaje);
	}

    echo json_encode($respuesta);
 ?>