<?php 
session_start();
//se establece una conexion a la base de datos
include 'conexion.php';
    $Titulo = $_POST['Titulo'];
    $descripcion = $_POST['descripcion'];
    $idProyecto = $_POST['idProyecto'];
    


    $insertCorreo=mysqli_query($conexion, "INSERT INTO actualizacionesproyecto( `titulo`, `descripcion`, `Proyecto_idProyecto`)  VALUES ('{$Titulo}','{$descripcion}', '{$idProyecto}')")
    or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));

echo json_encode($_POST)

?>