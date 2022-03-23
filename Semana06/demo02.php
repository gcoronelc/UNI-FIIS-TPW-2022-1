<!DOCTYPE html>
<?php
// Recibir datos
$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
// Proceso
$suma = $num1 + $num2;
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DEMO 02</title>
</head>

<body>
	<h1>SUMA DE 2 NUMEROS</h1>
	<table>
		<tr>
			<td>Número 1: </td>
			<td><?= $num1 ?></td>
		</tr>
		<tr>
			<td>Número 2: </td>
			<td><?= $num2 ?></td>
		</tr>
		<tr>
			<td>Suma: </td>
			<td><?= $suma ?></td>
		</tr>
	</table>
</body>

</html>