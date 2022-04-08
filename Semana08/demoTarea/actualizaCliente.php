<?php
include_once("servicios.php");

$codigo = $_GET["codigo"];
$row = getCliente($codigo);
$paterno = $row["vch_cliepaterno"];
$materno = $row["vch_cliematerno"];
$nombre = $row["vch_clienombre"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="bootstrap.min.css" />
	<title>ACTUALIZA CLIENTE</title>
</head>

<body>

	<?php include_once("menu.php"); ?>

	<div class="container">
		<h1>ACTUALIZA DATOS DE <?= "$nombre $paterno" ?></h1>
		<form method="POST" action="actualizaCliente2.php">
			<input type="hidden" name="codigo" value="<?= $codigo ?>">
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th>DATO</th>
						<th>VALOR ACTUAL</th>
						<th>NUEVO VALOR</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>NOMBRE</th>
						<td><?= $nombre ?></td>
						<td><input type="text" class="form-control" id="nombre" name="nombre" placeholder="<?= $nombre ?>">
						</td>
					</tr>
					<tr>
						<th>PATERNO</th>
						<td><?= $paterno ?></td>
						<td><input type="text" class="form-control" id="paterno" name="paterno" placeholder="<?= $paterno ?>">
						</td>
					</tr>
					<tr>
						<th>MATERNO</th>
						<td><?= $materno ?></td>
						<td><input type="text" class="form-control" id="materno" name="materno" placeholder="<?= $materno ?>">
						</td>
					</tr>
				</tbody>
			</table>
			<div class="form-group row">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-primary">Actualizar datos</button>
				</div>
			</div>
		</form>
	</div>

	<script src="jquery-3.6.0.min.js"></script>
	<script src="popper.min.js"></script>
	<script src="bootstrap.min.js"></script>
</body>

</html>