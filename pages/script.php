<?php
$user = $_POST['b'];

if(!empty($user)) {
comprobar($user);
}

function comprobar($b) {
$con = mssql_connect('192.168.1.4','APLICACIONES', 'APLICACIONES');
mssql_select_db('[010BDCOMUN]', $con);

$sql = mssql_query("SELECT ACODIGO,ADESCRI,
(ISNULL(STSKDIS,0)-SUM(ISNULL(CANT_PEND,0)))AS STOCK
FROM [010BDCOMUN].DBO.MAEART AS M LEFT JOIN [010BDCOMUN].DBO.STKART AS S ON
M.ACODIGO=S.STCODIGO AND STALMA='01' LEFT JOIN [022BDCOMUN].DBO.RESERVA_DET AS D ON
S.STCODIGO=D.CODIGO 

WHERE  AESTADO='V' AND AFSTOCK='S'  AND  ACODIGO='".$b."'

GROUP BY ACODIGO,ADESCRI,STSKDIS ",$con);

$contar = mssql_fetch_array($sql);

echo "STOCK:".round($contar['STOCK'],3);
}     
?>