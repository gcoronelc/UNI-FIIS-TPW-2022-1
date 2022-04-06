<?php
include_once("servicios.php");

$estado = registarDeposito("00100001", 5000.0, "0004");

echo $estado;