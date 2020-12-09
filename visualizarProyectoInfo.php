<?php

session_start();
$sesion  = isset($_SESSION["sesion"]);
$tipoUser =isset($_SESSION["sesion"]["nivel"]);
if ($sesion) {
    $usuario = $_SESSION["sesion"]["usuario"];
    $tipoUser = $_SESSION["sesion"]["nivel"];
} else {
    $usuario = '';
}
include 'Ajax/php/conexion.php';
$idProyecto = $_GET['id'];
$proyectos = "";
$consulta = "SELECT m.rutaImagen, p.descripcion, p.nombreproyecto, c.nombreCategoria, p.Usuario_idUsuario, p.montoDeseado, u.usuario FROM `multimediaproyecto` m INNER JOIN proyecto p ON m.Proyecto_idProyecto=p.idProyecto INNER JOIN categoria c ON c.idCategoria=p.Categoria_idCategoria INNER JOIN usuario u ON u.idUsuario=p.Usuario_idUsuario WHERE p.idProyecto=" . $idProyecto;
$result = $conexion->query($consulta);
$comentarios = "";
$fila = $result->fetch_assoc();
$rutaImagen = $fila["rutaImagen"];
$descripcion = $fila["descripcion"];
$nombreproyecto = $fila["nombreproyecto"];
$nombreCategoria = $fila["nombreCategoria"];
$Usuario_idUsuario = $fila["Usuario_idUsuario"];
$montoDeseado = $fila["montoDeseado"];
$creador = $fila["usuario"];

$consulta1 = "SELECT * FROM `comentario`  WHERE idproyecto_proyecto ='" . $idProyecto . "'";
$resulta = $conexion->query($consulta1);

$consMontono = "SELECT SUM(monto) AS MontoTotal FROM aportepatrocinador WHERE Proyecto_idProyecto ='" . $idProyecto . "'";
$resulte = mysqli_query($conexion,$consMontono) or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));
$filasM = $resulte->fetch_assoc();
$montoAcumulado= $filasM['MontoTotal'];

while ($filas = $resulta->fetch_assoc()) {
    $comentarios .= '<div class="card col-md-12 mt-3">
        <div class="card-body">
          <h6>' . $filas["usuarioc"] . '</h6>
          <p class="card-text">' . $filas["descripcion"] . ' </p>
          <a href="#" class="float-right ">Responder</a>
          <a href="#" class="float-right mr-2 ">Me gusta</a>
        </div>
      </div>';
}
?>

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

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/calificacion.css">
</head>

<body>
    <!--Inicio del Nav-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="blog-header-logo text-dark" href="Index.php">Progress Idea</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mr-auto" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <?php if ($sesion) { ?>
                    <div class="dropdown">
                        <a class="dropdown-toggle dropdown-item" data-toggle="dropdown" href="#">
                            <span><i class="fa fa-user mr-2"> </i><?php echo $usuario ?></span><b class="caret"></b>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="registro_login/login.php">Perfil</a>
                            <a class="dropdown-item" href="Ajax/php/cerrarsesion.php">Cerrar Sesion</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="btn btn-sm btn-outline-info" href="registro_login/registrar.php">Registrarme</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-sm btn-outline-info" href="registro_login/login.php">Iniciar Sesión</a>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </nav>
    <?php include "includes/categorias.html"; ?>
    <br><br>
    <!--Final del Nav-->
    <main class="container">
        <section id="proyectosLi">
            <div class="card p-3 pt-4 mt-2 mb-2 tarjeta border border-info">
                <div class="row ">
                    <div class="col-md-7">
                        <img src="Ajax/<?php echo $rutaImagen ?>" class="w-100">
                        <br>
                        <h6 class="card-text text-justify mt-2">
                            <?php echo $descripcion ?>
                        </h6>
                    </div>
                    <div class="col-md-5 px-3">
                        <div class="card-block px-3">
                            <h2 class="card-title"> <?php echo $nombreproyecto  ?> </h2>
                            <p class="text-right m-1"><i><a id="creador" href="PerfilEmprendedor.php?user=<?php echo $creador ?>"><i class="fas fa-user mr-2"></i><?php echo $creador ?></a></i></p>
                            <p>Categoria: <?php echo $nombreCategoria ?></p>
                            <hr>
                            <h1 style="color:green;">$ <?php echo $montoAcumulado;?></h1>
                            <p>Se espera recolectar: $ <?php echo $montoDeseado;?></p>
                            <hr>
                            <h3>Califica este proyecto!</h3>
                            
                            <div class="row">
                                <p class="calificacion mt-auto" style="direction: rtl;unicode-bidi: bidi-override;">
                                    <input id="radio5" type="radio" name="estrellas" value="5" onclick="calificar(5);">
                                    <label for="radio5"><i class="fas fa-star"></i></label>
                                    <input id="radio4" type="radio" name="estrellas" value="4" onclick="calificar(4);">
                                    <label for="radio4"><i class="fas fa-star"></i></label>
                                    <input id="radio3" type="radio" name="estrellas" value="3" onclick="calificar(3);">
                                    <label for="radio3"><i class="fas fa-star"></i></label>
                                    <input id="radio2" type="radio" name="estrellas" value="2" onclick="calificar(2);">
                                    <label for="radio2"><i class="fas fa-star"></i></label>
                                    <input id="radio1" type="radio" name="estrellas" value="1" onclick="calificar(1);">
                                    <label for="radio1"><i class="fas fa-star"></i></label>
                                </p>
                                <h4 class="ml-5" id="puntaje"></h4>
                            </div>
                        </div>
                        <?php if ($sesion && $tipoUser!=1) { ?>
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" onclick="esconder(<?php echo $idProyecto ?>)" class="btn btn btn-outline-success btn-sm mt-2" >
                                    Escribir Comentario
                                </button>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-8">
                                            
                                            <input id="apoyo" type="text" class="form-control" placeholder="Apoyar $" style="position:absolute;height:2rem;margin-top:7px;">
                                        </div>
                                        <div class="col-4">
                                            <button id="colaborar" type="button" class="btn btn btn-outline-success btn-sm mt-2"><i class="far fa-money-bill-alt"></i></button>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php } elseif ($tipoUser==1){ ?>
                                <button type="button" onclick="esconder(<?php echo $idProyecto ?>)" class="btn btn btn-outline-success btn-sm mt-2" >
                                    Escribir Comentario
                        
                        <?php } else { ?>
                           
                            <div class="row">
                                <div class="col-6">
                                <button type="button" onclick="Registrate()" class="btn btn btn-outline-success btn-sm mt-2">
                                Escribir Comentario
                            </button>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-8"><input type="text" id="apoyo" class="form-control" placeholder="Apoyar $" style="position:absolute;height:2rem;margin-top:7px;"></div>
                                        <div class="col-4"><button onclick="Registrate()" type="button" class="btn btn btn-outline-success btn-sm mt-2"><i class="far fa-money-bill-alt"><a href="Ajax/php/recursos/test"></i></button></div>
                                    </div>
                                    
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-12" value="<?php echo $idProyecto ?>" id="<?php echo $idProyecto ?>" style="display: none;">
                        <div class="form-group mt-5">
                            <textarea class="form-control" id=Text<?php echo $idProyecto ?> rows="2"></textarea>

                        </div>
                        <button type="button" class="btn btn-outline-info bt-sm float-right" onclick="enviar(<?php echo $idProyecto ?>)">Enviar Comentario</button>
                    </div>
                    <div class="col-12" id="comentarios">
                    <div>
                            <div class="alert alert alert-danger mt-2" role="alert" id="mensaje" style="display: none;">
                             <a href="registro_login/registrar.php" class="alert-link">Por favor, regístrese</a>
                             o
                             <a href="registro_login/login.php" class="alert-link">inicie sesion </a>
                            </div>
                        </div>
                        <?php echo $comentarios
                        ?>
                    </div>
                </div>

            </div>
        </section>
    </main>
    <?php include "includes/footer.html"; ?>
    <script src="js/funciones.js"></script>
    <script>
        (function(){
            puntaje();
        })();
        function Registrate() {
            var mensaje=document.getElementById('mensaje');
            mensaje.style.display='block'

        }

        function esconder(elemt) {
            var comentario = document.getElementById(elemt);
            if (comentario.style.display == 'block') {
                comentario.style.display = 'none';
            } else {
                comentario.style.display = 'block';
            }
        }

        function enviar(elemt) {
            var comentario = document.getElementById(elemt);
            //var UsuarioC= document.getElementById("UsuarioC").value;
            var descripcion = document.getElementById(`Text${elemt}`).value;
            var f = new Date();
            var fecha = f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear();
            comentario.style.display = 'none';
            var datos = {
                idProyecto: elemt,
                descripcion: descripcion,
                fecha: fecha
            };
            $.ajax({
                method: "POST",
                url: "Ajax/php/comentario.php",
                data: datos
            }).done(function(data) {
                console.log(data);
                cargarComentarios(descripcion);
            });
            document.getElementById(`Text${elemt}`).value = '';

        }

        function cargarComentarios(descripcion) {
            comentarios = document.getElementById("comentarios");
            comentarios.innerHTML += `<div class="card col-md-12 mt-3">
	        <div class="card-body">
	          <h6><?php echo $usuario ?></h6>
	          <p class="card-text">${descripcion}</p>
	          <a href="#" class="float-right ">Responder</a>
	          <a href="#" class="float-right mr-2 ">Me gusta</a>
	        </div>
	      </div>`;
        }
        function calificar(e){
            
            $.post('Ajax/php/Calificar.php', {"estrellas": e, "idProyecto":<?php echo $idProyecto ?>}, function(data) {
                console.log(data);
                json = JSON.parse(data);
                if(json.status){
                }else{
                    if(json.error==3){
                        Registrate();
                        estrellas.checked = false;
                    }else{
                        estrellas.checked = false;
                        var mensaje=document.getElementById('mensaje');
                        mensaje.innerHTML = "Usted ya ha calificado este proyecto";
                        mensaje.style.display='block'
                    }
                }
                puntaje();
            });
        }

        function puntaje(){
            $.post('Ajax/php/obtnerPuntaje.php', {"idProyecto":<?php echo $idProyecto ?>}, function(data) {
                console.log(data);
                json = JSON.parse(data);
                if (json.puntaje>0) {
                    document.getElementById("radio"+json.estrellas).checked=true;
                    str = ""+json.puntaje;
                    document.getElementById("puntaje").innerHTML= str.substring(0.2)+'<i class="fas fa-star"></i>';
                }else{
                    str = json.puntaje+'<i class="fas fa-star"></i>';
                    document.getElementById("puntaje").innerHTML = str;
                }
                document.getElementById("puntaje").innerHTML+=json.votos+'<i class="fa fa-user"></i>';
                console.log(data);
            });
        }
    </script>

    <form action="Ajax/php/recursos/test/" id="formu" method="post">   
        <input type="hidden" id="montoApoyo" name="montoApoyo"/>
        <input type="hidden" id="idProyecto" name="idProyecto">
    </form>

    <script>
        var button = document.querySelector('#colaborar');
        button.addEventListener('click', function () {
              const form = document.getElementById('formu');
              document.getElementById('idProyecto').value = <?php echo $idProyecto?>;
              document.getElementById('montoApoyo').value = document.getElementById('apoyo').value;
              form.submit();
            });
        
    </script>

</body>

</html>