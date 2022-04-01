<?php
$serverName = "localhost, 1433";
$connectionInfo = ["Database" => "EUREKABANK", "UID" => "sa", "PWD" => "sql", 'CharacterSet' => 'UTF-8'];
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn) {
     echo "Conexión exitosa";
} else {
     echo "Fallo la conexión";
}


print "<h2>Query Example 1</h2>";
$sql = "select chr_cliecodigo, vch_cliepaterno, vch_cliematerno, vch_clienombre  from cliente";
print "SQL: $sql\n";
$result = sqlsrv_query($conn, $sql);
if ($result === false) {
     die(print_r(sqlsrv_errors(), true));
}
$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

print("<br>");

?>

<table>
     <thead>
          <tr>
               <th>CODIGO</th>
               <th>PATERNO</th>
               <th>MATERNO</th>
               <th>NOMBRE</th>
          </tr>
     </thead>
     <tbody>
          <?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
               <tr>
                    <td><?= $row["chr_cliecodigo"] ?></td>
                    <td><?= $row["vch_cliepaterno"] ?></td>
                    <td><?= $row["vch_cliematerno"] ?></td>
                    <td><?= $row["vch_clienombre"] ?></td>
               </tr>
          <?php } ?>
     </tbody>
</table>