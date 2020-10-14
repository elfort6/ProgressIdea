
<!DOCTYPE html>

<html>

<head>
    <title>Cambio de contraseña</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <div class="enable">
        <header class="blog-header">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-lg-4 offset-lg-4 col-sm-4 col-8 logo">
                    <a class="blog-header-logo text-dark" href="Index.html"><b>Progress Idea</b></a>
                </div>
            </div>
        </header>
    </div>

    <div class="container col-lg-4 col-md-8 mt-lg-5 mt-md-5">

        <div class="panel-heading panel-primary">
            <h2 class="header panel-primary">Cambio de contraseña</h2>
        </div>
        
        <!-- /.panel-body -->
        <div class="panel-body col-lg-12 pt-4 pb-5">

            <div class="col-lg-12">
                <form role="form" action="Ajax/php/IniciarSesion.php" method="POST" class="needs-validation" novalidate>
                    <div>
                        <div class="form-group col-lg-12 col-md-6">
                            <label>Nueva Contraseña</label>
                            <input class="form-control" type="password" id="pswd1" name="pswd1" required=" ">
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>
                        <div class="form-group col-lg-12 col-md-6">
                            <label>Ingrese la Contraseña nuevamente</label>
                            <input class="form-control" type="password" id="pswd2" name="pswd2" required=" ">
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>
                        <div class="form-group">
                            <a href="recuperacion.html" style="color:white;">¿Has olvidado Tu contraseña?</a>
                        </div>
                        
                        <div class="row">
	                        <div class="form-group col-lg-5 col-md-5 mt-lg-5">
	                            <button type="buttom" class="btn-lg btn-block col-lg-12 btn-danger" id="btnAcpetar">Cancelar</button>
	                        </div>

	                        <div class="form-group col-lg-5 col-md-5 offset-lg-2 offset-md-2 mt-lg-5">
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- JavaScript -->
    <script src="Sources/codigo2.js"></script>
</body>

</html>

</html>


