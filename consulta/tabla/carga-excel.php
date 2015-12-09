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
<?php require_once('../../includes/bd/conexion.php');
session_start();
$link=  Conectarse();
$listado=  mssql_query("SELECT (ROW_NUMBER() OVER(ORDER BY ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0)) DESC))AS
 ITEM,
DRV.CODIGO,M.ADESCRI,DRV.CANTIDAD,DRV.TIPO,M.AUNIDAD,SUM(ISNULL(D.CANT_PEND,0)) AS CANT_RESERV,
ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0)) AS CANT_DISP
FROM [022BDCOMUN].DBO.DATOS_RSV AS DRV LEFT JOIN 
[022BDCOMUN].DBO.RESERVA_DET AS D ON 
DRV.CODIGO=D.CODIGO  LEFT JOIN [010BDCOMUN].DBO.STKART AS S ON 
DRV.CODIGO=S.STCODIGO AND STALMA='01' LEFT JOIN [010BDCOMUN].DBO.MAEART AS M ON
DRV.CODIGO=M.ACODIGO  WHERE USUARIO='$_SESSION[id_usuario]'   AND
M.AFSTOCK='S' AND STALMA='01' AND AESTADO='V'
GROUP BY DRV.CODIGO,M.ADESCRI,DRV.CANTIDAD,DRV.TIPO,M.AUNIDAD,S.STSKDIS",$link);
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
<th><a href="#" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></th>
</tr>
</thead>
<tbody>
<?php


while($reg= mssql_fetch_array($listado))
{
?>
<tr class="active">
<td style="mso-number-format:'0';"><?php echo $reg[ITEM]; ?>                </td>
<td  style="mso-number-format:'@';" ><?php echo utf8_encode($reg[CODIGO]); ?>            </td>
<td style="mso-number-format:'@';"><?php echo utf8_encode($reg[ADESCRI]); ?>   </td>
<td style="mso-number-format:'@';"><?php echo $reg[AUNIDAD]; ?> </td>
<td style="mso-number-format:'0.00';"><?php echo $reg[CANTIDAD]; ?>                </td>
<td style="mso-number-format:'0.00';"><?php echo $reg[CANT_RESERV]; ?>                </td>
<td style="mso-number-format:'0.00';"><?php echo $reg[CANT_DISP]; ?>              </td>
<td>
<?php 
if ($reg[CANTIDAD]<=$reg[CANT_DISP])
 {
	echo "<i class='glyphicon glyphicon-ok-circle text-primary'></i>";
 }
 else if ($reg[CANTIDAD]>$reg[CANT_DISP] AND $reg[CANT_DISP]==0)
  {
 	echo "<i class='glyphicon glyphicon-remove-circle text-danger'></i>";
 }
 else
 {
 	echo "<i class='glyphicon glyphicon-ok-circle text-warning'></i>";
 }


 ?>


</td>
<td><a href="../procesos/CargaExcel.php?codigo=<?php echo $reg[CODIGO]; ?>&
tipo=item" class="btn btn-danger"
title="ELIMINAR REGISTRO">
<i class="fa fa-trash-o"></i></a></td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
