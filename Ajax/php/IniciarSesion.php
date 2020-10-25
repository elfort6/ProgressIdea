<?php
//se lee la cookie de sesion
session_start();
//se establece una conexión a la base de datos
include 'conexion.php';
//se validarán los campos si la sesion aún no está abierta
if (!isset($_SESSION['sesion'])){
    //se escaparán caracteres peligrosos
    $nombre_de_usuario=mysqli_real_escape_string($conexion,$_POST['usuario']);
    $contraseña_introducida=$_POST['clave'];
    //se hará la consulta a la base de datos
    $consulta1 = 'select count(*) total from usuario where usuario="'.$nombre_de_usuario.'"';
  $result = $conexion->query($consulta1);
  $fila = $result->fetch_assoc();
  if($fila['total']==0){//si el usuario no está registrado
    $json = array("status"=>false, "mensaje"=>"El usuario no existe");
    echo json_encode($json);
  }else{

      $consulta='select * from usuario where usuario="'.$nombre_de_usuario.'"';
      //si hubo un resultado
      if ($ejecución_de_la_consulta=$conexion->query($consulta)){
          //se obtiene la contraseña registrada
          $consulta_1=$ejecución_de_la_consulta->fetch_assoc();
          //se compara la contraseña
          //$verificar_contraseña=password_verify($contraseña_introducida,$consulta_1['contrasenia']);
          //si el resultado de la comparación ha sido verdadero
          if (password_verify($contraseña_introducida,$consulta_1['contrasenia'])){
              //se asigna la sesión y redirecciona
              $consulTipo='select * from TipoDeUsuario where IdTipoDeUsuario="'.$consulta_1['TipoDeUsuario_idTipoDeUsuario'].'"';
              $ejecución_de_la_consultaest=$conexion->query($consulTipo);
              $Tipo=$ejecución_de_la_consultaest->fetch_assoc();

             if($Tipo['idTipoDeUsuario']==1){
              $usr= array("nivel"=>1, "usuario"=>$nombre_de_usuario);
              $_SESSION['sesion']=$usr;
              $json = array("status"=>true, "url"=>"../Emprendedor/index.php");
              echo json_encode($json);

             }else{
              if($Tipo['idTipoDeUsuario']==2){
                  $usr= array("nivel"=>2, "usuario"=>$nombre_de_usuario);
                $_SESSION['sesion']=$usr;
                $json = array("status"=>true, "url"=>"../Patrocinador/index.php");
                echo json_encode($json);
              }else{
                  if($Tipo['idTipoDeUsuario']==3){
                      $usr= array("nivel"=>3, "usuario"=>$nombre_de_usuario);
                  $_SESSION['sesion']=$usr;
                  $json = array("status"=>true, "url"=>"../Administrador/index.php");
                  echo json_encode($json);
                  }else{
                      
                  }
              }
             }
             
              
          }//si la contraseña es incorrecta
          else{
            $json = array("status"=>false, "mensaje"=>"contrasenia incorrecta");
          echo json_encode($json);
          }
      }
  }
}//si hay una sesion abierta o no se enviaron datos
else{
  $json = array("status"=>true, "url"=>"../index.html");
  echo json_encode($json);
}
?>