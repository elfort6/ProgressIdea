<?php 
    session_start();
if (isset($_SESSION["sesion"])) {
    $nivel = $_SESSION["sesion"]["nivel"];
    if($nivel==1){
        header("location: ../Emprendedor/index.php");
    }else if($nivel == 2){
        header("location: ../index.html");
    }else if($nivel == 3){
        header("location: ../index.html");
    }
}
 ?>

<!DOCTYPE html>

<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    
</head>

<body>

    <div class="enable">
        <header class="blog-header">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-lg-4 offset-lg-4 col-sm-4 col-8 logo">
                    <a class="blog-header-logo text-dark" href="../Index.html"><b>Progress Idea</b></a>
                </div>
            </div>
        </header>
    </div>

    <div class="container col-lg-4 col-md-6 mt-lg-5 mt-md-5">

        <div class="panel-heading panel-primary">
            <h2 class="header panel-primary">Login</h2>
        </div>
        
        <!-- /.panel-body -->
        <div class="panel-body col-lg-12 pt-4 pb-5" id="form">

            <div class="col-lg-12">
                <div class="form-group col-lg-12">
                    <label>Nombre</label>
                    <input class="form-control" type="text" id="usuario" name="usuario" required=" ">
                    <div class="valid-feedback">¡Ok válido!</div>
                    <div class="invalid-feedback">No Valido.</div>
                </div>
                <div class="form-group col-lg-12">
                    <label>Contraseña</label>
                    <input class="form-control" type="password" id="clave" name="clave" required=" ">
                    <div class="valid-feedback">¡Ok válido!</div>
                    <div class="invalid-feedback">No Valido.</div>
                </div>
                <div class="form-group">
                    <a href="recuperacion.html" style="color:grey;">¿Has olvidado Tu contraseña?</a>
                </div>
                
                <div class="form-group col-lg-8 col-md-6 offset-lg-2 offset-md-3">
                    <button class="btn-lg btn-block col-lg-12 btn-success" id="btnAcpetar" onclick="enviar();">Ingresar</button>
                </div>


                <div class="form-group">
                    ¿No tienes una cuenta?
                    <a href="registrar.html" style="color:grey;">Registrate aqui</a>
                </div>
                <span id="msg">
                    
                </span>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.container-->
    
    <!-- jQuery -->
    <script src="../librerias/jQuery/js/jQuery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>

    <!-- JavaScript -->
    <script src="../js/validar.js"></script>

    <script type="text/javascript">
        function enviar(){
            var valor = validar();
            if (valor){
                var usuario = $("#usuario").val(), clave = $("#clave").val();
                $.ajax({
                  method: "POST",
                  url: "../Ajax/php/IniciarSesion.php",
                  data: {"usuario":usuario,"clave":clave}
                }).done(function( msg ) {
                    console.log(msg);
                    json = JSON.parse(msg);
                    if(json.status){
                        window.location = json.url;
                    }else{
                        document.getElementById("msg").innerHTML = `<div class="alert alert-danger">${json.mensaje}</div>`;

                    }
                  });

            }
        }
    </script>
</body>

</html>

</html>