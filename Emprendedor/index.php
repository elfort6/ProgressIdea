<?php
include '../Ajax/php/SesionEmprendedor.php';
 ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>usuario</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">

        <link rel="stylesheet" href="../css/emp_index.css">

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="../Index.php">Progress Idea</a>
            </div>
            
            <div class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user"></i><span class="pl-5"><?php echo $_SESSION["sesion"]["usuario"] ?></span><b class="caret"></b>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="index.php">Perfil</a>
                    <a class="dropdown-item" href="#">Estadisticas</a>
                    <a class="dropdown-item" href="configuracion.php">Configuracion</a>
                    <a class="dropdown-item" href="../Ajax/php/cerrarsesion.php">Cerrar Sesion</a>
                </div>
            </div>

        </nav>
        

        <a class="btn btn-lg btn-success mt-3 ml-4" href="NuevoProyecto.php">Crear Proyecto</a>

        <section class="container mt-3" id="info">
            <div class="row justify-content-center align-items-center minh-100" id="proyectos">
            </div>
        </section>

        <!-- jQuery -->
        <script src="../librerias/jQuery/js/jQuery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>

        <!-- Custom Fonts -->
        <script src="../librerias/FontAwesome/js/fontawesome.min.js"></script>

        <script type="text/javascript">
            (function(){
                $.post('../Ajax/php/obtenerProyectos.php',{},function(data){
                    document.getElementById("proyectos").innerHTML = "";
                    document.getElementById("proyectos").innerHTML = data;
                    //console.log(data);
                });
            })();

        </script>

    </body>
</html>
