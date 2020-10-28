<?php

session_start();
//se establece una conexion a la base de datos
include 'conexion.php';
//si se han enviado datos

    $usuario=mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contrasenia=password_hash($_POST['pswd'], PASSWORD_DEFAULT);
    $idRandom = rand(0,100000);
    //$correo=mysqli_real_escape_string($conexion, $_POST['correo']);

    $insertCorreo=mysqli_query($conexion, 'insert into correo(idCorreo, correo) values('.$idRandom.',"'.$_POST['correo'].'")')
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

    $insertTelefono=mysqli_query($conexion, 'insert into telefono(idTelefono, numeroTelefono) values('.$idRandom.',"'.$_POST['telefono'].'")')
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

    $insertPersona=mysqli_query($conexion, 'INSERT INTO persona(idRegistro, primerNombrel, segundoNombre, primerApellido, segundoApellido, Correo_idCorreo, Telefono_idTelefono, numId, imagen, direccion, codigoPostal, fechaNacimiento, pais) VALUES ("'.$idRandom.'", "'.$_POST['nombre'].'", "'.$_POST['snombre'].'", "'.$_POST['apellido'].'", "'.$_POST['sapellido'].'", "'.$idRandom.'", "'.$idRandom.'", "'.$_POST['identidad'].'", "img", "'.$_POST['direccion'].'", "'.$_POST['codPostal'].'", "2020-10-13","'.$_POST['pais'].'")')
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

    $insertUsuario=mysqli_query($conexion, 'INSERT INTO `usuario` (`idUsuario`, `usuario`, `contrasenia`, `TipoDeUsuario_idTipoDeUsuario`, `Persona_idRegistro`) VALUES ("'.$idRandom.'", "'.$usuario.'", "'.$contrasenia.'", "'.$_POST['userType'].'", "'.$idRandom.'")')
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

    if($_POST['userType']==1){
        $usr= array("nivel"=>1, "usuario"=>$usuario);
        $_SESSION['sesion']=$usr;
        $ruta = '../Emprendedor/index.php';
    }else{
        $ruta = '../../Index.html';
    }

    $resultado = array('status' => true, 'ruta' => $ruta);
    echo json_encode($resultado);

    

?>