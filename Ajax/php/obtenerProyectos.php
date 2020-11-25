<?php 
session_start();
include 'conexion.php';

    $proyectos = "";
    $consulta = "SELECT p.idProyecto, p.nombreproyecto, p.descripcion, m.rutaImagen FROM `usuario` u INNER JOIN proyecto p ON p.Usuario_idUsuario=u.idUsuario INNER JOIN multimediaproyecto m ON m.Proyecto_idProyecto=p.idProyecto WHERE usuario='{$_SESSION["sesion"]["usuario"]}'";
    $result = $conexion->query($consulta);

    while($fila = $result->fetch_assoc()){
        $proyectos .= '<div class="card p-3 pt-4 mt-2 mb-2 tarjeta border border-info">
    <div class="row ">
        <div class="col-md-7">
            <img src="../'.$fila["rutaImagen"].'" class="w-100">
        </div>
        <div class="col-md-5 px-3">
            <div class="card-block px-3">
                <h2 class="card-title">'.$fila["nombreproyecto"].'</h2>
                <h4 class="card-text text-justify mt-2">
                   '.$fila["descripcion"].' 
                </h4>
                <div class="card-footer bg-transparent border-success">
                <button type=button id="'.$fila["idProyecto"].'" onClick="idBoton(this.id)" class="btn btn-lg btn-info"><a href="editarProyecto.php?id='.$fila["idProyecto"].'"">Editar</a></button>
                <button type=button  onClick="" class="btn btn-lg btn-info"><a href="actualizaciones.php?id='.$fila["idProyecto"].'"">agregar Actualizacion</a></button>
                </div>
            </div>
        </div>

    </div>
</div>';
    }
    echo $proyectos;

 ?>

 