<?php 
session_start();
$sesion  = isset($_SESSION["sesion"]); 
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
    <script src="librerias/ScrollReveal/js/ScrollReveal.js"></script>
    <script src="js/funciones.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <!--Inicio del Nav-->
    <nav class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-light">
        <a class="blog-header-logo text-dark" href="Index.php">Progress Idea</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
            <div class="form-inline mt-2 mt-lg-0 ml-auto " id="form">
                <input class="form-control" type="search" id="busqueda" name="busqueda" placeholder="Busqueda" aria-label="Search" onkeypress="buscarEnter(event);" required=" ">
                <button class="btn btn-outline-info my-2 my-sm-0 " onclick="buscar();"><i class="fas fa-search"></i></button>
            </div>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <?php if ($sesion){ ?>
                    <div class="dropdown">
                        <a class="dropdown-toggle dropdown-item" data-toggle="dropdown" href="#">
                            <span><i class="fa fa-user mr-2"> </i><?php echo $_SESSION["sesion"]["usuario"] ?></span><b class="caret"></b>
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
                <li class="nav-item ml-md-2 mt-sm-2 mt-2 mt-lg-0 mt-md-0">
                    <a class="btn btn-sm btn-outline-info" href="registro_login/login.php">Iniciar Sesión</a>
                </li>
                <?php } ?>
                
            </ul>
        </div>
    </nav>
    <!--Final del Nav-->
    <?php include "includes/categorias.html";?>
    <div class="jumbotron p-4 p-md-5 text-white container" style="background-image: url(img/l.jpg);background-size: cover;">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">ProgressIdea, tus proyectos en lo mas alto.</h1>
                <p class="lead my-3">Registrate y promociona tus proyectos o servicios, un patrocinador te esta esperando.</p>
            </div>
        </div>


    <!-- MAIN ?php require 'Ajax/php/obtenerProyectosLanding.php'? -->
    <main class="container proyectos" >
        <section id="proyectosL" >
            
        </section>
    </main>
    <!-- /.MAIN -->
    <!-- /.container -->
    

    <?php include "includes/footer.html";?>
</body>
<script type="text/javascript" src="js/validar.js"></script>
<script type="text/javascript">
    (function(){
        cargar();
    })();

    function cargar(){
        $.post('Ajax/php/obtenerProyectosLanding.php',{},function(data){
            document.getElementById("proyectosL").innerHTML = "";
            document.getElementById("proyectosL").innerHTML = data;
        });
    }

    function buscar(){
        valor = validar();
        texto = document.getElementById("busqueda").value;
        if(texto != " " && valor){
            $.post('Ajax/php/Busqueda.php', {"busqueda": texto}, function(data) {
                document.getElementById("proyectosL").innerHTML = "";
                document.getElementById("proyectosL").innerHTML = data;
            });
        }
    }
    function buscarEnter(e){
        if (e.keyCode === 13 && !e.shiftKey) {
            buscar();
        }
    }
</script>
<script src="js/index.js"></script>

</html>