<?php
include_once("servicios.php");

$paterno = "";
$materno = "";
$nombre = "";

if (isset($_POST["btnProcesar"])) {
	// Datos
	$paterno = $_POST["paterno"];
	$materno = $_POST["materno"];
	$nombre = $_POST["nombre"];
	// Proceso
	$tabla = getClientes($paterno, $materno, $nombre);
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
		<h1>CONSULTA DE CLIENTES</h1>

		<form class="form-inline" method="post" action="consultaClientes.php">

			<label class="sr-only" for="paterno">Paterno</label>
			<input type="text" class="form-control mb-2 mr-sm-2" id="paterno" name="paterno" placeholder="Apellido paterno"
				value="<?= $paterno ?>">

			<label class="sr-only" for="materno">Materno</label>
			<input type="text" class="form-control mb-2 mr-sm-2" id="materno" name="materno" placeholder="Apellido materno"
				value="<?= $materno ?>">

			<label class="sr-only" for="nombre">Nombre</label>
			<input type="text" class="form-control mb-2 mr-sm-2" id="nombre" name="nombre" placeholder="Nombre"
				value="<?= $nombre ?>">

			<button type="submit" class="btn btn-primary mb-2" name="btnProcesar">Submit</button>

		</form>

		<?php if (isset($_POST["btnProcesar"])) { ?>
		<div class="card">
			<div class="card-header">
				Resultado de la consulta
			</div>
			<div class="card-body">
				<table class="table">
					<thead class="thead-light">
						<tr>
							<th>CODIGO</th>
							<th>PATERNO</th>
							<th>MATERNO</th>
							<th>NOMBRE</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($tabla as $row) { ?>
						<tr>
							<td><?= $row["chr_cliecodigo"] ?></td>
							<td><?= $row["vch_cliepaterno"] ?></td>
							<td><?= $row["vch_cliematerno"] ?></td>
							<td><?= $row["vch_clienombre"] ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php } ?>
	</div>

	<script src="jquery-3.6.0.min.js"></script>
	<script src="popper.min.js"></script>
	<script src="bootstrap.min.js"></script>
</body>

</html>