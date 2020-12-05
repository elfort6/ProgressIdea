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
    <main class="container">
        <table class="table mt-5">
            <thead class="thead" style="background: #000080; color:aliceblue">
                <tr>
                    <th scope="col">Nombre Proyecto</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Emprendedor</th>
                    <th scope="col">Activar Proyectos</th>
                </tr>
            </thead>
            <tbody id="proyectos">
            </tbody>
        </table>

    </main>
    <!-- jQuery -->
    <script src="../librerias/jQuery/js/jQuery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom Fonts -->
    <script src="../librerias/FontAwesome/js/fontawesome.min.js"></script>
    <script type="text/javascript">
        (function() {
            $.post('../Ajax/php/tablaproyectosuspendido.php', {}, function(data) {
                document.getElementById("proyectos").innerHTML = "";
                document.getElementById("proyectos").innerHTML = data;
                //console.log(data);
            });
        })();

        function Activar(id) {
            datos = {
                id: id
            };
            $.ajax({
                method: "POST",
                url: "../Ajax/php/activarproyectos.php",
                data: datos
            }).done(function(data) {
                console.log(data);
                (function() {
                    $.post('../Ajax/php/tablaproyectosuspendido.php', {}, function(data) {
                        document.getElementById("proyectos").innerHTML = "";
                        document.getElementById("proyectos").innerHTML = data;
                        //console.log(data);
                    });
                })();
            });
        }
    </script>
</body>

</html>