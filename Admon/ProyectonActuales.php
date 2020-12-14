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
    <script src="../librerias/FontAwesome/js/all.js"></script>
    <script src="../librerias/ScrollReveal/js/ScrollReveal.js"></script>

</head>

<body>
        <nav class="navbar navbar-expand navbar-light bg-light" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">Progress Idea</a>
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
                        <a class="dropdown-item" href="../Ajax/php/cerrarsesion.php">Cerrar Sesion</a>
                    </div>
                </div>
            </div>

        </nav>
    <main class="container">
        <section id="tabla">
            <table class="table mt-5">
                <thead class="thead" style="background: #000080; color:aliceblue">
                    <tr>
                        <th scope="col">Nombre Proyecto</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Emprendedor</th>
                        <th scope="col">Suspender Proyecto</th>
                        <th scope="col">Eliminar Proyecto</th>
                    </tr>
                </thead>
                <tbody id="proyectos">
                </tbody>
            </table>
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
            $.post('../Ajax/php/tablaproyectos.php', {}, function(data) {
                document.getElementById("proyectos").innerHTML = "";
                document.getElementById("proyectos").innerHTML = data;
                //console.log(data);
            });
        })();

        function eliminar(id) {
            datos = {
                id: id
            };
            $.ajax({
                method: "POST",
                url: "../Ajax/php/eliminarproyecto.php",
                data: datos
            }).done(function(data) {
                console.log(data);
                (function() {
                    $.post('../Ajax/php/tablaproyectos.php', {}, function(data) {
                        document.getElementById("proyectos").innerHTML = "";
                        document.getElementById("proyectos").innerHTML = data;
                        //console.log(data);
                    });
                })();
            });


        }

        function suspender(id) {
            datos = {
                id: id
            };
            $.ajax({
                method: "POST",
                url: "../Ajax/php/suspenderproyecto.php",
                data: datos
            }).done(function(data) {
                console.log(data);
                (function() {
                    $.post('../Ajax/php/tablaproyectos.php', {}, function(data) {
                        document.getElementById("proyectos").innerHTML = "";
                        document.getElementById("proyectos").innerHTML = data;
                        //console.log(data);
                    });
                })();
            });


        }
    </script>
    <script src="../js/index.js"></script>

</body>

</html>