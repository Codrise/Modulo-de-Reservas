
<script type="text/javascript" language="javascript"
src="listado/codigo.js"></script>

<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="codigo">
<?php 
session_start();
require_once('../../includes/bd/conexion.php');
$link=  Conectarse();
$listado=  mssql_query("SELECT (ROW_NUMBER() OVER(ORDER BY ACODIGO))AS ITEM,ACODIGO,
	ADESCRI,AFAMILIA,AUNIDAD,STSKDIS,
	SUM(ISNULL(CANT_PEND,0))AS CANT_RESEV,
(ISNULL(STSKDIS,0)-SUM(ISNULL(CANT_PEND,0)))AS CANT_DISP,ACOMENTA 
FROM [010BDCOMUN].DBO.MAEART AS M LEFT JOIN [010BDCOMUN].DBO.STKART AS S ON
M.ACODIGO=S.STCODIGO AND STALMA='01' LEFT JOIN [022BDCOMUN].DBO.RESERVA_DET AS D ON
S.STCODIGO=D.CODIGO AND STALMA='01'
WHERE  AESTADO='V' AND AFSTOCK='S'  AND M.ACODIGO+M.ADESCRI LIKE '%$_SESSION[codigo]%'
GROUP BY ACODIGO,ADESCRI,AFAMILIA,AUNIDAD,ACOMENTA,STSKDIS",$link);
?>
<thead>
<tr class="info">
<th>IT</th>
<th>CÓDIGO</th>
<th>DESCRIPCIÓN</th>
<th>UNIDAD</th>
<th>FAMILIA</th>
<th>CANT. RESERV.</th>
<th>CANT. DISP.</th>
<th>FICHA</th>
<th><i class="fa fa-search text-primary fa-3x"></i></th>
</tr>
</thead>
<tbody>
<?php


while($reg= mssql_fetch_array($listado))
{
?>
<tr class="active">
<td><?php echo $reg[ITEM];  ?>    </td>
<td><?php echo utf8_encode($reg[ACODIGO]);     ?>    </td>
<td><?php echo utf8_encode($reg[ADESCRI]);          ?>    </td>
<td><?php echo $reg[AUNIDAD]; ?>    </td>
<td><?php echo $reg[AFAMILIA];       ?>    </td>
<td><?php echo $reg[CANT_RESEV];        ?>    </td>
<td><?php echo $reg[CANT_DISP];        ?>    </td>
<td><?php echo utf8_encode($reg[ACOMENTA]);        ?>    </td>
<td><a href="detalle?detalle=<?php echo $reg[ACODIGO]; ?>">
<i class="fa fa-search text-primary fa-3x"></i></a></td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
