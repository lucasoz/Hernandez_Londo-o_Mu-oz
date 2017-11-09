<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar Cliente</title>
</head>
<h1>Borrado de Cliente</h1>
<body>
<h2>Seleccione el Clientes a borrar</h2>
<form action="borrarsqlCliente.php" method="GET" accept-charset="UTF-8">
    <?php
		include 'conexion.php';
		$query = 'SELECT cedula,nombre FROM CLIENTE';
		$result = $conexion->query($query);
	?>

    Asesor:		<select name="cedula">
				
				<?php
				while ( $row = $result->fetch_array())
				{
					?>
					<option value=" <?php echo $row["cedula"]; ?> " >
						<?php echo $row["cedula"]. " " . $row["nombre"]; ?>
					</option>

					<?php
				}
				?>
    <input type="submit" value="Enviar">

</form>

</body>
</html>
