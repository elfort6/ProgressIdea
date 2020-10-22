<?php
//se lee la cookie de sesion
session_start();
//se establece una conexión a la base de datos
include 'conexion.php';
//se validarán los campos si la sesion aún no está abierta
if (isset($_POST['usuario'])){
    //se escaparán caracteres peligrosos
    $nombre_de_usuario=mysqli_real_escape_string($conexion,$_POST['usuario']);
    $contraseña_introducida=$_POST['clave'];
    //se hará la consulta a la base de datos
    $consulta='select * from usuario where usuario="'.$nombre_de_usuario.'"';
    //si hubo un resultado
    if ($ejecución_de_la_consulta=$conexion->query($consulta)){
        //se obtiene la contraseña registrada
        $consulta_1=$ejecución_de_la_consulta->fetch_assoc();
        //se compara la contraseña
        $verificar_contraseña=password_verify($contraseña_introducida,$consulta_1['contrasenia']);
        //si el resultado de la comparación ha sido verdadero
        if ($verificar_contraseña){
            //se asigna la sesión y redirecciona
            $consulTipo='select * from TipoDeUsuario where IdTipoDeUsuario="'.$consulta_1['TipoDeUsuario_idTipoDeUsuario'].'"';
            $ejecución_de_la_consultaest=$conexion->query($consulTipo);
            $Tipo=$ejecución_de_la_consultaest->fetch_assoc();
           if($Tipo['tipoUsuario']==1){

           $_SESSION['lvl']=1;
            header ('location: ../../Emprendedor/Emprendedor.html');
           }else{
            if($Tipo['tipoUsuario']==2){
                $_SESSION['lvl']=2;
                header ('location: ../../Patrocinador/Patrocinador.html');
            }else{
                if($Tipo['tipoUsuario']==3){
                    $_SESSION['lvl']=3;
                    header ('location: ../../Admon/Administrador.html');
                }else{
                    
                }
            }
           }
           
            
        }//si la contraseña es incorrecta
        else{
           # header ('location: ./');
           echo json_encode($consulta_1);
           echo $verificar_contraseña;
           //print('contraseña mal');
        }
    }//si el usuario no está registrado
    else{
       # header ('location: ./');
       print('usuario mal');
    }
}//si hay una sesion abierta o no se enviaron datos
else{
    #header ('location: ./');
    print('Sesion abierta');
}
?>