<?php 
session_start();
include 'conexion.php';

    $proyectos = "";
    $consulta = "SELECT p.idProyecto, p.nombreproyecto, p.descripcion, c.nombreCategoria, m.rutaImagen FROM `usuario` u INNER JOIN proyecto p ON p.Usuario_idUsuario=u.idUsuario INNER JOIN multimediaproyecto m ON m.Proyecto_idProyecto=p.idProyecto INNER JOIN categoria c ON c.idCategoria=p.Categoria_idCategoria WHERE usuario='{$_SESSION["sesion"]["usuario"]}'";
    $result = $conexion->query($consulta);

    while($fila = $result->fetch_assoc()){
        $proyectos .= '<div class="card p-3 pt-4 mt-2 mb-2 tarjeta border border-info">
    <div class="row ">
        <div class="col-md-7">
            <img src="'.$fila["rutaImagen"].'" class="w-100">
        </div>
        <div class="col-md-5 px-3">
            <div class="card-block px-3 pt-3">
                <h3 class="card-title"><b>'.$fila["nombreproyecto"].'</b></h3>
                <h5 class="card-text text-justify mt-2">
                   '.$fila["descripcion"].' 
                </h5>
                <p class="text-right m-3"><i>Categoria - '.$fila["nombreCategoria"].'</i></p>
                <div class="card-footer bg-transparent border-success text-right">
                <button type=button class="btn btn-md btn-secondary m-1" title="Editar proyecto"><a class="text-white" href="editarProyecto.php?id='.$fila["idProyecto"].'">Editar</a></button>
                <button type=button  onClick="" class="btn btn-md btn-info m-1" title="Agregar una actualizacion"><a class="text-white" href="actualizaciones.php?id='.$fila["idProyecto"].'" >Atualizar</a></button>
                </div>
            </div>
        </div>

    </div>
</div>';
    }
    echo $proyectos;

 ?>

 