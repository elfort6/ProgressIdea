<?php 
include 'conexion.php';
$proyectos = "";

$consulta = "SELECT p.idProyecto, p.nombreproyecto, p.descripcion, u.usuario FROM `usuario` u INNER JOIN proyecto p ON p.Usuario_idUsuario=u.idUsuario INNER JOIN multimediaproyecto m ON m.Proyecto_idProyecto=p.idProyecto INNER JOIN categoria c ON c.idCategoria=p.Categoria_idCategoria WHERE Suspendido='0'";


$result = $conexion->query($consulta);

while($fila = $result->fetch_assoc()){
    $proyectos .= ' <tr>
    <td>'.$fila["nombreproyecto"].'</td>
    <td>'.$fila["descripcion"].'</td>
    <td>'.$fila["usuario"].'</td>
    <td><button id="'.$fila["idProyecto"].'" type="button" onclick="Activar(this.id)" class="btn btn-info">Activar</button></td>
  </tr>';
}

echo $proyectos;
 ?>