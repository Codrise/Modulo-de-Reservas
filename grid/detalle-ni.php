<div class="table-responsive">
<table class="table table-bordered table-condensed" >
<?php
$link=  Conectarse();
$listado= mssql_query("SELECT  D.DENUMDOC,D.DECODIGO,M.ADESCRI,D.DECANTID,D.DEUNIDAD,D.DEITEM,S.STSKDIS,
(ISNULL(S.STSKDIS,0))-ISNULL(SUM(RD.CANT_PEND),0) AS CANT_DISP FROM
[010BDCOMUN].dbo.MOVALMDET AS  D INNER JOIN [010BDCOMUN].dbo.MAEART AS M ON
D.DECODIGO=M.ACODIGO  LEFT JOIN [022BDCOMUN].DBO.RESERVA_DET AS RD ON
D.DECODIGO=RD.CODIGO LEFT JOIN [022BDCOMUN].DBO.RESERVA_CAB AS RC ON
RD.NRORESERVA=RC.NRORESERVA INNER JOIN [010BDCOMUN].DBO.STKART AS S ON
D.DECODIGO=S.STCODIGO AND STALMA='01' WHERE DENUMDOC='$_GET[ni]' AND DETD='NI'  
/*AND RC.USUARIO='$IDUSUARIO'*/
GROUP BY D.DENUMDOC,D.DECODIGO,M.ADESCRI,D.DECANTID,S.STSKDIS,D.DEUNIDAD,D.DEITEM
ORDER BY D.DEITEM",$link);
?>
<thead>
<tr class="success">
<th>IT</th>
<th>CÓDIGO</th>
<th>DESCRIPCIÓN</th>
<th>CANTIDAD NI</th>
<th>UND</th>
<th>CANT DISP</th>
</tr>
</thead>
<tbody>
<?php


while($row= mssql_fetch_array($listado))
{
?>
<tr class="active">
<td> <?php echo $row[DEITEM]; ?>  </td>
<td> <?php echo $row[DECODIGO] ; ?> </td>
<td> <?php echo utf8_encode($row[ADESCRI]); ?>  </td>
<td> <?php echo $row[DECANTID] ; ?> </td>
<td> <?php echo $row[DEUNIDAD]; ?> </td>
<td> <?php echo $row[STSKDIS]; ?> </td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
