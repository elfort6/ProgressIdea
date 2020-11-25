<?php 
include 'conexion.php';
    $proyectos = "";
    $consulta = "SELECT p.idProyecto, p.nombreproyecto, p.descripcion, m.rutaImagen FROM `multimediaproyecto` m INNER JOIN proyecto p ON m.Proyecto_idProyecto=p.idProyecto";

    $result = $conexion->query($consulta);

    while($fila = $result->fetch_assoc()){
        $proyectos .= '<div class="card p-3 pt-4 mt-2 mb-2 tarjeta border border-info" onclick="verProyecto('.$fila["idProyecto"].')" style="cursor:pointer;">
    <div class="row ">
        <div class="col-md-7">
            <img src="Ajax/'.$fila["rutaImagen"].'" class="w-100">
        </div>
        <div class="col-md-5 px-3">
            <div class="card-block px-3">
                <h2 class="card-title">'.$fila["nombreproyecto"].'</h2>
                <div class="card-footer bg-transparent border-success">
                <h6 class="card-text text-justify mt-2">
                   '.$fila["descripcion"].' 
            </h6>
                </div>
            </div>
        </div>

    </div>
</div>';
    }
    echo $proyectos;

 ?>