<!DOCTYPE html>
<?php
// Datos
$precio = $_POST["precio"];
$cantidad = $_POST["cantidad"];
// Proceso
$total = round($precio*$cantidad,2);
$importe = round($total/1.18,2);
$impuesto = $total - $importe;


?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VENTA</title>
</head>

<body>
	<h1>VENTA</h1>
	<h3>Datos de la venta</h3>
	<table>
			<tr>
				<td>Importe</td>
				<td><?= $importe ?></td>
			</tr>
            <tr>
				<td>Impuesto</td>
				<td><?= $impuesto ?></td>
			</tr>
            <tr>
				<td>Total</td>
				<td><?= $total ?></td>
			</tr>
	</table>
    <a href="producto.html">Otra venta</a>
</body>

</html>