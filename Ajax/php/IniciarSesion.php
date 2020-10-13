<?php
//se lee la cookie de sesion
session_start();
//se establece una conexión a la base de datos
include 'conexion.php';
//se validarán los campos si la sesion aún no está abierta
if (empty($_SESSION) and isset($_POST['datos_introducidos_usuario'])){
    //se escaparán caracteres peligrosos
    $nombre_de_usuario=mysqli_real_escape_string($conexion,$_POST['datos_introducidos_usuario']);
    $contraseña_introducida=$_POST['datos_introducidos_contraseña'];
    //se hará la consulta a la base de datos
    $consulta='select * from usuarios where cuenta="'.$nombre_de_usuario.'"';
    //si hubo un resultado
    if ($ejecución_de_la_consulta=$conexion->query($consulta)){
        //se obtiene la contraseña registrada
        $contraseña_guardada=$ejecución_de_la_consulta->fetch_assoc();
        //se compara la contraseña
        $verificar_contraseña=password_verify($contraseña_introducida,$contraseña_guardada['clave']);
        //si el resultado de la comparación ha sido verdadero
        if ($verificar_contraseña){
            //se asigna la sesión y redirecciona
            
            //print('nombre: '.$datos['primer_nombre'].' '.$datos['segundo_nombre'].' '.$datos['primer_apellido'].' '.$datos['segundo_apellido']);
           if($contraseña_guardada['nivel']==1){
            $consultaest='select * from estudiantes where cuenta="'.$nombre_de_usuario.'"';
            $ejecución_de_la_consultaest=$conexion->query($consultaest);
            $datos=$ejecución_de_la_consultaest->fetch_assoc();
            $info = $datos['primer_nombre'].' '.$datos['segundo_nombre'].' '.$datos['primer_apellido'].' '.$datos['segundo_apellido'];
            $_SESSION['name']=$info;
            $_SESSION['cuenta']=$nombre_de_usuario;
            $_SESSION['carrera']=$datos['carrera'];
            header ('location: ../estudiantes/');
            $_SESSION['lvl']=1;
           }else{
            if($contraseña_guardada['nivel']==2){

                $consultaest='select * from docentes where n_empleado="'.$nombre_de_usuario.'"';
            $ejecución_de_la_consultadoce=$conexion->query($consultaest);
            $datosdoce=$ejecución_de_la_consultadoce->fetch_assoc();
            $info = $datosdoce['primer-nombre'].' '.$datosdoce['segundo-nombre'].' '.$datosdoce['primer-apellido'].' '.$datosdoce['segundo-apellido'];
            $_SESSION['name']=$info;
            $_SESSION['cuenta']=$nombre_de_usuario;
            $_SESSION['carrera']=$datosdoce['facultad'];
                header ('location: ../docentes/');
                $_SESSION['lvl']=2;
            }else{
                if($contraseña_guardada['nivel']==3){

                    $consultaest='select * from docentes where n_empleado="'.$nombre_de_usuario.'"';
                $ejecución_de_la_consultadoce=$conexion->query($consultaest);
                $datosdoce=$ejecución_de_la_consultadoce->fetch_assoc();
                $info = $datosdoce['primer-nombre'].' '.$datosdoce['segundo-nombre'].' '.$datosdoce['primer-apellido'].' '.$datosdoce['segundo-apellido'];
                $_SESSION['name']=$info;
                $_SESSION['cuenta']=$nombre_de_usuario;
                $_SESSION['carrera']=$datosdoce['facultad'];
                header ('location: ../docentes/');
                    $_SESSION['lvl']=3;
                }else{
                    if($contraseña_guardada['nivel']==4){
                        header ('location: ../registro/');
                        $_SESSION['lvl']=4;
                    }else{
                        
                    }
                }
            }
           }
           
            
        }//si la contraseña es incorrecta
        else{
           # header ('location: ./');
           print('contraseña mal');
        }
    }//si el usuario no está registrado
    else{
       # header ('location: ./');
       print('usuario mal');
    }
}//si hay una sesion abierta o no se enviaron datos
else{
    #header ('location: ./');
    print('abierta mal');
}
?>