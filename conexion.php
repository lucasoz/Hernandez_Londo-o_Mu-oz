<?php

	$host = "localhost";
	$user = "root";
	$pass = "";
	$DB = "turicol";

	$conexion = mysqli_connect($host, $user, $pass, $DB) 
	or die("Error al conectar a la DB " . mysqli_error($link));
	
?>