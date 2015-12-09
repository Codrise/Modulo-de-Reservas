<form action="../procesos/CargaExcel.php" method="POST">

<div class="form-group">
<a  href="#modal-reserva-carga-excel" role="button" 
class="btn btn-primary btn-block" data-toggle="modal">
<i class="fa fa-plus fa-2x"></i>
TRANSFERIR A RESERVA</a>
</div>

<div class="modal fade" id="modal-reserva-carga-excel" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-primary" id="myModalLabel">
TRANSFERIR A RESERVA
</h4>
</div>
<div class="modal-body">

<label for="">RESERVA</label>
<select name="reserva" id="" class="form-control" required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$Sql ="SELECT C.NRORESERVA,C.OT,C.USUARIO,C.CENTROCOSTO,C.TIPO FROM [022BDCOMUN].DBO.RESERVA_CAB AS C
WHERE C.ESTADO='00' AND C.USUARIO='$_SESSION[id_usuario]' 
AND C.NRORESERVA NOT IN (SELECT D.NRORESERVA FROM [022BDCOMUN].DBO.RESERVA_DET AS D)
ORDER BY C.NRORESERVA";
$result=mssql_query($Sql) or die(mssql_error());
while ($row=mssql_fetch_array($result)) {
?>
<option class="text-primary"value="<?php echo $row['NRORESERVA']?>">
<?php echo "#".$row['NRORESERVA'].' - '.$row['OT'].$row['CENTROCOSTO'];?></option>
<?php }?>
</select>
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