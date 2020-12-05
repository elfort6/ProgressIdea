<?php 
session_start();
if (!isset($_SESSION["sesion"])) {
    header("location: ../index.php");
}else if(($nivel = $_SESSION["sesion"]["nivel"])!=3){
    if($nivel == 2){
        header("location: ../Index.php");
    }else if($nivel == 1){
        header("location: ../Index.php");
    }
}
 ?>