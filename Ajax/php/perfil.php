<?php 
    include 'conexion.php';

    $usuario = $_POST["usuario"];

    $consulta = "SELECT primerNombrel, segundoNombre, primerApellido, segundoApellido, imagen, u.usuario, c.correo, TIMESTAMPDIFF(year, p.fechaNacimiento, NOW()) Anios, p.pais FROM persona p INNER JOIN usuario u ON u.Persona_idRegistro=p.idRegistro INNER JOIN correo c ON c.idCorreo=p.Correo_idCorreo WHERE u.usuario='".$usuario."' LIMIT 1";

    $result = $conexion->query($consulta);

    $fila = $result->fetch_assoc();

    if ($fila["imagen"]!=null and file_exists("../".$fila["imagen"])) {
        $avatar = '<img class="avatar" src="Ajax/'.$fila["imagen"].'">';
    }else{
        $iniciales = substr($fila["primerNombrel"], 0,1).substr($fila["primerApellido"], 0,1);
        $avatar = '<span><b>'.$iniciales.'</b></span>';
    }

    $info = '<div class="my-3 mx-3 avatar">'.$avatar.'</div>
            <div class="my-auto">
                    <p id="user" class="text-dark p-0"><b>'.$fila["primerNombrel"].' '.$fila["segundoNombre"].' '.$fila["primerApellido"].' '.$fila["segundoApellido"].'</b></p>
                <div class="form-inline">
                    <p class="text-dark"><b>Edad: '.$fila["Anios"].' Años</b></p>
                    <p class="text-dark ml-5"><b>Pais: '.$fila["pais"].'</b></p>
                </div>
                <p id="correo" class=""><a href="#">'.$fila["correo"].'</a></p>
            </div>';

    echo $info;
 ?>