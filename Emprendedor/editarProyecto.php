<?php
    include '../Ajax/php/SesionEmprendedor.php';
    require "../Ajax/php/conexion.php";
    $id= $_GET["id"];
    $consulta='SELECT * FROM proyecto WHERE idProyecto="'.$id.'"';
    $result = $conexion->query($consulta);
    $proyecto = $result->fetch_assoc();
?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Editar Proyecto</title>

        <!-- Bootstrap Core CSS -->
        <link href="../librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/emp_index.css">
        <!-- jQuery -->
        <script src="../librerias/jQuery/js/jQuery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/validar.js"></script>
        <script src="../librerias/FontAwesome/js/all.js"></script>


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
                        <a class="dropdown-item" href="../Ajax/php/cerrarsesion.php">Cerrar Sesion</a>
                    </div>
                </div>
            </div>

        </nav>
        <h1></h1>

        <div class="titulo p-3 col-12">
        </div>
        <div class="container col-lg-6 col-md-7">
            <div class="card tarjeta">
                <div class="card-header bg-info text-center" >
                    <b>EDITAR MI PROYECTO</b>
                </div>
                <div class="card-body">

                    <div class="col-lg-12 col-12 needs-validation" id="form" novalidate>
                        <div class="form-group">
                            <label>* Nombre del Proyecto</label>
                            <input class="form-control" placeholder="Nombre del proyecto" id="nombrePro" name="nombrePro" required value="<?php echo $proyecto ['nombreproyecto']?>">
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
                            <textarea type="text" name="descripcion" id="descripcion" class="form-control" rows="5" required ><?php echo $proyecto ['descripcion']?></textarea>

                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>
                        <a class="btn btn-danger bt-n_proyect" href="index.php">CANCELAR</a>
                    </div>
                    <input style="display:none;" id="id" value="<?php echo $id?>">
                    <span id="mensaje"></span>
                    <button class="btn btn-primary bt-n_proyect" type="submit" name="Guardar" onclick="actualizar()">Actualizar</button>

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
        
        <script type="text/javascript"></script>
    </body>
    <script type="text/javascript">
            (function(){
                $.post('../Ajax/php/obtenerCategoria.php',{},function(data){
                    $("#categoria").html(data);
                });

                setTimeout("select()", 200);
                
            })();

            function select(){
                $("#categoria option[value="+<?php echo $proyecto["Categoria_idCategoria"]?>+"]").attr("selected",true); 
            }
            
            function actualizar(){
                var valor = validar();
                var objeto = serializar();      
                var datos = {idProyecto:document.getElementById("id").value ,categoria: document.getElementById("categoria").value, nombre: document.getElementById("nombrePro").value, descripcion:document.getElementById("descripcion").value};
                console.log(datos);
                if(valor){
                        $.ajax({
		                  method: "POST",
		                  url: "../Ajax/php/actualizarProyecto.php", 
		                  data: datos
		                }).done(function( data ) {
                            document.getElementById("mensaje").innerHTML = `${data}`;
                             setTimeout("redireccionar()", 2000);
                            //console.log(objeto);
		                  });
                }   
            }

            function redireccionar(){
            location.href= "Index.php";
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
</html>