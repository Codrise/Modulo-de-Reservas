<script type="text/javascript" language="javascript"
src="listado/rq-materiales.js"></script>

<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="rq-materiales">
<?php require_once('../../includes/bd/conexion.php');
$link=  Conectarse();
$listado=  mssql_query("SELECT NRORESERVA,RC.OT,REQ_NUMERO,
	CONVERT(VARCHAR,REQ_FECHA_EMISION,103)AS FECHAE,
	CONVERT(VARCHAR,REQ_FECHA_AUTORI,105)AS FECHAA,
CASE REQ_ESTADO
WHEN  00 THEN 'EMITIDO'
WHEN  01 THEN 'APROBADA'
WHEN  03 THEN 'REC.PARCIAL'
WHEN  04 THEN 'REC.TOTAL'
WHEN  05 THEN 'LIQUIDADA'
WHEN  06 THEN 'ANULADA'
END  AS ESTADO,
T.TDESCRI,
CENCOST_CODIGO FROM [010BDCOMUN].dbo.INV_REQMATERIAL_CAB  AS C 
INNER JOIN [010BDCOMUN].DBO.TABAYU AS T ON C.REQ_PERSONAL_SOLIC=T.TCLAVE INNER JOIN 
[022BDCOMUN].DBO.RESERVA_CAB  AS RC ON 
C.REQ_NUMERO=RC.REQUERIMIENTO WHERE TCOD='12' AND 
REQ_ESTADO IN ('00','01') ORDER BY REQ_NUMERO",$link);
?>
<thead>
<tr class="info">
<th>NRO RESERVA</th>
<th>NRO. RQM</th>
<th>SOLICIANTE</th>
<th>FECHA EMISIÓN</th>
<th>FECHA AUTORIZACIÓN</th>
<th>ESTADO</th>
<th><a href="#" class="btn btn-warning"><i class="fa fa-file-pdf-o fa-1x"></i></a></th>
</tr>
</thead>
<tbody>
<?php


while($reg= mssql_fetch_array($listado))
{
?>
<tr class="active">
<td><?php echo $reg[NRORESERVA]; ?></td>
<td><?php echo $reg[REQ_NUMERO]; ?></td>
<td><?php echo $reg[TDESCRI]; ?></td>
<td><?php echo $reg[FECHAE]; ?></td>
<td><?php echo $reg[FECHAA]; ?></td>
<td><?php echo $reg[ESTADO]; ?></td>
<td><a href="../pdf/rq-materiales?id=<?php echo $reg[REQ_NUMERO]; ?>" 
class="btn btn-warning" target="_blank"><i class="fa fa-file-pdf-o fa-1x"></i></a></td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
