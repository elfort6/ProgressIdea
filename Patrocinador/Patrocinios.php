<?php
include '../Ajax/php/SesionPatrocinador.php';
 ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Patrocinador</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" href="../css/emp_index.css">
        <script src="../librerias/FontAwesome/js/all.js"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand navbar-light bg-light" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="../Index.php">Progress Idea</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <div class="dropdown">
                <a class="dropdown-toggle dropdown-item" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                    <span class=""><i class ="fa fa-user mr-2"> </i><?php echo $_SESSION["sesion"]["usuario"] ?></span><b class="caret"></b>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="index.php">Perfil</a>
                    <a class="dropdown-item" href="../Ajax/php/cerrarsesion.php">Cerrar Sesion</a>
                </div>
            </div>
        </div>
    </nav>
    <main class="container col-md-9 mt-5" >
        <section id="proyectos" >
            
        </section>
    </main>
        
    <!-- jQuery -->
    <script src="../librerias/jQuery/js/jQuery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom Fonts -->
    <script src="../librerias/FontAwesome/js/fontawesome.min.js"></script>
    <script type="text/javascript">
        (function() {
            $.post('../Ajax/php/proyectosPatrocinados.php', {}, function(data) {
                document.getElementById("proyectos").innerHTML = data;
            });
        })();

        function verProyecto(id){
            window.location.assign(`../visualizarProyectoInfo.php?id=${id}`);
        }
    </script>

    </body>
</html>
