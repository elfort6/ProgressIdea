<?php 
	session_start();
	if (!isset($_SESSION["sesion"])) {
	    header("location: ../index.html");
	}else if(($nivel = $_SESSION["sesion"]["nivel"])!=2){
	    if($nivel == 1){
	        header("location: ../index.html");
	    }else if($nivel == 3){
	        header("location: ../index.html");
	    }
	}
 ?>