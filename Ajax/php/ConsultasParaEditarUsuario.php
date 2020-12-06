<?php 
include 'conexion.php';
$usu=$_SESSION["sesion"]["usuario"];
$consulta="SELECT u.usuario, p.primerNombrel, p.segundoNombre, p.primerApellido, p.segundoApellido, p.numId, p.direccion, p.codigoPostal, c.correo, t.numeroTelefono, p.imagen FROM usuario u INNER JOIN persona p ON p.idRegistro=u.Persona_idRegistro INNER JOIN correo c ON c.idCorreo=p.Correo_idCorreo INNER JOIN telefono t ON t.idTelefono=p.Telefono_idTelefono WHERE u.usuario='".$_SESSION["sesion"]["usuario"]."'";
$result = $conexion->query($consulta);
$usu = $result->fetch_assoc();

 ?>