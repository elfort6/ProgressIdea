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
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sign Up</title>
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
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="text-muted" href="#" aria-label="Search">
                    </a>
                    <a class="btn btn-sm btn-outline-secondary text-white" href="login.php">Iniciar Sesión</a>
                </div>
            </div>
        </header>
    </div>


    <div class="container col-lg-6 col-md-8 mt-lg-5 mt-md-5">
        <!-- /.header -->
        <div class="panel-heading panel-primary">
            <h2 class="header panel-primary">Registrate en Progress Idea</h2>
        </div>
        <!-- /.panel-body -->
        <div class="panel-body col-lg-12 pt-4 pb-5">

            <div class="col-lg-12">
                    <div class="row" id="form">
                        <div class="form-group col-lg-6 col-md-6">
                            <label>Nombre</label>
                            <input id="nombre" class="form-control input" name="nombre" placeholder="" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <label>S. Nombre</label>
                            <input id="snombre" class="form-control input" name="snombre" placeholder="" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label>Apellido</label>
                            <input id="apellido" class="form-control input" name="apellido" placeholder="" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <label>S. Apellido</label>
                            <input id="sapellido" class="form-control input" name="sapellido" placeholder="" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label>Usuario</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input" id="inputGroupPrepend">@</span>
                                </div>
                                <input class="form-control input" id="usuario" name="usuario" placeholder="" required>
                                <div class="valid-feedback">¡Ok válido!</div>
                                <div class="invalid-feedback">No Valido.</div>
                            </div>
                        </div>


                        <div class="form-group col-lg-6 col-md-6">
                            <label>Contraseña</label>
                            <input class="form-control input" id="pswd" name="pswd" placeholder="" type="password" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>

                        <div class="col-lg-8 col-md-7">
                            <div class="form-group col-lg-12">
                                <label>Correo</label>
                                <input class="form-control input" type="email" id="correo" name="correo" placeholder="email@example.com" required>
                                <div class="valid-feedback">¡Ok válido!</div>
                                <div class="invalid-feedback">No Valido.</div>
                            </div>
                        </div>

                        <div class="form-group col-lg-4 col-md-5">
                            <label>No. Identidad</label>
                            <input class="form-control input" name="identidad" id="identidad" placeholder="" type="text" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label for="disabledSelect">País</label>
                            <select id="pais" name="pais" class="form-control" onchange="codeTel()">

                                    </select>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label for="disabledSelect">Codigo Postal</label>
                            <input class="form-control input" id="codPostal" name="codPostal" type="text" placeholder="" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label>Telefono</label>
                            <input class="form-control input" id="telefono" name="telefono" placeholder="" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>

                        <div class="form-group col-lg-6 col-md-6">
                            <label for="userType">Tipo de Usuario</label>
                            <select id="userType" name="userType" class="form-control">
                                        <option value="1">Emprendedor</option>
                                        <option value="2">Patrocinador</option>
                                    </select>
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="disabledSelect">Direccion</label>
                            <input class="form-control input" id="direccion" name="direccion" type="text" placeholder="Ciudad, Colonia o Barrio..." required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">No Valido.</div>
                        </div>
                        <div class="form-group col-lg-4 col-md-4 offset-lg-4 offset-md-4 mt-lg-5">
                            <button class="btn-lg btn-block col-lg-12 btn-success" id="btnAcpetar" onclick="enviar();">Aceptar</button>
                        </div>


                    </div>
                    <!-- /.row -->

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
    <script src="../js/validar.js"></script>
    <script type="text/javascript">
        (function(){
            $.post("../Ajax/php/json.php", {},function(data){
                document.getElementById("pais").innerHTML=data;
                codeTel();
                
              });
        })();

        function enviar(){
            var valor = validar();
            if(valor){
                var nombre=$("#nombre").val(),      snombre=$("#snombre").val(), 
                    apellido=$("#apellido").val(),  sapellido=$("#sapellido").val(), 
                    usuario=$("#usuario").val(),    pswd=$("#pswd").val(), 
                    correo=$("#correo").val(),      identidad=$("#identidad").val(), 
                    pais=$("#pais option:selected").text(), codPostal=$("#codPostal").val(), 
                    telefono=$("#telefono").val(),  direccion=$("#direccion").val(), 
                    userType=$("#userType").val();
                $.ajax({
                  method: "POST",
                  url: "../Ajax/php/Registrar.php",
                  data: {"nombre":nombre ,"snombre":snombre ,"apellido":apellido ,"sapellido":sapellido,
                        "usuario":usuario ,"pswd":pswd ,"correo":correo ,"identidad":identidad ,"pais":pais,
                        "codPostal":codPostal ,"telefono":telefono ,"direccion":direccion ,"userType":userType}
                }).done(function( msg ) {
                    alert( msg );
                  });
            }

        }
    </script>

</body>

</html>