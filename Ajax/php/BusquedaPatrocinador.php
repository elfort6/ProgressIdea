<?php 
include 'conexion.php';
    $proyectos = "";
    if (!empty($_POST["busqueda"])) {
        $entrada = $_POST["busqueda"];
        $categoria = $_POST["categoria"];
        $condicionCategoria = "";
        $arreglo = explode(" ", $entrada);
        $cadena = "";
        foreach ($arreglo as $llave => $valor) {
            if (end($arreglo)==$valor or strlen($valor)>=3) {
                $cadena.= 'LOWER(p.nombreproyecto) LIKE LOWER("%'.$valor.'%") OR LOWER(p.descripcion) LIKE LOWER("%'.$valor.'%") OR LOWER(u.usuario) LIKE LOWER("%'.$valor.'%")';
            }elseif( strlen($valor)>=3){
                $cadena.= 'LOWER(p.nombreproyecto) LIKE LOWER("%'.$valor.'%") OR LOWER(p.descripcion) LIKE LOWER("%'.$valor.'%") OR LOWER(u.usuario) LIKE LOWER("%'.$valor.'%") OR ';
            }
        }
        
        if (strlen($cadena)<1){
            $cadena = 'LOWER(p.nombreproyecto) LIKE LOWER("%'.$entrada.'%") OR LOWER(p.descripcion) LIKE LOWER("%'.$entrada.'%") OR LOWER(u.usuario) LIKE LOWER("%'.$entrada.'%")';
        }

        if ($categoria!=0) {
            $condicionCategoria = "WHERE c.idCategoria=".$categoria;
            $condiciones = $condicionCategoria." AND ".$cadena;
        }else{
            $condiciones = "WHERE ".$cadena." LIMIT 20";

        }
    }else{
        $categoria = $_POST["categoria"];
        if ($categoria!=0) {
            $condiciones = "WHERE c.idCategoria=".$categoria;
        }else{
            $condiciones = " LIMIT 20";
        }
    }

    
    $consulta = "SELECT p.idProyecto, p.nombreproyecto, p.descripcion, m.rutaImagen, u.usuario, c.nombreCategoria FROM proyecto p INNER JOIN usuario u ON u.idUsuario=p.Usuario_idUsuario INNER JOIN multimediaproyecto m ON m.Proyecto_idProyecto=p.idProyecto INNER JOIN categoria c ON c.idCategoria=p.Categoria_idCategoria ".$condiciones;


        $result = $conexion->query($consulta);

        while($fila = $result->fetch_assoc()){
            $proyectos .= '<div class="card p-3 pt-4 mt-2 mb-2 tarjeta border border-info" onclick="verProyecto('.$fila["idProyecto"].')" style="cursor:pointer;">
            <div class="row ">
                <div class="col-md-7">
                    <img src="../Ajax/'.$fila["rutaImagen"].'" class="w-100">
                </div>
                <div class="col-md-5 px-3">
                    <div class="card-block px-3">
                        <h2 class="card-title">'.$fila["nombreproyecto"].'</h2>
                        <p class="text-right m-1"><i class="fas fa-user mr-2"></i><i>'.$fila["usuario"].'</i></p>
                        <p class="m-2"><i>Categoria - '.$fila["nombreCategoria"].'</i></p>
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
    

    if($proyectos!=null){
        echo $proyectos;
    }else{
        echo '<h2 text-center><b><i class="fas fa-search mr-3"></i>NO SE ENCONTRARON PROYECTOS</b></h2>';
    }

 ?>