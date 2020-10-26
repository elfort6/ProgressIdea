<?php 
    session_start();
if (!isset($_SESSION["sesion"])) {
    header("location: ../index.html");
}else if(($nivel = $_SESSION["sesion"]["nivel"])!=1){
    if($nivel == 2){
        header("location: ../index.html");
    }else if($nivel == 3){
        header("location: ../index.html");
    }
}
 ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Nuevo Proyecto</title>

        <!-- Bootstrap Core CSS -->
        <link href="../librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/emp_index.css">

    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="../Index.html">Progress Idea</a>
            </div>
            
            <div class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user"></i><span class="pl-5"><?php echo $_SESSION["sesion"]["usuario"] ?></span><b class="caret"></b>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="index.php">Perfil</a>
                    <a class="dropdown-item" href="#">Estadisticas</a>
                    <a class="dropdown-item" href="#">Configuracion</a>
                    <a class="dropdown-item" href="../Ajax/php/cerrarsesion.php">Cerrar Sesion</a>
                </div>
            </div>

        </nav>

        <div class="titulo p-3 col-12">
            <p class=""><B>NUEVO PROYECTO</B> <a class="btn btn-danger bt-n_proyect" href="index.php">CANCELAR</a></p>
        </div>
        <!-- /.col-lg-12 -->
  
        
        <div class="container col-lg-6 col-md-7">
            <div class="card tarjeta">
                <div class="card-header bg-info text-center" >
                    <b>CREA TU NUEVO PROYECTO</b>
                </div>
                <div class="card-body">

                    <form class="col-lg-12 col-12 needs-validation" id="form" novalidate>
                        <div class="form-group">
                            <label>* Nombre del Proyecto</label>
                            <input class="form-control" placeholder="Nombre del proyecto" id="nombre" name="nombre" required>
                             <!--<p class="help-block">Example block-level help text here.</p>-->
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>
                        <div class="form-group">
                            <label>* Categoria</label>
                            <select class="form-control" name="categoria" id="categoria" required>
                                
                            </select>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>
                        <div class="form-group">
                            <label>* Breve Descripcion</label>
                            <textarea type="text" name="descripcion" id="descripcion" class="form-control" rows="5" required></textarea>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>
                        
                        <div class="form-group col-lg-12 col-12">
                            <label>Agregar Imagen</label>
                            <input class="form-control-file" type="file" id="imagen" name="imagen" multiple>
                        </div>
                    </form>
                        <span id="msg"></span>
                        <button class="btn btn-primary bt-n_proyect" type="submit" name="Guardar" onclick="enviar();">Guardar Cambios</button>
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
        <script type="text/javascript">
            (function(){
                $.post('../Ajax/php/obtenerCategoria.php',{},function(data){
                    $("#categoria").html(data);
                });
            })();


            function enviar(){
                var valor = validar();
                var objeto = serializar();
                if(valor){
                        $.ajax({
		                  method: "POST",
		                  url: "../Ajax/php/RegistrarProyecto.php", 
		                  data: objeto
		                }).done(function( data ) {
                            console.log(data);
		                    json = JSON.parse(data);
                            if(json.status){
                                document.getElementById("msg").innerHTML = `<div class="alert alert-primary" id="div-msg">Proyecto registrado con exito</div>`;
                                enviarImg();
                            }else{
                                document.getElementById("msg").innerHTML = `<div class="alert alert-danger" id="div-msg">Error al registrar su proyecto</div>`;
                            }
		                  });
                }

            }

            function enviarImg(){
                const imagen = document.querySelector("#imagen");
                longitud = imagen.files.length;
                if (longitud > 0) {
                    for(i=0;i<longitud;i++){
                        let formData = new FormData();
                        formData.append("archivo", imagen.files[i]); // En la posición 0; es decir, el primer elemento
                        fetch("../Ajax/php/guardarMultimedia.php", {
                            method: 'POST',
                            body: formData,
                        })
                            .then(respuesta => respuesta.text())
                            .then(decodificado => {
                                console.log(decodificado);
                                json = JSON.parse(decodificado);
                                if(json.status){
                                    document.getElementById("div-msg").innerHTML += "-multimedia agregada";
                                }else{
                                    document.getElementById("div-msg").innerHTML += `<div class="alert alert-danger" id="div-msg">Error al subir imagen</div>`;
                                }
                            });    
                    }
                    
                    
                    
                } else {
                    // El usuario no ha seleccionado archivos
                    document.getElementById("div-msg").innerHTML = `<div class="alert alert-danger">Puede editar su proyecto despues para agregar una imagen</div>`;
                }
                
            }
        </script>

    </body>
</html>
