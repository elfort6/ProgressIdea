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

        <div class="container my-5">
        <div class="container">
            <form method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-img ml-auto col-12" id="avatar">
                            
                        </div>
                        <div class="">
                            <a class="btn btn-primary w-100" style="border-radius: 0;" name="btnAddMore" href="configuracion.php">Editar Perfil</a>
                        </div>
                    </div>
                    <div class="col-md-9 m-auto">
                        <div class="profile-head">
                                    <h4>
                                        <b id="nombreCompleto"></b>
                                    </h4>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item bg-primary active" style="border-radius:  4px 4px 0px 0px;">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mis Datos</a>
                                </li>
                                <li class="nav-item bg-primary" style="border-radius: 4px 4px 0px 0px;">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Mas Opciones</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active col-md-10 mt-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                                
                            </div>
                            <div class="tab-pane fade text-center col-12 mt-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row col-12 ml-auto">
                                    <div class="col-md-6 col-lg-6">
                                    <div class="card m-3 tarjeta">
                                        <div class="card-header bg-success">    
                                            <h4 class="text-light"><b>Proyectos Activos</b></h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Proyectos que estan en curso y visibles para todos los usuario</p>
                                            <a class="btn btn-md btn-primary" href="ProyectonActuales.php"> Ver Detalles<i class="fas fa-arrow-right ml-2"></i></a>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                    <div class="card m-3 tarjeta">
                                        <div class="card-header" style="background-color: #ffab10;">
                                            <h4 class="text-light"><b>Proyectos Suspendidos</b></h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Proyecttos que estan fuera de linea por violar algunas reglas</p>
                                            <a class="btn btn-md btn-primary" href="proyectosuspendidos.php">Ver Detalles<i class="fas fa-arrow-right ml-2"></i></a>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                    <div class="card m-3 tarjeta">
                                        <div class="card-header bg-danger">
                                            <h4 class="text-light"><b>Proyectos Caducados</b></h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Proyectos que termino el periodo de ejecucion que habian establecido</p>
                                            <a class="btn btn-md btn-primary" href="proyectosVencidos.php">Ver Detalles<i class="fas fa-arrow-right ml-2"></i></a>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                    <div class="card m-3 tarjeta">
                                        <div class="card-header bg-primary">
                                            <h4 class="text-light"><b>Agregar Administrador</b></h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Agregar usuario con el rol de administrador a la plataforma</p>
                                            <a class="btn btn-md btn-primary mt-3 ml-4 " href="agregarAdmi.php">Ver Detalles<i class="fas fa-arrow-right ml-2"></i></a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
    </div>
    <!-- jQuery -->
    <script src="../librerias/jQuery/js/jQuery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom Fonts -->
    <script src="../librerias/FontAwesome/js/fontawesome.min.js"></script>
    <script type="text/javascript">
        (function() {
            $.post('../Ajax/php/datosDeUsuario.php', {}, function(data) {
                json = JSON.parse(data);
                document.getElementById("avatar").innerHTML = "";
                document.getElementById("avatar").innerHTML = json.avatar;
                document.getElementById("home").innerHTML = "";
                document.getElementById("home").innerHTML = json.informacion;
                document.getElementById("nombreCompleto").innerHTML = "";
                document.getElementById("nombreCompleto").innerHTML = json.nombre;
            });
        })();
    </script>
    <script src="../js/index.js"></script>

    </body>
</html>
