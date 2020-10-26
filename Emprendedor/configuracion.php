<?php 
include '../Ajax/php/ConsultasParaEditarUsuario.php';
 ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>usuario</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/emp_index.css">
        <link rel="stylesheet" href="../css/estilos.css">

    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="../Index.html">Progress Idea</a>
            </div>
            
            <div class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user"></i> Emprendedor <b class="caret"></b>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Perfil</a>
                    <a class="dropdown-item" href="#">Estadisticas</a>
                    <a class="dropdown-item" href="configuracion.php">Configuracion</a>
                    <a class="dropdown-item" href="../Ajax/php/cerrarsesion.php">Cerrar Sesion</a>
                </div>
            </div>
        </nav>
        <a class="btn btn-lg btn-info mt-3 ml-4 " href="NuevoProyecto.php">Cambiar Contraseña</a>

        <div class="container col-lg-6 col-md-8 mt-lg-5 mt-md-5">
        <!-- /.header -->
        <div class="card">
        <div class="card-header bg-info">
            <h2 class="">Editar Informacion personal</h2>
        </div>
        <!-- /.panel-body -->

        <div class="card-body col-lg-12 pt-4 pb-5">

            <div class="col-lg-12">
                <form role="form"  id="formulario" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6">
                            <label>Nombre</label>
                            <input id="pNombre" class="form-control input" name="nombre" value='<?php echo $persona['primerNombrel']?>' placeholder="" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <label>S. Nombre</label>
                            <input id="sNombre" class="form-control input" name="snombre" value='<?php echo $persona['segundoNombre']?>' placeholder="" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label>Apellido</label>
                            <input id="pApellido" class="form-control input" name="apellido" value='<?php echo $persona['primerApellido']?>' placeholder="" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <label>S. Apellido</label>
                            <input id="sApellido" class="form-control input" name="sapellido"  value='<?php echo $persona['segundoApellido']?>' placeholder="" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label>Usuario</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input" id="inputGroupPrepend">@</span>
                                </div>
                                <input class="form-control input" id="usuario" name="usuario" value='<?php echo $usu['usuario']?>' placeholder="" required>
                                <div class="valid-feedback">¡Ok válido!</div>
                                <div class="invalid-feedback">Complete el campo.</div>
                            </div>
                        </div>
                       <div class="form-group col-lg-4 col-md-5">
                            <label>No. Identidad</label>
                            <input class="form-control input" name="identidad" id="identidad" placeholder="" value='<?php echo $persona['numId']?>' type="text" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div> 
                        <div class="col-lg-8 col-md-7">
                            <div class="form-group col-lg-12">
                                <label>Correo</label>
                                <input class="form-control input" id="correo" name="correo" value='<?php echo $correos['correo']?>' placeholder="email@example.com" required>
                                <div class="valid-feedback">¡Ok válido!</div>
                                <div class="invalid-feedback">Complete el campo.</div>
                            </div>
                        </div>
                        <div class="form-group col-lg-4 col-md-5">
                            <label for="disabledSelect">Codigo Postal</label>
                            <input class="form-control input" id="codPostal" name="codPostal" type="text" placeholder="" value='<?php echo $persona['codigoPostal']?>' required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="disabledSelect">Direccion</label>
                            <input class="form-control input" id="direccion" name="direccion" type="text" placeholder="Ciudad, Colonia o Barrio..." value='<?php echo $persona['direccion']?>' required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>
                    </div>
                </form>
                <span id="msg"></span>
                    <button class="btn btn-primary bt-n_proyect" type="button" name="Guardar" onclick="enviar();">Guardar Cambios</button>
            </div>
            <!-- /.col-lg-12 -->

        </div>
        <!-- /.panel-body -->
    </div>
        </div>
        <script src="../librerias/jQuery/js/jQuery.js"></script>
        <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
        <script src="../librerias/FontAwesome/js/fontawesome.min.js"></script>
        <script type="text/javascript" src="../js/validar.js"></script>
        <script type="text/javascript">       
             function enviar(){
                var objeto = serializar();
                var valor=validar()
                 if(valor){
                            $.ajax({
                            method: "POST",
                            url: "../Ajax/php/configurarE.php", 
                            data: objeto
                            }).done(function( data ) {
                                console.log(data);
                                location.href ="index.php";
                            });

                 }
                    
                }     
                function validar(){
    $("#formulario").addClass("was-validated");
    var inputs = document.getElementsByClassName("form-control");
    for(i=0;i<inputs.length;i++){
      if(inputs[i].checkValidity()===false){
        return false;
      }
    }
    return true;
}
                function serializar(){
                        var array = $("form").serializeArray();
                        var object = {};
                        $.each(array, function(indice, llave){
                            object[llave.name]=llave.value;
                        });
                    return object;
                }       
        </script>
</body>
</html> 