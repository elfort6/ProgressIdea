<?php
require '..\..\..\..\librerias\braintree-php-5.4.0\lib\autoload.php';

$gateway = new Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => 's2f9gr23vxmrg2y8',
        'publicKey' => 'kpxf8rh8fkx5hmpd',
        'privateKey' => '134829ee638e624072a91582ec5b309a'
      ]);

require '../../conexion.php';

$id=$_POST["id"];
$valor=1;
$consulta="SELECT a.idTransaccion FROM aportepatrocinador a WHERE a.Proyecto_idProyecto='".$id."'";

if ($result = $conexion->query($consulta);) {
	while($fila = $result->fetch_assoc()){
		
		$result2 = $gateway->transaction()->refund($fila["idTransaccion"]);
		 
	}
	
	$respuesta = array('status' => true);
}else{
	$respuesta = array('status' => true);
}

echo $respuesta;
?>