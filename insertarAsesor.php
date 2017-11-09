<?php

 	require('conexion.php');
	$codigo = $_GET["codigo"];
 	$cedula = $_GET["cedula"];
	$nombre = $_GET["nombre"];
	$salario = $_GET["salario"];
	$direccion = $_GET["direccion"];
	$fecha_de_nacimiento = $_GET["fecha_de_nacimiento"];
	$cliente_asesor = $_GET["cliente_asesor"];



	if($cliente_asesor===""){
		$query = "INSERT INTO ASESOR VALUES('$codigo','$cedula','$nombre','$salario','$direccion','$fecha_de_nacimiento',NULL)";
	}else{
		$query = "INSERT INTO ASESOR VALUES('$codigo','$cedula','$nombre','$salario','$direccion','$fecha_de_nacimiento','$cliente_asesor')";
	}
	
 	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

 	if($result){
 		echo "el asesor ha sido creado";
 	}else{
 		echo "Ha ocurrido un error al crear el asesor";
 	}
?>