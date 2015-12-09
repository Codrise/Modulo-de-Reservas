<form action="../procesos/ot-cc.php" method="POST">

<div class="form-group">
<a  href="#modal-reserva-ot-cc" role="button" 
class="btn btn-primary" data-toggle="modal">
<i class="fa fa-plus fa-2x"></i>
ASOCIAR OT  &  CENTRO DE COSTO </a>
</div>

<div class="modal fade" id="modal-reserva-ot-cc" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-primary" id="myModalLabel">
ASOCIAR OT  &  CENTRO DE COSTO
</h4>
</div>
<div class="modal-body">
<div class="form-group">
<label for="">OT:</label>
<select name="ot" class="form-control" required>
<option value="">SELECCIONAR...</option>
<?php
$link=Conectarse();
$Sql ="SELECT OF_COD,OF_ARTNOM,OF_ESTADO FROM [010BDCOMUN].dbo.ORD_FAB
WHERE OF_ESTADO ='ACTIVO'  AND 
OF_COD NOT IN (SELECT CODIGOOT FROM [022BDCOMUN].DBO.CENCOSOT)
ORDER BY OF_COD";
$result=mssql_query($Sql) or die(mssql_error());
while ($row=mssql_fetch_array($result)) {
?>
<option value="<?php echo $row['OF_COD']?>"><?php echo $row['OF_COD']?></option>
<?php }?>
</select>
</div>

<div class="form-group">
<label for="">CENTRO DE COSTO</label>
<select name="cc" id="" class="form-control" required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$Sql ="SELECT  CENCOST_CODIGO,CENCOST_DESCRIPCION,
(CENCOST_DESCRIPCION+' - '+CENCOST_CODIGO)as fullname
from [010BDCONTABILIDAD].DBO.CENTRO_COSTOS 
ORDER BY CENCOST_DESCRIPCION";
$result=mssql_query($Sql) or die(mssql_error());
while ($row=mssql_fetch_array($result)) {
?>
<option class="text-primary"value="<?php echo $row['CENCOST_CODIGO']?>">
<?php echo utf8_encode($row['fullname']);?></option>
<?php }?>
</select>
</div>

<input type="hidden"  name="tipo" value="registrar">
</div>
<div class="modal-footer">

<button type="submit" class="btn btn-primary">
Registrar
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button> 

</div>
</div>

</div>

</div>





</form>