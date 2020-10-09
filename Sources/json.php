<?php 
	$data = file_get_contents("PaisesYprefijos.json");
	$datos = json_decode($data, true);
	$opciones = "";
	foreach ($datos as $pais => $prefijo){
        $opciones .= '<option value="'."{$prefijo}".'"'.">{$pais}</option>";
    }
    echo $opciones;
 ?>