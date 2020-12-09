<?php 
session_start();
include 'conexion.php';

$usuario = $_SESSION['sesion']['usuario'];

$proyectos = "";
    
    $consulta = "SELECT p.idProyecto, p.nombreproyecto, p.descripcion, c.nombreCategoria, m.rutaImagen, u.usuario, SUM(ap.monto) AS cantidad FROM proyecto p INNER JOIN `usuario` u ON p.Usuario_idUsuario=u.idUsuario INNER JOIN multimediaproyecto m ON m.Proyecto_idProyecto=p.idProyecto INNER JOIN categoria c ON c.idCategoria=p.Categoria_idCategoria INNER JOIN aportepatrocinador ap ON ap.Proyecto_idProyecto=p.idProyecto WHERE ap.Usuario_idUsuario=(SELECT usu.idUsuario FROM usuario usu WHERE usu.usuario='{$usuario}') GROUP BY p.idProyecto, p.nombreproyecto, p.descripcion, c.nombreCategoria, m.rutaImagen, u.usuario";


    $result = $conexion->query($consulta);

    while($fila = $result->fetch_assoc()){
        $proyectos .= '<div class="card p-3 pt-4 mt-2 mb-2 tarjeta border border-info" onclick="verProyecto('.$fila["idProyecto"].')" style="cursor:pointer;">
    <div class="row ">
        <div class="col-lg-7">
            <img src="../Ajax/'.$fila["rutaImagen"].'" class="w-100">
        </div>
        <div class="col-lg-5 px-3">
            <div class="card-block px-3">
                <h2 class="card-title">'.$fila["nombreproyecto"].'</h2>
                <p class="text-right m-1"><i class="fas fa-user mr-2"></i><i>'.$fila["usuario"].'</i></p>
                <p class="m-2"><i>Categoria - '.$fila["nombreCategoria"].'</i></p>
                <div class="alert alert-primary row"><h4>MONTO APORTADO POR TI:</h4><h1 style="color:green;">$ '.$fila["cantidad"].'</h1></div>
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