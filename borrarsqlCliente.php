<?php
 	
 	require('conexion.php');
	$cedula = $_GET["cedula"];
	$query = "DELETE FROM CLIENTE 
	WHERE cedula = '$cedula'";
 	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

 	if($result){
 		echo "El Cliente ha sido borrado";
 	}else{
 		echo "Ha ocurrido un error al borrar el Cliente";
 	}
?>