<?php

function getConnection()
{
	$serverName = "localhost\sqlexpress, 1433";
	$connectionInfo = array("Database" => "EUREKABANK", "UID" => "sa", "PWD" => "sql", "CharacterSet" => "UTF-8", "TrustServerCertificate" => "True");
	$conn = sqlsrv_connect($serverName, $connectionInfo);
	return $conn;
}


function getClientes($paterno, $materno, $nombre)
{
	$sql = "select chr_cliecodigo, vch_cliepaterno, vch_cliematerno, vch_clienombre from cliente ";
	$sql .= "where vch_cliepaterno like ? and vch_cliematerno like ? and vch_clienombre like ?";
	$conn = getConnection();
	$parametros = ["%$paterno%", "%$materno%", "%$nombre%"];
	$resultado = sqlsrv_query($conn, $sql, $parametros);
	$tabla = array();
	while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
		$tabla[] = $row;
	}
	return $tabla;
}