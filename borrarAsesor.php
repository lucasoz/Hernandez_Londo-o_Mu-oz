<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar Asesor</title>
</head>
<h1>Borrado de Asesor</h1>
<body>
<h2>Seleccione el Asesor a borrar</h2>
<form action="borrarsqlAsesor.php" method="GET" accept-charset="UTF-8">
    <?php
		include 'conexion.php';
		$query = 'SELECT codigo,nombre FROM ASESOR';
		$result = $conexion->query($query);
	?>

    Asesor:		<select name="codigo">
				
				<?php
				while ( $row = $result->fetch_array())
				{
					?>
					<option value=" <?php echo $row["codigo"]; ?> " >
						<?php echo $row["codigo"]. " " . $row["nombre"]; ?>
					</option>

					<?php
				}
				?>
    <input type="submit" value="Enviar">

</form>

</body>
</html>
