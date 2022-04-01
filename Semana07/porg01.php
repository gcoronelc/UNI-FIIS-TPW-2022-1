<?php
$serverName = "localhost\sqlexpress, 1433";
$connectionInfo = array("Database" => "EUREKABANK", "UID" => "sa", "PWD" => "sql", "CharacterSet" => "UTF-8", "TrustServerCertificate" => "True");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn) {
	echo "Conexión establecida.<br />";
} else {
	echo "Conexión no se pudo establecer.<br />";
	die(print_r(sqlsrv_errors()[0][""], true));
}