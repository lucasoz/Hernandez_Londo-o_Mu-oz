<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Consulta 2</title>
</head>
<body>
<h1>Asistentes que atienden al menos un asistente y ninguno de los que atiende atiende a otro</h1>
	<?php 

		require('conexion.php');
		header('Content-Type: text/html; charset=UTF-8');
		
		$query = "
SELECT * 
FROM asesor AS x
WHERE 0<(SELECT count(*)
		FROM asesor AS y 
		WHERE x.codigo = y.cliente_asesor
		AND
		0=(SELECT count(*)
			FROM asesor AS z
			WHERE y.codigo = z.cliente_asesor)
		)
";
	 	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
		//var_dump($result);exit();
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
			}
	 	}else{
	 		echo "Ha ocurrido un error en la consulta";
	 	}

	?>
	


</body>
</html>