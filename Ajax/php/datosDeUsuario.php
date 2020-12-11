<?php 
	session_start();
	include 'conexion.php';

	$nombreCompleto = "";
	$proyectos = '';

	$consulta = "SELECT p.*, c.correo, t.numeroTelefono, tu.tipoUsuario FROM persona p INNER JOIN usuario u ON u.Persona_idRegistro=p.idRegistro INNER JOIN correo c ON c.idCorreo=p.Correo_idCorreo INNER JOIN telefono t ON t.idTelefono=p.Telefono_idTelefono INNER JOIN tipodeusuario tu ON tu.idTipoDeUsuario=u.TipoDeUsuario_idTipoDeUsuario WHERE u.usuario='{$_SESSION["sesion"]["usuario"]}'";

	$result = $conexion->query($consulta);

	while($fila = $result->fetch_assoc()){
		if ($fila["imagen"]!=null and file_exists("../".$fila["imagen"])) {
	        $avatar = '<img class="img-thumbnail" src="../Ajax/'.$fila["imagen"].'">';
	    }else{
	        $iniciales = substr($fila["primerNombrel"], 0,1).substr($fila["primerApellido"], 0,1);
	        $avatar = '<img class="img-thumbnail" src="../Ajax/fotoPerfiles/avatar.png">';
	    }

		$nombreCompleto = $fila["primerNombrel"].' '.$fila["segundoNombre"].' '.$fila["primerApellido"].' '.$fila["segundoApellido"];
	    $informacion = '<div class="row">
                                    <div class="col-md-6">
                                        <label><b>Usuario ID</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$_SESSION["sesion"]["usuario"].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Tipo de Usuario</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["tipoUsuario"].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Nombres</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["primerNombrel"].' '.$fila["segundoNombre"].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Apellidos</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["primerApellido"].' '.$fila["segundoApellido"].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Identidad</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["numId"].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Correo</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["correo"].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Telefono</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["numeroTelefono"].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Direccion</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["direccion"].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Codigo Postal</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["codigoPostal"].'</p>
                                    </div>
                                </div>';
	}

	$arreglo = array('informacion' => $informacion, 'nombre' => $nombreCompleto, 'avatar' => $avatar);
	echo json_encode($arreglo);
 ?>