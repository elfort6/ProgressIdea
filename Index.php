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
    <div class="container">
        <div class="nav-scroller py-1 mb-2 ">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted" href="#">Arte</a>
                <a class="p-2 text-muted" href="#">Deporte</a>
                <a class="p-2 text-muted" href="#">Tecnologia</a>
                <a class="p-2 text-muted" href="#">Juegos de Video</a>
                <a class="p-2 text-muted" href="#">Comics Y Libros</a>
                <a class="p-2 text-muted" href="#">Animaciones</a>
                <a class="p-2 text-muted" href="#">Cine</a>
                <a class="p-2 text-muted" href="#">Ciencia</a>
                <a class="p-2 text-muted" href="#">Musica</a>
                <a class="p-2 text-muted" href="#">Documentales</a>
            </nav>
        </div>
    </div>
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
    <div class="container">
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-code-slash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0zm-.999-3.124a.5.5 0 0 1 .33.625l-4 13a.5.5 0 0 1-.955-.294l4-13a.5.5 0 0 1 .625-.33z"/>
</svg>
                    <small class="d-block mb-3 text-muted">&copy; ProgressIdea 2020</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Proyectos</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Cortometrajes</a></li>
                        <li><a class="text-muted" href="#">Juegos</a></li>
                        <li><a class="text-muted" href="#">Pintura</a></li>
                        <li><a class="text-muted" href="#">teatro</a></li>
                        <li><a class="text-muted" href="#">Musica</a></li>
                        <li><a class="text-muted" href="#">Top proyectos</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Recursos</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Quienes somos</a></li>
                        <li><a class="text-muted" href="preguntasFrecuentes.html">preguntas frecuentes</a></li>
                        <li><a class="text-muted" href="#">Foro de dicucion</a></li>
                        <li><a class="text-muted" href="#">Links de utilidad</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Sobre nosotros</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Equipo</a></li>
                        <li><a class="text-muted" href="#">Localizacion</a></li>
                        <li><a class="text-muted" href="#">Privacidad</a></li>
                        <li><a class="text-muted" href="#">Terminos y condiciones</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>


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