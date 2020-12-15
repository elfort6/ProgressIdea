<?php 
include 'conexion.php';
    $entrada = $_POST["busqueda"];
    $proyectos = "";
    $arreglo = explode(" ", $entrada);
    $cadena = "";
    foreach ($arreglo as $llave => $valor) {
        if (end($arreglo)==$valor or strlen($valor)>=3) {
            $cadena.= 'LOWER(p.nombreproyecto) LIKE LOWER("%'.$valor.'%") OR LOWER(p.descripcion) LIKE LOWER("%'.$valor.'%") OR LOWER(u.usuario) LIKE LOWER("%'.$valor.'%")';
        }elseif( strlen($valor)>=3){
            $cadena.= 'LOWER(p.nombreproyecto) LIKE LOWER("%'.$valor.'%") OR LOWER(p.descripcion) LIKE LOWER("%'.$valor.'%") OR LOWER(u.usuario) LIKE LOWER("%'.$valor.'%") OR ';
        }
    }

    if (strlen($cadena)>0) {
        $consulta = 'SELECT p.idProyecto, p.nombreproyecto, p.descripcion, m.rutaImagen, u.usuario FROM proyecto p INNER JOIN usuario u ON u.idUsuario=p.Usuario_idUsuario INNER JOIN multimediaproyecto m ON m.Proyecto_idProyecto=p.idProyecto WHERE '.$cadena.' AND p.fechaVencimiento>NOW() AND p.Suspendido=1';


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
                        <p class="text-right m-1"><i class="fas fa-user mr-2"></i><i>'.$fila["usuario"].'</i></p>
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
    }else{
        $consulta = 'SELECT p.idProyecto, p.nombreproyecto, p.descripcion, m.rutaImagen, u.usuario FROM proyecto p INNER JOIN usuario u ON u.idUsuario=p.Usuario_idUsuario INNER JOIN multimediaproyecto m ON m.Proyecto_idProyecto=p.idProyecto WHERE LOWER(p.nombreproyecto) LIKE LOWER("%'.$entrada.'%") OR LOWER(p.descripcion) LIKE LOWER("%'.$entrada.'%") OR LOWER(u.usuario) LIKE LOWER("%'.$entrada.'%") AND p.fechaVencimiento>NOW() AND p.Suspendido=1';


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
                        <p class="text-right m-1"><i class="fas fa-user mr-2"></i><i>'.$fila["usuario"].'</i></p>
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
    }

    if($proyectos!=null){
        echo $proyectos;
    }else{
        echo '<h2 text-center><b><i class="fas fa-search mr-3"></i>NO SE ENCONTRARON PROYECTOS</b></h2>';
    }

 ?>