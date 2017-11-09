<?php
 	
 	require('conexion.php');
	$codigo = $_GET["codigo"];
	$query = "DELETE FROM ASESOR 
	WHERE codigo = '$codigo'";
 	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

 	if($result){
 		echo "El Asesor ha sido borrado";
 	}else{
 		echo "Ha ocurrido un error al borrar el Asesor";
 	}
?>