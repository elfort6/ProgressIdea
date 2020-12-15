<?php 

include 'conexion.php';
$proyectos = "";

$consulta = "SELECT p.idProyecto, p.nombreproyecto, u.usuario, SUM(a.monto) AS Total, p.montoDeseado FROM `aportepatrocinador` a INNER JOIN proyecto P ON p.idProyecto=a.Proyecto_idProyecto INNER JOIN usuario u ON p.Usuario_idUsuario=u.idUsuario WHERE p.Suspendido=1 GROUP BY p.idProyecto, p.nombreproyecto, p.descripcion, u.usuario";
$result = $conexion->query($consulta);

while($fila = $result->fetch_assoc()){
	if ($fila["Total"]>=$fila["montoDeseado"]) {
	    $proyectos .= ' <tr>
	    <td><a href="../visualizarProyectoInfo.php?id='.$fila["idProyecto"].'">'.$fila["nombreproyecto"].'</a></td>
	    <td>'.$fila["Total"].'/'.$fila["montoDeseado"].'</td>
	    <td><a href="../PerfilEmprendedor.php?user='.$fila["usuario"].'">'.$fila["usuario"].'</a></td>
	    <td><button id="'.$fila["idProyecto"].'" type="button" onclick="aprobar(this.id)" class="btn btn-primary">Aprobar</button></td>
	  </tr>';
	}
}

echo $proyectos;
 ?>