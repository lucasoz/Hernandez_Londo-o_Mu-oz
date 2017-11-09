<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Búsqueda 1</title>
	</head>
	<h3>Ingrese el nombre de un asesor para mostrar los asesores que atiende directa e indirectamente</h3>
	<body>
		
		<form action="busqueda1resultado.php" method="GET" accept-charset="UTF-8">
			
			<?php
				include 'conexion.php';
				$query = 'SELECT codigo,nombre FROM asesor';
				$result = $conexion->query($query);
			?>
			Asesor:		
			<select name="codigo">
				<?php
				while ( $row = $result->fetch_array())
				{
					?>
					<option value=" <?php echo $row["codigo"]; ?> " >
						<?php echo $row["codigo"]." ".$row["nombre"]; ?>
					</option>

					<?php
				}

				?>
			</select><br><br>
			<input type="submit" value="Enviar">
			

		</form>
	</body>
</html>
