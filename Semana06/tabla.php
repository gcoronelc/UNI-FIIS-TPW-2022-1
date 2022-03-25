<!DOCTYPE html>
<?php
// Datos
$tabla = $_POST["tabla"];
// Proceso
$arregloTabla = array();
for ($i = 1; $i <= 12; $i++) {
	$row["tabla"] = $tabla;
	$row["i"] = $i;
	$row["rpta"] = $tabla * $i;
	$arregloTabla[] = $row;
}
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TABLA DE MULTIPLICAR</title>
</head>

<body>
	<h1>TABLA DE MULTIPLICAR</h1>
	<h3>Tabla del <?= $tabla ?></h3>
	<table>
		<?php for ($i = 0; $i < count($arregloTabla); $i++) { ?>
			<tr>
				<td><?= $arregloTabla[$i]["tabla"] ?></td>
				<td>x</td>
				<td><?= $arregloTabla[$i]["i"] ?></td>
				<td>=</td>
				<td><?= $arregloTabla[$i]["rpta"] ?></td>
			</tr>
		<?php } ?>
	</table>
</body>

</html>