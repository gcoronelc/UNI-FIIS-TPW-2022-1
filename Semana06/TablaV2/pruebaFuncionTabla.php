<?php
function fnTablaMultiplicar($tabla)
{
	$arregloTabla = array();
	for ($i = 1; $i <= 12; $i++) {
		$row["tabla"] = $tabla;
		$row["i"] = $i;
		$row["rpta"] = $tabla * $i;
		$arregloTabla[] = $row;
	}
	return $arregloTabla;
}

$respuesta = fnTablaMultiplicar(5);


print_r($respuesta);
