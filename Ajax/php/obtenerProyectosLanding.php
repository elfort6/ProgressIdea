<?php 
include 'conexion.php';
$proyectos = "";
    
if(!empty($_POST)){
    $usuario = $_POST["usuario"];
    $consulta = "SELECT p.idProyecto, p.nombreproyecto, p.descripcion, c.nombreCategoria, m.rutaImagen, u.usuario FROM `usuario` u INNER JOIN proyecto p ON p.Usuario_idUsuario=u.idUsuario INNER JOIN multimediaproyecto m ON m.Proyecto_idProyecto=p.idProyecto INNER JOIN categoria c ON c.idCategoria=p.Categoria_idCategoria WHERE usuario='{$usuario}'";
}else{
    $consulta = "SELECT p.idProyecto, p.nombreproyecto, p.descripcion, c.nombreCategoria, m.rutaImagen, u.usuario FROM `usuario` u INNER JOIN proyecto p ON p.Usuario_idUsuario=u.idUsuario INNER JOIN multimediaproyecto m ON m.Proyecto_idProyecto=p.idProyecto INNER JOIN categoria c ON c.idCategoria=p.Categoria_idCategoria";
}

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
    echo $proyectos;

 ?>