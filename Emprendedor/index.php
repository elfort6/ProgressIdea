<?php
include '../Ajax/php/SesionEmprendedor.php';
include '../Ajax/php/conexion.php';
$usu = $_SESSION["sesion"]["usuario"];
$consulta = "SELECT* FROM usuario where usuario='" . $_SESSION["sesion"]["usuario"] . "'";
$result = $conexion->query($consulta);
$usu = $result->fetch_assoc();
$Notificaciones = "";
$consulta1 = "SELECT* FROM comentario  where visto=0 and usuarioactual='" . $usu["idUsuario"] . "'";
$consulta="SELECT Count(*) as total FROM comentario  where visto=0 and usuarioactual='" . $usu["idUsuario"] . "'";
$result = $conexion->query($consulta);
$result1 = $conexion->query($consulta1);
$filas = $result->fetch_assoc();
while ($fila = $result1->fetch_assoc()) {
    $Notificaciones .= '<div class="dropdown-header"> El usuario   <b>'. $fila["usuarioc"] . '</b> comento <br></div><a id='. $fila["id"] .' onclick= enviar(this.id,'. $fila["idproyecto_proyecto"] .') class="alert-link text-center ml-5">Ver Comentario</a> <hr>';
} 
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
            <p style="color:black">(<?php                  
                    echo $filas['total'];?>)
            
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" style="padding: 0;border: none;background: none;" data-toggle="dropdown"><a><i class="fas fa-bell fa-lg" style="color:#FFC102;"></i></a></button>
                <div class="dropdown-menu">
                    <?php                       

                    echo $Notificaciones;
                    ?>

                </div>
            </div>
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
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Mis Proyectos</a>
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
                            <div class="tab-pane fade text-center col-md-12" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="container text-center my-3">
                                    <a href="NuevoProyecto.php" class="col-md-6 btn btn-lg btn-block btn-primary offset-md-3">Crear Proyecto</a>
                                </div>
                                <div class="container" id="proyectos" >
                                    <section id="" ><h2>No hay proyectos</h2></section>
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
            $.post('../Ajax/php/obtenerProyectos.php', {}, function(data) {
                document.getElementById("proyectos").innerHTML = data;
                //console.log(data);
            });
        })();

        function enviar(idcomentario,idproyecto){
            console.log(idcomentario);
            console.log(idproyecto);
            datos = {
                id: idcomentario
            };
            $.ajax({
                method: "POST",
                url: "../Ajax/php/vercomentario.php",
                data: datos
            }).done(function(data) {
                console.log(data);
                window.location.assign(`../visualizarProyectoInfo.php?id=${idproyecto}`);
            });
        }
    </script>
    <script src="../js/index.js"></script>

</body>

</html>
