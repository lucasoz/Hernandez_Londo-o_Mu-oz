<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Búsqueda 2</title>
	</head>
	<h3>Ingrese el código de un cliente y se debe mostrar todos los datos del asesor al que él pertenece.</h3>
	<body>

		<form action="busqueda2resultado.php" method="GET" accept-charset="UTF-8">
			
			<?php
				include 'conexion.php';
				$query = 'SELECT cedula,nombre FROM cliente';
				$result = $conexion->query($query);
			?>
			Cliente:		
			<select name="cedula">
				<?php
				while ( $row = $result->fetch_array())
				{
					?>
					<option value=" <?php echo $row["cedula"]; ?> " >
						<?php echo $row["cedula"]." ".$row["nombre"]; ?>
					</option>

					<?php
				}

				?>
			</select><br><br>
			<input type="submit" value="Enviar">
			

		</form>
	</body>
</html>
