
<script type="text/javascript" language="javascript"
src="listado/detalle.js"></script>

<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="detalle">
<?php 
session_start();
require_once('../../includes/bd/conexion.php');
$link=  Conectarse();
$listado=  mssql_query("SELECT C.NRORESERVA,T.TDESCRI,C.OT,
	C.CENTROCOSTO,CONVERT(VARCHAR,C.FECHA,105)AS FECHA,
	D.CODIGO,D.CANTIDAD,D.REQUERIMIENTO,M.ADESCRI,M.AUNIDAD,D.CANT_PEND
	   FROM [022BDCOMUN].DBO.RESERVA_CAB AS C INNER JOIN [022BDCOMUN].DBO.RESERVA_DET AS D
	   ON  C.NRORESERVA=D.NRORESERVA  INNER JOIN [010BDCOMUN].DBO.MAEART AS  M  ON 
	   D.CODIGO=M.ACODIGO
 INNER JOIN [010BDCOMUN].DBO.TABAYU AS T ON
 C.SOLICITANTE=T.TCLAVE WHERE TCOD='12' AND C.ESTADO IN ('00','01') AND 
  D.CANT_PEND >=1   AND
  D.CODIGO='$_SESSION[detalle]'",$link);
?>
<thead>
<tr class="success">
<th>NRO. RESERVA</th>
<th>OT</th>
<th>SOLICITANTE</th>
<th>CÓDIGO</th>
<th>DESCRIPCIÓN</th>
<th>CANTIDAD</th>
<th>UND</th>
<th>REQUERIMIENTO</th>
</tr>
</thead>
<tbody>
<?php


while($reg= mssql_fetch_array($listado))
{
?>
<tr class="active">
<td><?php echo $reg[NRORESERVA];  ?>    </td>
<td><?php echo utf8_encode($reg[OT]);     ?>    </td>
<td><?php echo utf8_encode($reg[TDESCRI]);          ?>    </td>
<td><?php echo $reg[CODIGO]; ?>    </td>
<td><?php echo $reg[ADESCRI];       ?>    </td>
<td><?php echo $reg[CANTIDAD];        ?>    </td>
<td><?php echo $reg[AUNIDAD];        ?>    </td>
<td><?php echo $reg[REQUERIMIENTO];        ?>    </td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
