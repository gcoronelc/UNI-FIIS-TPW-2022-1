<!DOCTYPE html>
<html lang="en">

<?php
$mensaje = "";
if (isset($_GET["mensaje"])) {
	$mensaje = $_GET["mensaje"];
}
?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap.min.css" />
	<title>INGRESO AL SISTEMA</title>
</head>

<body>

	<section class="vh-100" style="background-color: #508bfc;">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card shadow-2-strong" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center">

							<form method="POST" action="procLogin.php">

								<h3 class="mb-5">Ingreso al Sistema</h3>

								<div class="form-outline mb-4">
									<input type="text" id="usuario" name="usuario" class="form-control form-control-lg" />
									<label class="form-label" for="usuario">Usuario</label>
								</div>

								<div class="form-outline mb-4">
									<input type="password" id="clave" name="clave" class="form-control form-control-lg" />
									<label class="form-label" for="clave">Clave</label>
								</div>


								<button class="btn btn-primary btn-lg btn-block" name="btnIngresar"
									type="submit">Ingresar</button>
							</form>
							<?php if (isset($mensaje)) { ?>
							<hr class="my-4">
							<div class="alert alert-danger" role="alert">
								<?= $mensaje ?>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="jquery-3.6.0.min.js"></script>
	<script src="popper.min.js"></script>
	<script src="bootstrap.min.js"></script>
</body>

</html>