<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Registrar Asesor</title>
	</head>
	<h3>Registro de Asesores</h3>
	<body>

		<form action="insertarAsesor.php" method="GET" accept-charset="UTF-8">
			En este formulario se registran los asesores de la compañia,<br><br>
			además se puede registrar un asesor que desea hacer un viaje como si fuese un cliente.<br><br>

			Código: 	<input type="number" name="codigo"><br><br>
			Cédula: 	<input type="number" name="cedula"><br><br>
			Nombre: 	<input type="text" name="nombre"><br><br>
			Salario:	<input type="number" name="salario"><br><br>
			Dirección:	<input type="text" name="direccion"><br><br>
			Fecha de nacimiento:	<input type="date" name="fecha_de_nacimiento"><br><br>
			

			<?php
				include 'conexion.php';
				$query = 'SELECT codigo,nombre FROM ASESOR';
				$result = $conexion->query($query);
			?>
			Asesor que atiende:		
			<select name="cliente_asesor">
				<option value="">Ninguno</option>
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
