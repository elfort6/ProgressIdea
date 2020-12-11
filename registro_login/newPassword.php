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

    <div class="container col-lg-4 col-md-5 mt-lg-5 mt-md-5">

        <div class="panel-heading panel-primary">
            <h2 class="header panel-primary">Cambio de contraseña</h2>
        </div>
        
        <!-- /.panel-body -->
        <div class="panel-body col-lg-12 pt-4 pb-5">

            <div class="col-lg-12">
                <form role="form" action="Ajax/php/IniciarSesion.php" method="POST" class="needs-validation" novalidate>
                    <div>
                        <div class="form-group col-lg-12">
                            <label>Nueva Contraseña</label>
                            <input class="form-control" type="password" id="pswd1" name="pswd1" required=" ">
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Confirmar contraseña</label>
                            <input class="form-control" type="password" id="pswd2" name="pswd2" required=" ">
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>
                        
                        <div class="row">
	                        <div class="form-group col-lg-6 col-md-6 mt-lg-5">
                                <a class="btn-lg btn-block col-lg-12 btn-danger text-center text-white" style="border-bottom: solid #69121A 2px; border-right: solid #69121A 2px; text-decoration: none;" id="btnCancelar" href="login.html">Cancelar</a>
                            </div>

	                        <div class="form-group col-lg-6 col-md-6 mt-lg-5">
	                            <button type="submit" class="btn-lg btn-block col-lg-12 btn-success" id="btnAcpetar">Aceptar</button>
	                        </div>
                        </div>


                    </div>
                    <!-- /.row -->

                </form>

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
    <script src="../js/codigo2.js"></script>
</body>

</html>

<?php 


}else{
        header ('location: ../tinks.html');
}
?>