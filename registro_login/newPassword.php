<?php
require "../Ajax/php/conexion.php";

$consultRecu = mysqli_query($conexion,'SELECT * FROM recuperacioncuenta WHERE idRecuperacion = "'.$_GET['idpwd'].'"');
$consulta=$consultRecu->fetch_assoc();
if(isset($consulta['idUsuario'])){
    
    


?>
<!DOCTYPE html>

<html>

<head>
    <title>Cambio de contraseña</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../librerias/ScrollReveal/js/ScrollReveal.js"></script>

</head>

<body>

    <div class="enable">
        <header class="blog-header">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-lg-4 offset-lg-4 col-sm-4 col-8 logo">
                    <a class="blog-header-logo text-dark" href="../index.php"><b>Progress Idea</b></a>
                </div>
            </div>
        </header>
    </div>

    <div class="container col-lg-4 col-md-5 mt-lg-5 mt-md-5">

        <div class="panel-heading panel-primary">
            <h2 class="header panel-primary">Cambio de contraseña</h2>
        </div>
        
        <!-- /.panel-body -->
        <div class="panel-body col-lg-12 pt-4 pb-5">

            <div class="col-lg-12">
                    <div>
                        <div class="form-group col-lg-12">
                            <label>Nueva Contraseña</label>
                            <input class="form-control" type="password" id="contra1" name="contra1" required=" " onkeydown="validarNuevaContra();">
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Confirmar contraseña</label>
                            <input class="form-control" type="password" id="contra2" name="contra2" required=" " onkeydown="validarNuevaContra();">
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>
                        
                        <div class="row">
	                        <div class="form-group col-lg-6 col-md-6 mt-lg-5">
                                <a class="btn-lg btn-block col-lg-12 btn-danger text-center text-white" style="border-bottom: solid #69121A 2px; border-right: solid #69121A 2px; text-decoration: none;" id="btnCancelar" href="login.html">Cancelar</a>
                            </div>

	                        <div class="form-group col-lg-6 col-md-6 mt-lg-5">
	                            <button  class="btn-lg btn-block col-lg-12 btn-success" id="btnAcpetar" onclick="enviar()">Aceptar</button>
	                        </div>
                        </div>


                    </div>
                    <!-- /.row -->
                    <div id="mensaje">

                    </div>
            </div>
            <!-- /.col-lg-12 -->
            <!-- /.col-lg-12 -->
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
                var contra1 = $("#contra1").val();
                var contra2 = $("#contra2").val();
                var usuario = <?php echo $consulta['idUsuario']?>;
                var valor= verificacionContraseña(contra1, contra2) 
              if(valor==true){
                    if(contra1==contra2){
                    $.ajax({
                    method: "POST",
                     url: "../Ajax/php/cambiarcontraseniaR.php",
                    data: {"usu":usuario,"contraN":contra1}
                    }).done(function( msg ) {
                        json = JSON.parse(msg);
                        console.log(json)
                        if(json.status){
                            document.getElementById("mensaje").innerHTML = `<div class="alert alert-info">${json.mensaje}</div>`;
                            setTimeout("redireccionar()", 2000);
                        }else{
                            document.getElementById("mensaje").innerHTML = `<div class="alert alert-danger">${json.mensaje}</div>`;

                        }
                      });
                      
                    }
              }else{
                    document.getElementById("mensaje").innerHTML ='';
                    document.getElementById("mensaje").innerHTML = `<div class="alert alert-danger">Debe llenar todos los campos</div>`;
              }
        }

        function verificacionContraseña(contra1, contra2){
            if(contra1==""||contra2==""||contra1==null||contra2==null
              ||contra1==" "||contra2==" "){
              return false;
            }else{
              return true;
            }
        }

        function redireccionar(){
            location.href= "login.php";
        }

       
  </script>
</body>

</html>

<?php 


}else{
        header ('location: ../tinks.html');
}
?>