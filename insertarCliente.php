<?php

 	require('conexion.php');
 	$cedula = $_GET["cedula"];
	$nombre = $_GET["nombre"];
	$direccion = $_GET["direccion"];
	$asesor = $_GET["asesor"];


	$query = "INSERT INTO CLIENTE VALUES('$cedula','$nombre','$direccion','$asesor')";
	
 	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

 	if($result){
 		echo "el cliente ha sido creado";
 	}else{
 		echo "Ha ocurrido un error al crear el cliente";
 	}
?>