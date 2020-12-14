<?php 
	session_start();
	$sesion  = isset($_SESSION["sesion"]); 
	$emprendedor = $_GET["user"];
 ?>

 <!DOCTYPE html>
 <html lang="es">
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
    <link rel="stylesheet" href="css/perfiles.css">
</head>
<body>
    <!--Inicio del Nav-->
    <nav class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-light">
        <a class="blog-header-logo text-dark" href="index.php">Progress Idea</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
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

    <div class="jumbotron p-3 p-md-4 text-white container" >
        <div class="col-md-6 px-0 row" id="perfil">
            
        </div>
    </div>

 	<main class="container" >
        <section id="proyectos" ></section>
    </main>
    <?php include "includes/footer.html"; ?>
 	<script type="text/javascript">
 		(function(){
 			$.post('Ajax/php/perfil.php', {"usuario": '<?php echo $emprendedor ?>'}, function(data) {
 				document.getElementById("perfil").innerHTML = data;
 			});
 			$.post('Ajax/php/obtenerProyectosLanding.php', {"usuario": '<?php echo $emprendedor ?>'}, function(data) {
                document.getElementById("proyectos").innerHTML = data;
 			});
 		})();
 	</script>
    <script src="js/index.js"></script>
 </body>
 </html>