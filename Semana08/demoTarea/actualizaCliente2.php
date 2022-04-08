<?php
include_once("servicios.php");

$codigo = $_POST["codigo"];
$paterno = $_POST["paterno"];
$materno = $_POST["materno"];
$nombre = $_POST["nombre"];

$estado = actualizaDatosCliente($codigo, $paterno, $materno, $nombre);

$mensaje = ($estado == 1) ? "Proceso ejecutado correctamente" : "Error en el proceso, intentelo nuevamente.";
$clase = ($estado == 1) ? "alert-success" : "alert-danger";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="bootstrap.min.css" />
	<title>DEMO DE TRABAJO</title>
</head>

<body>

	<?php include_once("menu.php"); ?>

	<div class="container">
		<div class="card">
			<div class="card-header">
				Resultado del proceso
			</div>
			<div class="card-body">
				<div class="alert <?= $clase ?>">
					<?= $mensaje ?>
				</div>
			</div>
		</div>
	</div>

	<script src="jquery-3.6.0.min.js"></script>
	<script src="popper.min.js"></script>
	<script src="bootstrap.min.js"></script>
</body>

</html>