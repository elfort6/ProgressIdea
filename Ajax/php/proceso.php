<?php 
	require "conexion.php";
	require "IniciarSesion.php";
	echo $_POST['usuario'];
	print $_POST["nombre"];
	print $_POST["categoria"];
	print $_POST["descripcion"];
	
	//$insertProyecto = mysqli_query($conexion, 'INSERT INTO `proyecto` (`idCategoria`, `nombreCategoria`, `descripcion`) VALUES ("'1'", 'Arte', 'Pintura.');
	//') or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));



 ?>