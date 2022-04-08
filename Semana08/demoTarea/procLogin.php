<?php
include_once("servicios.php");

$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

$estado = validarLogin($usuario, $clave);

$mensajeError = "";
$destino = "location:main.php";

if ($estado === -1) {
	$mensajeError = "Datos incorrectos.";
	$destino = "location:index.php?mensaje=$mensajeError";
}


header($destino);
