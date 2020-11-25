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
    <script src="js/funciones.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <!--Inicio del Nav-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="blog-header-logo text-dark" href="#">Progress Idea</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
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
    <!--Final del Nav-->
    <?php include "includes/categorias.html";?>
    <div class="jumbotron p-4 p-md-5 text-white container" style="background-image: url(img/l.jpg);background-size: cover;">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">ProgressIdea, tus proyectos en lo mas alto.</h1>
                <p class="lead my-3">Registrate y promociona tus proyectos o servicios, un patrocinador te esta esperando.</p>
            </div>
        </div>

    <!-- MAIN ?php require 'Ajax/php/obtenerProyectosLanding.php'? -->
    <main class="container" >
        <section id="proyectosL" ></section>
    </main>
    <!-- /.MAIN -->
    <!-- /.container -->
    

    <?php include "includes/footer.html";?>
</body>
<script type="text/javascript">
    (function(){
                $.post('Ajax/php/obtenerProyectosLanding.php',{},function(data){
                    document.getElementById("proyectosL").innerHTML = "";
                    document.getElementById("proyectosL").innerHTML = data;
                });
            })();
</script>

</html>