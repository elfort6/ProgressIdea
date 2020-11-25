<?php 
include 'conexion.php';
    $proyectos = "";
    $consulta = "SELECT p.idProyecto, p.nombreproyecto, p.descripcion, m.rutaImagen FROM `multimediaproyecto` m INNER JOIN proyecto p ON m.Proyecto_idProyecto=p.idProyecto";

    $result = $conexion->query($consulta);

    while($fila = $result->fetch_assoc()){
        $proyectos .= '<div class="card p-3 pt-4 mt-2 mb-2 tarjeta border border-info">
    <div class="row ">
        <div class="col-md-7">
            <img src="'.$fila["rutaImagen"].'" alt="Imagen-producto" class="w-100">
        </div>
        <div class="col-md-5 px-3">
            <div class="card-block px-3">
                <h2 class="card-title">'.$fila["nombreproyecto"].'</h2>
                <h6 class="card-text text-justify mt-2">
                   '.$fila["descripcion"].' 
                </h6>
                <div class="card-footer bg-transparent border-success">
                <button type=button  onClick="" class="btn btn-lg btn-outline-info" style="width:absolute;">Ver perfil del Emprendedor</button>
                </div>
            </div>
        </div>

    </div>
</div>';
    }
    echo $proyectos;

 ?>