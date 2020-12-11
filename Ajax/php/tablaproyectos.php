<?php 
include 'conexion.php';
$proyectos = "";

$consulta = "SELECT p.idProyecto, p.nombreproyecto, p.descripcion, u.usuario FROM `usuario` u INNER JOIN proyecto p ON p.Usuario_idUsuario=u.idUsuario INNER JOIN multimediaproyecto m ON m.Proyecto_idProyecto=p.idProyecto INNER JOIN categoria c ON c.idCategoria=p.Categoria_idCategoria WHERE Suspendido='1'";


$result = $conexion->query($consulta);

while($fila = $result->fetch_assoc()){
    $proyectos .= ' <tr>
    <td><a href="../visualizarProyectoInfo.php?id='.$fila["idProyecto"].'">'.$fila["nombreproyecto"].'</a></td>
    <td>'.$fila["descripcion"].'</td>
    <td><a href="../PerfilEmprendedor.php?user='.$fila["usuario"].'">'.$fila["usuario"].'</a></td>
    <td><button id="'.$fila["idProyecto"].'" type="button" onclick="suspender(this.id)" class="btn btn-secondary">Suspender</button></td>
    <td><button id="'.$fila["idProyecto"].'" type="button" onclick="eliminar(this.id)" class="btn btn-danger">Eliminar</button></td>
  </tr>';
}

echo $proyectos;
 ?>