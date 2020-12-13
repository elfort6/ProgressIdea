<?php 
include '../Ajax/php/SesionPatrocinador.php';

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

        <title>Editar Perfil</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/emp_index.css">
        <!--<link rel="stylesheet" href="../css/estilos.css">-->

        <!-- JQuery -->
        <script src="../librerias/jQuery/js/jQuery.js"></script>
        <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
        <script src="../librerias/FontAwesome/js/all.js"></script>
        <script type="text/javascript" src="../js/validar.js"></script>
        <script src="../librerias/ScrollReveal/js/ScrollReveal.js"></script>

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
<hr>
<div class="container bootstrap snippet mt-md-2">
    <div class="row">
      <div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <?php if($usu['imagen']!=null){ ?>
        <img src="../Ajax/<?php echo $usu['imagen']?>" class="img-thumbnail" alt="avatar" id="avatar">
    <?php }else{ ?>
        <img src="../Ajax/fotoPerfiles/avatar.png" class="img-thumbnail" alt="avatar" id="avatar">
    <?php } ?>
        <h6>Cargar una imagen nueva</h6>
        <input type="file" class="w-100" id="imagen">
        <hr>
        <span id="div-msg">
            
        </span>
        <button class="btn btn-lg btn-primary" onclick="guardarFoto();">Guardar Foto</button>
      </div><br>
          
        </div><!--/col-3-->
      <div class="col-sm-9 p-2">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item bg-info active" style="border-radius: 4px;">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Editar Datos</a>
              </li>
              <li class="nav-item bg-info" style="border-radius: 4px;">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="profile" aria-selected="false">Cambiar Contraseña</a>
              </li>
          </ul>

              
          <div class="tab-content mx-md-3">
            <div class="tab-pane active my-5 " id="home">
                  <hr>
                <form role="form"  id="form" class="row needs-validation" novalidate>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Nombre</label>
                        <input id="pNombre" class="form-control input" name="nombre" value='<?php echo $usu['primerNombrel']?>' placeholder="" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>S. Nombre</label>
                        <input id="sNombre" class="form-control input" name="snombre" value='<?php echo $usu['segundoNombre']?>' placeholder="" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback">Complete el campo.</div>
                    </div>

                    <div class="form-group col-lg-6 col-md-6">
                        <label>Apellido</label>
                        <input id="pApellido" class="form-control input" name="apellido" value='<?php echo $usu['primerApellido']?>' placeholder="" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>S. Apellido</label>
                        <input id="sApellido" class="form-control input" name="sapellido"  value='<?php echo $usu['segundoApellido']?>' placeholder="" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback">Complete el campo.</div>
                    </div>

                    <div class="form-group col-lg-6 col-md-6">
                        <label>Usuario</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text input" id="inputGroupPrepend">@</span>
                            </div>
                            <input class="form-control input" id="usuario" name="usuario" value='<?php echo $usu['usuario'];?>' placeholder="" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>
                    </div>
                   <div class="form-group col-lg-5 col-md-5">
                        <label>No. Identidad</label>
                        <input class="form-control input" name="identidad" id="identidad" placeholder="" value='<?php echo $usu['numId']?>' type="text" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback">Complete el campo.</div>
                    </div> 
                    <div class="form-group col-lg-10 col-md-10 offset-lg-1 offset-md-1">
                        <label>Correo</label>
                        <input class="form-control input" id="correo" name="correo" value='<?php echo $usu['correo']?>' placeholder="email@example.com" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback">Complete el campo.</div>
                    </div>

                    <div class="form-group col-lg-5 col-md-5">
                        <label for="disabledSelect">Telefono</label>
                        <input class="form-control input" id="telefono" name="telefono" type="text" placeholder="" value='<?php echo $usu['numeroTelefono']?>' required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback">Complete el campo.</div>
                    </div>

                    <div class="form-group col-lg-5 col-md-5 offset-lg-2 offset-md-2">
                        <label for="disabledSelect">Codigo Postal</label>
                        <input class="form-control input" id="codPostal" name="codPostal" type="text" placeholder="" value='<?php echo $usu['codigoPostal']?>' required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback">Complete el campo.</div>
                    </div>

                    <div class="form-group col-lg-12 col-md-12">
                        <label for="disabledSelect">Direccion</label>
                        <input class="form-control input" id="direccion" name="direccion" type="text" placeholder="Ciudad, Colonia o Barrio..." value='<?php echo $usu['direccion']?>' required>
                        <div class="valid-feedback">¡Ok válido!</div>
                        <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                </form>
                <span id="msg"></span>
                <button class="btn btn-primary bt-n_proyect" type="button" name="Guardar" onclick="enviar();">Guardar Cambios</button>
              
             </div><!--/tab-pane-->
              <div class="tab-pane" id="settings">
                <hr>
                <div class="col-md-8 offset-md-2">
                    <label>Ingresa tu Contraseña Actual</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="contraActual" name="contraActual" placeholder="">
                    </div>
                    <label>Ingresa tu Contraseña Nueva</label>
                    <div class="form-group">
                        <input class="form-control" type="password" id="contra1" name="contra1" placeholder="" onkeydown="validarNuevaContra();">
                    </div>
                    <label>Repetir contraseña nueva</label>
                    <div class="form-group">
                        <input class="form-control" type="password" id="contra2" name="contra2" placeholder="" onkeydown="validarNuevaContra();">
                    </div>
                    <span id="mensaje"></span>
                    <div class="row">
                        <span id="msg2"></span>
                        <div class="form-group col-lg-6 col-md-6 mt-lg-5">
                            <a class="btn-lg btn-block col-lg-12 btn-danger text-center text-white" style="border-bottom: solid #69121A 2px; border-right: solid #69121A 2px; text-decoration: none;" id="btnRegresar" href="index.php">Regresar</a>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 mt-lg-5">
                            <button type="submit" class="btn-lg btn-block col-lg-12 btn-success" id="btnAcpetar" onclick="enviar2()">Aceptar</button>
                        </div>
                    </div>

                </div>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
  </div>

  <script type="text/javascript">

        function enviar(){
                var objeto = serializar();
                var valor=validar();
                if(valor){
                    $.ajax({
                    method: "POST",
                    url: "../Ajax/php/configurarUsuario.php", 
                    data: objeto
                    }).done(function( data ) {
                        console.log(data);
                        location.href ="index.php";
                    });

                 }
                    
            } 

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

        function enviar2() {
                var contra1 = $("#contra1").val();
                var contra2 = $("#contra2").val();
                var contra=$("#contraActual").val();
                var valor= verificacionContraseña(contra, contra1, contra2) 
              if(valor==true){
                console.log(contra);
                if(contra1==contra){
                    document.getElementById("msg2").innerHTML ='';
                    document.getElementById("msg2").innerHTML = `<div class="alert alert-danger">Las contraseñas Nueva no puede ser la misma que la Contraseña anterior</div>`;
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
                            document.getElementById("msg2").innerHTML = `<div class="alert alert-info">${json.mensaje}</div>`;
                            setTimeout("redireccionar()", 2000);
                        }else{
                            document.getElementById("msg2").innerHTML = `<div class="alert alert-danger">${json.mensaje}</div>`;

                        }
                      });
                      
                    }
                }
              }else{
                    document.getElementById("msg2").innerHTML ='';
                    document.getElementById("msg2").innerHTML = `<div class="alert alert-danger">Debe llenar todos los campos</div>`;
              }
        }

        function verificacionContraseña(contra, contra1, contra2){
            if(contra1==""||contra2==""||contra==""||contra==null||contra1==null||contra2==null
              ||contra1==" "||contra2==" "||contra==" "){
              return false;
            }else{
              return true;
            }
        }

        function redireccionar(){
            location.href= "../registro_login/login.php";
        }

        function guardarFoto(){
            const imagen = document.querySelector("#imagen");
            longitud = imagen.files.length;
            if (longitud == 1) {
                let formData = new FormData();
                formData.append("archivo", imagen.files[0]); // En la posición 0; es decir, el primer elemento
                fetch("../Ajax/php/fotoPerfil.php", {
                    method: 'POST',
                    body: formData,
                })
                    .then(respuesta => respuesta.text())
                    .then(decodificado => {
                        //console.log(decodificado);
                        json = JSON.parse(decodificado);
                        console.log(json);
                        if(json.status){
                            $("#avatar").attr("src", "../Ajax/"+json.src);
                        }else{
                            document.getElementById("div-msg").innerHTML += `<div class="alert alert-danger" id="div-msg">Error al subir imagen</div>`;
                        }
                    });    
                
            } else {
                // El usuario no ha seleccionado archivos
                document.getElementById("div-msg").innerHTML = `<div class="alert alert-danger">Debe seleccionar una imagen</div>`;
            }
        }
  </script>

  <script src="../js/index.js"></script>
</body>
</html>