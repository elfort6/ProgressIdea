<?php
require '../Ajax/php/conexion.php';
session_start();
    $consulta = "SELECT* FROM usuario where usuario='" . $_SESSION["sesion"]["usuario"] . "'";
    $result = $conexion->query($consulta);
    $usu = $result->fetch_assoc();
    $usuaroAct = $usu["idUsuario"];
    $fechaActual = date("Y-m-d");  
    $idTrans = $_GET["idt"];
    $insertAporte = "INSERT INTO aportepatrocinador VALUES (NULL,'{$id}', '{$usuaroAct}', '{$monto}', '{$idTrans}', '{$fechaActual}')";
    $resulte = mysqli_query($conexion,$insertAporte) or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));
    header("location: gracias.html");
?>