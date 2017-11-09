<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Registrar Cliente</title>
	</head>
	<h3>Registro de Clientes</h3>
	<body>

		<form action="insertarCliente.php" method="GET" accept-charset="UTF-8">
			En este formulario se registran los Clientes de la compañia,<br><br>
			y se debe seleccionar obligaroriamente el asesor por el que es atendido.<br><br>

			Cédula: 	<input type="number" name="cedula"><br><br>
			Nombre: 	<input type="text" name="nombre"><br><br>
			Dirección:	<input type="text" name="direccion"><br><br>
				

			<?php
				include 'conexion.php';
				$query = 'SELECT codigo,nombre FROM ASESOR';
				$result = $conexion->query($query);
			?>
			Asesor que atiende:		
			<select name="asesor">
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
