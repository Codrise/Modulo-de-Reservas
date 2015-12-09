<form action="../procesos/cotizacion.php" method="POST">

<div class="form-group">
<a  href="#modal-reserva-ventas" role="button" 
class="btn btn-success btn-block" data-toggle="modal">
<i class="fa fa-usd fa-2x"></i>
TRANSFERIR A COTIZACIÓN</a>
</div>

<div class="modal fade" id="modal-reserva-ventas" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-success" id="myModalLabel">
TRANSFERIR A COTIZACIÓN
</h4>
</div>
<div class="modal-body">

<label for="">COTIZACIÓN</label>
<select name="cotizacion" id="" class="form-control" required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$Sql ="SELECT C.CCNUMDOC FROM [010BDCOMUN].DBO.COTCAB AS C INNER JOIN  
[010BDCOMUN].DBO.COTDET AS  D ON 
C.CCNUMDOC=D.CDNUMDOC  WHERE  CCESTADO='V' AND  D.CDCODIGO='COTIZACION'";
$result=mssql_query($Sql) or die(mssql_error());
while ($row=mssql_fetch_array($result)) {
?>
<option class="text-primary"value="<?php echo $row['CCNUMDOC']?>">
<?php echo $row['CCNUMDOC']?></option>
<?php }?>
</select>

<input type="hidden"  name="tipo" value="registrar">
</div>
<div class="modal-footer">

<button type="submit" class="btn btn-success">
Transferir
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button> 

</div>
</div>

</div>

</div>





</form>