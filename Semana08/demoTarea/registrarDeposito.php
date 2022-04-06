<?php
include_once("servicios.php");


$cuenta = "";
$importe = 0.0;
$empleado = "0004"; // En realidad, debio iniciar sesión
$mensaje = "";
$clase = "";

if (isset($_POST["btnProcesar"])) {
	// Datos
	$cuenta = $_POST["cuenta"];
	$importe = $_POST["importe"];
	// Proceso
	$estado = registarDeposito($cuenta, $importe, $empleado);
	$mensaje = ($estado == 1) ? "Proceso ejecutado correctamente" : "Datos incorrectos";
	$clase = ($estado == 1) ? "alert-success" : "alert-danger";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="bootstrap.min.css" />
	<link rel="stylesheet" href="index.css" />
	<title>DEMO DE TRABAJO</title>
</head>

<body>

	<?php include_once("menu.php"); ?>


	<div class="container">
		<h1>REGISTRAR DEPOSITO</h1>

		<form method="post" action="registrarDeposito.php">

			<div class="form-group row">
				<label for="cuenta" class="col-sm-2 col-form-label">Cuenta:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="cuenta" name="cuenta" placeholder="Nro. de cuenta">
				</div>
			</div>
			<div class="form-group row">
				<label for="importe" class="col-sm-2 col-form-label">Importe:</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="importe" name="importe" placeholder="Importe">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-10 offset-sm-2">
					<button type="submit" class="btn btn-primary" name="btnProcesar">Procesar</button>
				</div>
			</div>

		</form>

		<?php if (isset($_POST["btnProcesar"])) { ?>
		<div class="card">
			<div class="card-header">
				Resultado de la consulta
			</div>
			<div class="card-body">
				<div class="alert <?= $clase ?>">
					<?= $mensaje ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>

	<script src="jquery-3.6.0.min.js"></script>
	<script src="popper.min.js"></script>
	<script src="bootstrap.min.js"></script>
</body>

</html>