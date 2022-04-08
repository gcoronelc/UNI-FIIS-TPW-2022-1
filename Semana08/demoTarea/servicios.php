<?php

function getConnection()
{
	$serverName = "localhost, 1433";
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

function getCliente($codigo)
{
	$sql = "select chr_cliecodigo, vch_cliepaterno, vch_cliematerno, vch_clienombre ";
	$sql .= "from cliente where chr_cliecodigo=?";
	$conn = getConnection();
	$parametros = [$codigo];
	$resultado = sqlsrv_query($conn, $sql, $parametros);
	$row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC);
	return $row;
}


function registarDeposito($cuenta, $importe, $empleado)
{
	// Sentencias SQL
	$sql1 = "select count(1) contador from cuenta where chr_cuencodigo = ?";
	$sql2 = "update cuenta set dec_cuensaldo = dec_cuensaldo + ?, int_cuencontmov = int_cuencontmov + 1 where chr_cuencodigo = ?";
	$sql3 = "select int_cuencontmov nromov from Cuenta where chr_cuencodigo = ?";
	$sql4 = "insert into movimiento (chr_cuencodigo, int_movinumero, dtt_movifecha, chr_emplcodigo, ";
	$sql4 .= "chr_tipocodigo, dec_moviimporte) values(?, ?, getdate(), ?, '003', ?)";
	// La conexión con la base de datos
	$conn = getConnection();
	// Validar la cuenta
	$parametros = [$cuenta];
	$resultado = sqlsrv_query($conn, $sql1, $parametros);
	$row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC);
	$cont = $row["contador"];
	if ($cont == 0) {
		return -1;
	}
	// Actualizar cuenta
	$parametros = [$importe, $cuenta];
	sqlsrv_query($conn, $sql2, $parametros);
	// Leer contador
	$parametros = [$cuenta];
	$resultado = sqlsrv_query($conn, $sql3, $parametros);
	$row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC);
	$nroMov = $row["nromov"];
	// Registrar movimiento
	$parametros = [$cuenta, $nroMov, $empleado, $importe];
	sqlsrv_query($conn, $sql4, $parametros);
	// Todo ok
	return 1;
}


function validarLogin($usuario, $clave)
{
	$sql = "select count(1) contador from Empleado ";
	$sql .= "where vch_emplusuario=? and vch_emplclave=?";
	$conn = getConnection();
	$parametros = [$usuario, $clave];
	$resultado = sqlsrv_query($conn, $sql, $parametros);
	$row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC);
	$contador = $row["contador"];
	$estado = ($contador == 1) ? 1 : -1;
	return $estado;
}

function actualizaDatosCliente($codigo, $paterno, $materno, $nombre)
{
	$sql = "update cliente set vch_cliepaterno=?,";
	$sql .= "vch_cliematerno=?, vch_clienombre=? ";
	$sql .= "where chr_cliecodigo=?";
	$conn = getConnection();
	$parametros = [$paterno, $materno, $nombre, $codigo];
	$stmt = sqlsrv_query($conn, $sql, $parametros);
	$estado = ($stmt) ? 1 : -1;
	return $estado;
}
