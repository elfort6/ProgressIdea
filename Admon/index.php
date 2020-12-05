<?php 
include '../Ajax/php/sessionAdmi.php';
 ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Administrador</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">

        <link rel="stylesheet" href="../css/emp_index.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    </head>
    <body>
        <nav class="navbar navbar-expand navbar-light bg-light" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="../Index.php">Progress Idea</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                </ul>
                <div class="dropdown">
                    <a class="dropdown-toggle dropdown-item" data-toggle="dropdown" href="#">
                        <i class="fa fa-user mr-2"></i><span><?php echo $_SESSION["sesion"]["usuario"] ?></span><b class="caret"></b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="index.php">Perfil</a>
                        <a class="dropdown-item" href="#">Estadisticas</a>
                        <a class="dropdown-item" href="configuracion.php">Configuracion</a>
                        <a class="dropdown-item" href="../Ajax/php/cerrarsesion.php">Cerrar Sesion</a>
                    </div>
                </div>
            </div>

        </nav>
        
        <a class="btn btn-lg btn-info mt-3 ml-4 " href="ProyectonActuales.php"> Proyectos Actuales</a>
        <a class="btn btn-lg btn-info mt-3 ml-4 " href="proyectosuspendidos.php">Proyectos Suspendidos</a>
        <a class="btn btn-lg btn-info mt-3 ml-4 " href="agregarAdmi.php">Agregar Administrador</a>

        <!-- jQuery -->
        <script src="../librerias/jQuery/js/jQuery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>

        <!-- Custom Fonts -->
        <script src="../librerias/FontAwesome/js/fontawesome.min.js"></script>
    </body>
</html>
