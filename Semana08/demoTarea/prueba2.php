<?php
include_once("servicios.php");

$estado = actualizaDatosCliente("00003", "MANSILLA", "MORETI", "YARIXA");

echo $estado;