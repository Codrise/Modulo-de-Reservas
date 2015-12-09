<form action="../procesos/rqcompra.php" method="POST">

<div class="form-group">
<a  href="#modal-rq-compra" role="button" 
class="btn btn-success" data-toggle="modal">
<i class="fa fa-plus fa-2x"></i>
ENVIAR A RQ DE COMPRA</a>
</div>

<div class="modal fade" id="modal-rq-compra" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-success" id="myModalLabel">
ENVIAR A RQ DE COMPRA
</h4>
</div>
<div class="modal-body">
<label for="">RQ DE COMPRA</label>
<div class="form-group">
<select name="nrorequi" id="" class="form-control" required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$Sql ="SELECT  C.NROREQUI  FROM  [010BDCOMUN].DBO.REQUISC AS C INNER JOIN
  [010BDCOMUN].DBO.REQUISD AS  D  ON 
C.NROREQUI=D.NROREQUI WHERE  C.CODSOLIC='$_SESSION[starsoft]' AND C.TIPOREQUI='RQ'
AND  D.codpro='TEXTO'  AND DESCPRO='RESERVA'";
$result=mssql_query($Sql) or die(mssql_error());
while ($row=mssql_fetch_array($result)) {
?>
<option class="text-primary"value="<?php echo $row['NROREQUI']?>">
<?php echo $row['NROREQUI'];?></option>
<?php }?>
</select>
</div>

<div class="form-group">
<label for="">NRO. DE MAQUINA</label>
<input type="text" class="form-control" name="nromaquina" onchange="conMayusculas(this);">
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