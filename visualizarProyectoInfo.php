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
    <title>Progressdea</title>
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
                <li class="nav-item">
                    <a class="btn btn-sm btn-outline-info" href="registro_login/registrar.php">Registrarme</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-sm btn-outline-info" href="registro_login/login.php">Iniciar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php include "includes/categorias.html"; ?>
    <br><br>
    <!--Final del Nav-->
    <main class="container">
        <section id="proyectosLi">
            <?php
            include 'Ajax/php/conexion.php';
            $proyectos = "";
            $consulta = "SELECT * FROM `multimediaproyecto` m INNER JOIN proyecto p ON m.Proyecto_idProyecto=p.idProyecto INNER JOIN categoria c ON c.idCategoria=p.Categoria_idCategoria WHERE p.idProyecto=" . $_GET['id'] . "";
            $result = $conexion->query($consulta);
            $comentarios = "";

            while ($fila = $result->fetch_assoc()) {
                $consulta1 = "SELECT * FROM `comentario`  WHERE idproyecto_proyecto ='" . $fila["idProyecto"] . "'";
                $resulta = $conexion->query($consulta1);
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
                $proyectos .= '<div class="card p-3 pt-4 mt-2 mb-2 tarjeta border border-info">
                <div class="row ">
                    <div class="col-md-7">
                        <img src="Ajax/' . $fila["rutaImagen"] . '" class="w-100">
                        <br>
                        <h6 class="card-text text-justify mt-2">
                        ' . $fila["descripcion"] . ' 
                        </h6>
                    </div>
                    <div class="col-md-5 px-3">
                        <div class="card-block px-3">
                            <h2 class="card-title">' . $fila["nombreproyecto"] . '</h2>
                            <p>Categoria: ' . $fila["nombreCategoria"] . '</p>
                            <hr>
                            <h1 style="color:green;">Lps. 0.00</h1>
                            <p>Se espera recolectar: Lps. 5,000.00</p>
                            <h5>Patrocinador: Anonimo</h5>
                            <hr>
                            <h3>Califica este proyecto!</h3>
                            <div class="card-footer bg-transparent border-success">
                                    <span id="star1"><i class="fas fa-star" ></i></span>
                                    <span id="star2"><i class="fas fa-star" ></i></span>
                                    <span id="star3"><i class="fas fa-star" ></i></span>
                                    <span id="star4"><i class="fas fa-star" ></i></span>
                                    <span id="star5"><i class="fas fa-star" ></i></span>
                        </div>
                    </div>
                    <?php session_start(); if (!isset($_SESSION["sesion"])) { ?>
                        <button type="button"  onclick="esconder(' . $fila["idProyecto"] . ')" class="btn btn btn-outline-success btn-sm mt-2">
                        Escribir Comentario
                    </button>
                    <?php } else { ?>
                    <?php } ?>
                    </div>
                    <div class="col-md-12" value=' . $fila["idProyecto"] . ' id=' . $fila["idProyecto"] . ' style="display: none;">
                    <input value=' . $fila["Usuario_idUsuario"].' id="UsuarioC" style="display:none">
                    <div class="form-group mt-5">
                        <textarea class="form-control  " id=Text' . $fila["idProyecto"] . ' rows="2"></textarea>
                        
                    </div>
                    <button type="button"  class="btn btn-outline-info bt-sm float-right"  onclick="enviar(' . $fila["idProyecto"] . ')" >Enviar Comentario</button>
                    </div>
                    ' . $comentarios . ' 
                </div>

                </div>
            </div>
            ';
            }
            echo $proyectos;

            ?>
        </section>
    </main>
    <?php include "includes/footer.html"; ?>
    <script src="js/funciones.js"></script>
    <script>
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
            UsuarioC= document.getElementById("UsuarioC").value;
            var descripcion = document.getElementById(`Text${elemt}`).value;
            var f = new Date();
            var fecha = f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear();
            console.log(UsuarioC);
            comentario.style.display = 'none';
            var datos = {
                idProyecto: elemt,
                descripcion: descripcion,
                fecha: fecha,
                usuarioc:UsuarioC
            };
            $.ajax({
                method: "POST",
                url: "Ajax/php/comentario.php",
                data: datos
            }).done(function(data) {
                console.log(data);
            });
            document.getElementById(`Text${elemt}`).value = '';

        }
    </script>

</body>

</html>