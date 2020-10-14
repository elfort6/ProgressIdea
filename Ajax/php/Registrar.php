<?php
//se establece una conexion a la base de datos
include 'conexion.php';
//si se han enviado datos

    $usuario=mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contraseña=password_hash($_POST['pswd'], PASSWORD_DEFAULT);
    $idRandom = rand(0,100000);
    //$correo=mysqli_real_escape_string($conexion, $_POST['correo']);
    
    $insertTipoDeUsuario=mysqli_query($conexion, 'insert into tipodeusuario(idTipoDeUsuario, tipoUsuario) values('.$idRandom.','.$_POST['userType'].')')
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

    $insertCorreo=mysqli_query($conexion, 'insert into correo(idCorreo, correo) values('.$idRandom.',"'.$_POST['correo'].'")')
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

    $insertTelefono=mysqli_query($conexion, 'insert into telefono(idTelefono, numeroTelefono) values('.$idRandom.',"'.$_POST['telefono'].'")')
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

    $insertPersona=mysqli_query($conexion, 'INSERT INTO persona(idRegistro, primerNombrel, segundoNombre, primerApellido, segundoApellido, Correo_idCorreo, Telefono_idTelefono, numId, imagen, direccion, codigoPostal, fechaNacimiento) VALUES ("'.$idRandom.'", "'.$_POST['nombre'].'", "'.$_POST['snombre'].'", "'.$_POST['apellido'].'", "'.$_POST['sapellido'].'", "'.$idRandom.'", "'.$idRandom.'", "'.$_POST['identidad'].'", "img", "'.$_POST['direccion'].'", "'.$_POST['codPostal'].'", "2020-10-13")')
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

    $insertUsuario=mysqli_query($conexion, 'INSERT INTO `usuario` (`idUsuario`, `usuario`, `contrasenia`, `TipoDeUsuario_idTipoDeUsuario`, `Proyecto_idProyecto`, `Persona_idRegistro`) VALUES ("'.$idRandom.'", "'.$usuario.'", "'.$contraseña.'", "'.$idRandom.'", NULL, "'.$idRandom.'")')
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

    //$insertTelefono=mysqli_query($conexion, 'insert into telefono(idTelefono, numeroTelefono) values('.$idRandom.','.$_POST['telefono'].')')
    //or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));
    // ("'.$usuario.'","'.$contraseña.'","'.$contraseña.'")') or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));
    //redirección
    echo ('<script>alert("Se registró exitosamente."); </script>');
    header('location: ../../');

    

?>