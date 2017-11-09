<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Búsqueda 1</title>
</head>
<body>
	<?php 
		$codigo = $_GET["codigo"];
	?>
	<?php 

	recursiva($codigo);

	?>
	<?php
		function recursiva($codigo1)
		{
			include 'conexion.php';
    		$query = 'SELECT * FROM asesor WHERE cliente_asesor ='.$codigo1;
			$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
    			
		if($result){
		$ultimo_equipo_id=null;
		foreach ($result as $fila){
			if($ultimo_equipo_id != $fila['codigo']){
				$ultimo_departamento_id=$fila['codigo'];
				?>
				</table>
				<table border='1' width=\"40%\">
				<tr height='50'>
					<td>Código</td>
					<td>Cédula</td>
					<td>Nombre</td>
					<td>Salario</td>
					<td>Dirección</td>
					<td>Fecha de nacimiento</td>
					<td>Cliente asesor</td>
			<?php
			}
			?>
				<tr>
					<td><?=$fila['codigo'];?></td>
					<td><?=$fila['cedula'];?></td>
					<td><?=$fila['nombre'];?></td>
					<td><?=$fila['salario'];?></td>
					<td><?=$fila['direccion'];?></td>
					<td><?=$fila['fecha_de_nacimiento'];?></td>
					<td><?=$fila['cliente_asesor'];?></td>
				</tr>
			<?php
			recursiva($fila['codigo']);
		}
	}else{
	 		echo "Ha ocurrido un error en la busqueda";
	}
	}
		?>
	


</body>
</html>