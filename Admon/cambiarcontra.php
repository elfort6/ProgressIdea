<?php 
    include '../Ajax/php/sessionAdmi.php';
 ?>

<!DOCTYPE html>

<html>

<head>
    <title>Recupracion de contraseña</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/emp_index.css">
    <!-- jQuery -->
    <script src="../librerias/jQuery/js/jQuery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
    <script src="../librerias/FontAwesome/js/all.js"></script>

    <!-- JavaScript -->
    <script src="../js/validar.js"></script>
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
                <a class="dropdown-toggle dropdown-item" data-toggle="dropdown" href="#">
                    <i class="fa fa-user mr-2"></i><span><?php echo $_SESSION["sesion"]["usuario"] ?></span><b class="caret"></b>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="index.php">Perfil</a>
                    <a class="dropdown-item" href="#">Estadisticas</a>
                    <a class="dropdown-item" href="configuracion.php">Configuracion</a>
                    <a class="dropdown-item" href="../Ajax/php/cerrarsesion.php">Cerrar Sesion</a>
                </div>
            </div>
        </div>

    </nav>
    

    <div class="container col-lg-4 col-md-5 mt-lg-5 mt-md-5">
        <div class="card tarjeta">

            <div class="card-heading bg-info">
                <h2 class="text-center text-white">Cambiar Contraseña</h2>
            </div>

            <!-- /.panel-body -->
            <div class="card-body col-lg-12 pt-4 pb-5">

                <div class="col-lg-12" id="form">
                    <label>Ingresa tu Contraseña Actual</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="contraActual" name="contraActual" placeholder="" required=" ">
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback">No Valido.</div>
                    </div>
                    <label>Ingresa tu Contraseña Nueva</label>
                    <div class="form-group">
                        <input class="form-control" type="password" id="contra1" name="contra1" placeholder="" onkeydown="validarNuevaContra();" required=" ">
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback">No Valido.</div>
                    </div>
                    <label>Repetir contraseña nueva</label>
                    <div class="form-group">
                        <input class="form-control" type="password" id="contra2" name="contra2" placeholder="" onkeydown="validarNuevaContra();" required=" ">
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback">No Valido.</div>
                    </div>
                    <span id="mensaje"></span>
                    <div class="row">
                        <span id="msg"></span>
                        <div class="form-group col-lg-6 col-md-6 mt-lg-5">
                            <a class="btn-lg btn-block col-lg-12 btn-danger text-center text-white" style="border-bottom: solid #69121A 2px; border-right: solid #69121A 2px; text-decoration: none;" id="btnRegresar" href="index.php">Regresar</a>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 mt-lg-5">
                            <button type="submit" class="btn-lg btn-block col-lg-12 btn-success" id="btnAcpetar" onclick="enviar()">Aceptar</button>
                        </div>
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <!-- /.container-->

    
    <script type="text/javascript">

        function validarNuevaContra(){
            clearTimeout();
            setTimeout("verifica()", 200);
        }

        function verifica(){
            var contra1 = $("#contra1").val(),
            contra2 = $("#contra2").val();
            if(contra1 == contra2){
                document.getElementById("mensaje").innerHTML = `<p class="help-block text-success">* Las nuevas contraseñas coinciden.</p>`;
                return true;
            }else{
                document.getElementById("mensaje").innerHTML = `<p class="help-block text-danger">* Las nuevas contraseñas no coinciden.</p>`;
                return false;
            }
        }

        function enviar() {
            var valor = validar();
            if (valor) {
                var contra1 = $("#contra1").val();
                var contra2 = $("#contra2").val();
                var contra=$("#contraActual").val();
                console.log(contra);
                if(contra1==contra){
                    document.getElementById("msg").innerHTML ='';
                    document.getElementById("msg").innerHTML = `<div class="alert alert-danger">Las contraseñas Nueva no puede ser la misma que la Contraseña anterior</div>`;
                }else{
                    if(contra1==contra2){
                    $.ajax({
                    method: "POST",
                     url: "../Ajax/php/cambiarcontrasenia.php",
                    data: {"contraA":contra,"contraN":contra1}
                }).done(function( msg ) {
                    json = JSON.parse(msg);
                    console.log(json)
                    if(json.status){
                        document.getElementById("msg").innerHTML = `<div class="alert alert-info">${json.mensaje}</div>`;
                        setTimeout("redireccionar()", 2000);
                    }else{
                        document.getElementById("msg").innerHTML = `<div class="alert alert-danger">${json.mensaje}</div>`;

                    }
                  });
                  
                }
                }
    
            }
        }

        function redireccionar(){
            location.href= "../registro_login/login.php";
        }
    </script>
</body>

</html>

</html>