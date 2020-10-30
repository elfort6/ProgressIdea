<?php

session_start();
include 'conexion.php';

    $usuario=mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contrasenia=password_hash($_POST['pswd'], PASSWORD_DEFAULT);
    $idRandom = rand(0,100000);
    
    $consulta = "SELECT COUNT(*) total FROM usuario u INNER JOIN persona p ON p.idRegistro=u.Persona_idRegistro WHERE u.usuario='".$usuario."' OR p.numId=".$_POST['identidad'];

    $result = $conexion->query($consulta);
    $fila = $result->fetch_assoc();

if($fila['total']!=0){//si el usuario o el numID ya está registrado

    $consulta1 = "SELECT COUNT(*) total FROM usuario u WHERE u.usuario='".$usuario."'";
    $result2 = $conexion->query($consulta1);
    $fila2 = $result2->fetch_assoc();

    if($fila2['total']!=0){//si el usuario ya está registrado
        $status = false; 
        $mensaje = "El usuario {$usuario} ya existe";
        $error = 1;
        $ruta = "registrar.php";
    }else{
        $status = false; 
        $mensaje = "El numero de ID {$_POST['identidad']} ya existe";
        $error = 2;
        $ruta = "registrar.php";
    }
}else{

    $insertCorreo=mysqli_query($conexion, 'insert into correo(idCorreo, correo) values('.$idRandom.',"'.$_POST['correo'].'")')
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

    $insertTelefono=mysqli_query($conexion, 'insert into telefono(idTelefono, numeroTelefono) values('.$idRandom.',"'.$_POST['telefono'].'")')
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

    $insertPersona=mysqli_query($conexion, 'INSERT INTO persona(idRegistro, primerNombrel, segundoNombre, primerApellido, segundoApellido, Correo_idCorreo, Telefono_idTelefono, numId, imagen, direccion, codigoPostal, fechaNacimiento, pais) VALUES ("'.$idRandom.'", "'.$_POST['nombre'].'", "'.$_POST['snombre'].'", "'.$_POST['apellido'].'", "'.$_POST['sapellido'].'", "'.$idRandom.'", "'.$idRandom.'", "'.$_POST['identidad'].'", "img", "'.$_POST['direccion'].'", "'.$_POST['codPostal'].'", "2020-10-13","'.$_POST['pais'].'")')
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

    $insertUsuario=mysqli_query($conexion, 'INSERT INTO `usuario` (`idUsuario`, `usuario`, `contrasenia`, `TipoDeUsuario_idTipoDeUsuario`, `Persona_idRegistro`) VALUES ("'.$idRandom.'", "'.$usuario.'", "'.$contrasenia.'", "'.$_POST['userType'].'", "'.$idRandom.'")')
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

    switch ($_POST['userType']) {
        case 1:
            # code...
            $usr= array("nivel"=>1, "usuario"=>$usuario);
            $_SESSION['sesion']=$usr;
            $ruta = '../Emprendedor/index.php';
            $status = true;
            $error = 0;
            $mensaje = "";
            break;
        case 2:
            # code...
            $usr= array("nivel"=>1, "usuario"=>$usuario);
            $_SESSION['sesion']=$usr;
            $ruta = '../Patrocinador/index.php';
            $status = true;
            $error = 0;
            $mensaje = ""; 
            break;
        case 3:
            # code...
            $usr= array("nivel"=>1, "usuario"=>$usuario);
            $_SESSION['sesion']=$usr;
            $ruta = '../Moderador/index.php';
            $status = true;
            $error = 0;
            $mensaje = ""; 
            break;
        case 4:
            # code...
            $usr= array("nivel"=>1, "usuario"=>$usuario);
            $_SESSION['sesion']=$usr;
            $ruta = '../Administrador/index.php';
            $status = true;
            $error = 0;
            $mensaje = "";
            break;
        
        default:
            # code...
            $mensaje = 'Error de tipo de usuario';
            $status = false;
            $error = 0;
            $ruta = "registrar.php";
            break;
    }

}

    $resultado = array('status' => $status, 'error' => $error, 'ruta' => $ruta, 'mensaje' => $mensaje);
    echo json_encode($resultado);
    

?>