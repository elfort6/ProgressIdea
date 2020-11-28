<?php
include '../Ajax/php/SesionEmprendedor.php';
include '../Ajax/php/conexion.php';
$usu = $_SESSION["sesion"]["usuario"];
$consulta = "SELECT* FROM usuario where usuario='" . $_SESSION["sesion"]["usuario"] . "'";
$result = $conexion->query($consulta);
$usu = $result->fetch_assoc();
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="../Index.php">Progress Idea</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <form class="form-inline my-1 my-lg-0">


                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" style="padding: 0;border: none;background: none;" data-toggle="dropdown"><a><i class="fas fa-bell fa-lg" style="color:#FFC102;"></i></a></button>
                    <div class="dropdown-menu">
                        <?php
                        $Notificaciones = "";
                        $consulta1 = "SELECT* FROM comentario  where usuarioactual='" . $usu["idUsuario"] . "'";
                        $result1 = $conexion->query($consulta1);
                        while ($fila = $result1->fetch_assoc()) {
                            $Notificaciones .= '<div class="dropdown-header"> El usuario  <b>'. $fila["usuarioc"] . '</b> comento <br>'. $fila["descripcion"] . ' </div> <hr>';
                        }                        

                        echo $Notificaciones;
                        ?>

                    </div>
                </div>
                <div class="dropdown">
                    <a class="dropdown-toggle dropdown-item" data-toggle="dropdown" href="#">
                        <span class=""><i class="fa fa-user mr-2"> </i><?php echo $_SESSION["sesion"]["usuario"] ?></span><b class="caret"></b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="index.php">Perfil</a>
                        <a class="dropdown-item" href="#">Estadisticas</a>
                        <a class="dropdown-item" href="configuracion.php">Configuracion</a>
                        <a class="dropdown-item" href="../Ajax/php/cerrarsesion.php">Cerrar Sesion</a>
                    </div>
                </div>
            </form>
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
        (function() {
            $.post('../Ajax/php/obtenerProyectos.php', {}, function(data) {
                document.getElementById("proyectos").innerHTML = "";
                document.getElementById("proyectos").innerHTML = data;
                //console.log(data);
            });
        })();
    </script>

</body>

</html>