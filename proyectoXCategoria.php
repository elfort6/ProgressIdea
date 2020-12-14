<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProgressIdea</title>
    <link rel="stylesheet" type="text/css" media="screen" href="librerias/bootstrap/css/bootstrap.min.css" />
    <script src="librerias/jQuery/js/jQuery.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.min.js"></script>
    <script src="librerias/popper/js/popper.js"></script>
    <script src="librerias/FontAwesome/js/all.js"></script>
    <script src="librerias/ScrollReveal/js/ScrollReveal.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <title>Progressdea</title>
</head>
<body>
    <!--Inicio del Nav-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="blog-header-logo text-dark" href="index.php">Progress Idea</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mr-auto" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="btn btn-sm btn-outline-info" href="registro_login/registrar.php">Registrarme</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-sm btn-outline-info" href="registro_login/login.php">Iniciar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php include "includes/categorias.html";?>
    <br><br>
    <!--Final del Nav-->
<main class="container" >
        <section id="proyectosLi" >
        <?php 
include 'Ajax/php/conexion.php';
                $proyectos = "";
                $consulta = "SELECT * FROM `multimediaproyecto` m INNER JOIN proyecto p ON m.Proyecto_idProyecto=p.idProyecto INNER JOIN categoria c ON c.idCategoria=p.Categoria_idCategoria WHERE c.idCategoria=".$_GET['id']."";
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
        </section>
</main>
<?php include "includes/footer.html";?>
    <script src="js/funciones.js"></script>
    <script src="js/index.js"></script>
</body>
</html>