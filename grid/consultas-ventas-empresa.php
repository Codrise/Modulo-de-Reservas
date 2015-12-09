<style>
	i{
		font-size: 20px;
	}
</style>


<script type="text/javascript" language="javascript"
src="listado/carga-excel.js"></script>
<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="carga-excel"  border="1" >
<?php
$link=  Conectarse();
$listado=  mssql_query("SELECT  RD.REQITEM,RD.codpro,M.ADESCRI,RD.CANTID,
	RD.CANTID,M.AUNIDAD,SUM(ISNULL(D.CANT_PEND,0)) AS CANT_RESERV,
ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0)) AS CANT_DISP
FROM $_POST[bd].DBO.REQUISD AS RD LEFT JOIN 
[022BDCOMUN].DBO.RESERVA_DET AS D ON 
RD.codpro=D.CODIGO  LEFT JOIN [010BDCOMUN].DBO.STKART AS S ON 
RD.codpro=S.STCODIGO AND STALMA='01' LEFT JOIN [010BDCOMUN].DBO.MAEART AS M ON
RD.codpro=M.ACODIGO  WHERE CAST(RD.NROREQUI AS  INT)='$_POST[rq]'  AND
M.AFSTOCK='S' AND STALMA='01' AND AESTADO='V'
GROUP BY RD.REQITEM,RD.codpro,M.ADESCRI,RD.codpro,RD.CANTID,M.AUNIDAD,S.STSKDIS
",$link);
?>
<thead>
<tr class="info">
<th>IT</th>
<th>CÓDIGO</th>
<th>DESCRIPCIÓN</th>
<th>UND</th>
<th>CANT. SOL.</th>
<th>CANT. RESV.</th>
<th>CANT. DISP.</th>
<th><i class="glyphicon glyphicon-eye-open"  ></i></th>
</tr>
</thead>
<tbody>
<?php


while($reg= mssql_fetch_array($listado))
{
?>
<tr class="active">
<td style="mso-number-format:'0';"><?php echo $reg[REQITEM]; ?>                </td>
<td  style="mso-number-format:'@';" ><?php echo utf8_encode($reg[codpro]); ?>            </td>
<td style="mso-number-format:'@';"><?php echo utf8_encode($reg[ADESCRI]); ?>   </td>
<td style="mso-number-format:'@';"><?php echo $reg[AUNIDAD]; ?> </td>
<td style="mso-number-format:'0.00';"><?php echo $reg[CANTID]; ?>                </td>
<td style="mso-number-format:'0.00';"><?php echo $reg[CANT_RESERV]; ?>                </td>
<td style="mso-number-format:'0.00';"><?php echo $reg[CANT_DISP]; ?>              </td>
<td>
<?php 
if ($reg[CANTID]<=$reg[CANT_DISP])
 {
	echo "<i class='glyphicon glyphicon-ok-circle text-primary'></i>";
 }
 else if ($reg[CANTID]>$reg[CANT_DISP] AND $reg[CANT_DISP]==0)
  {
 	echo "<i class='glyphicon glyphicon-remove-circle text-danger'></i>";
 }
 else
 {
 	echo "<i class='glyphicon glyphicon-ok-circle text-warning'></i>";
 }


 ?>


</td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
