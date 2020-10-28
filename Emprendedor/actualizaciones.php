
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Crear Actualizacion</title>

        <!-- Bootstrap Core CSS -->
        <link href="../librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/emp_index.css">

    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="../Index.html">Progress Idea</a>
                <a class="blog-header-logo text-dark" > <b>Actualizar Mi Proyecto</b> </a>

            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user"></i><span class="pl-5"><?php echo $_SESSION["sesion"]["usuario"] ?></span><b class="caret"></b>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="index.php">Perfil</a>
                    <a class="dropdown-item" href="#">Estadisticas</a>
                    <a class="dropdown-item" href="configuracion.php">Configuracion</a>
                    <a class="dropdown-item" href="../Ajax/php/cerrarsesion.php">Cerrar Sesion</a>
                </div>
            </div>

        </nav>
        <h1></h1>

        <div class="titulo p-3 col-12">
        </div>
        <div class="container col-lg-6 col-md-7">
            <div class="card tarjeta">
                <div class="card-header bg-info text-center" >
                    <b>ACTUALIZAR</b>
                </div>
                <div class="card-body">

                    <div class="col-lg-12 col-12 needs-validation" id="form" novalidate>
                        <div class="form-group">
                            <label>* Titulo</label>
                            <input class="form-control" placeholder="Titulo de la Actualizacion" id="Titulo" name="Titulo" required value="">
                             <!--<p class="help-block">Example block-level help text here.</p>-->
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>
                        <div class="form-group">
                            <label>* Descripcion</label>
                            <textarea type="text" name="descripcion" id="descripcion" class="form-control" rows="5" required ></textarea>

                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>
                        <a class="btn btn-danger bt-n_proyect" href="index.php">CANCELAR</a>
                    </div>
                    <input style="display:none;" id="id" value="<?php echo $id?>">
                    <span id="mensaje"></span>
                    <button class="btn btn-primary bt-n_proyect" type="submit" name="Guardar" onclick="publicar()">Publicar</button>

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
        <!-- jQuery -->
        <script src="../librerias/jQuery/js/jQuery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/validar.js"></script>
        <script type="text/javascript"></script>
    </body>
    <script type="text/javascript">
        
            



            function publicar(){
                var valor = validar();
                var datos = {idProyecto:document.getElementById("id").value , Titulo: document.getElementById("Titulo").value, descripcion:document.getElementById("descripcion").value};
                
                if(valor){
                        $.ajax({
		                  method: "POST",
		                  url: "../Ajax/php/CrearActualizacion.php", 
		                  data: datos
		                }).done(function( data ) {
                            console.log(data);
                             setTimeout("redireccionar()", 2000);
                            //console.log(objeto);
		                  });
                }   
            }
            function redireccionar(){
            location.href= "Index.php";
            }
    

                


                function validar(){
                    $("#form").addClass("was-validated");
                    var inputs = document.getElementsByClassName("form-control");
                    for(i=0;i<inputs.length;i++){
                        if(inputs[i].checkValidity()===false){
                            return false;
                        }
                    }
                    return true;
                }

     

                
            
            </script>
</html>