<form action="../procesos/reserva.php" method="POST">

<div class="form-group">
<a  href="#modal-reserva-ventas" role="button" 
class="btn btn-primary" data-toggle="modal">
<i class="fa fa-hand-o-right fa-2x"></i>
ENVIAR  A CONSULTA</a>
</div>

<div class="modal fade" id="modal-reserva-ventas" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<input type="hidden" name="rq"value="<?php echo $_REQUEST['rq']; ?>">
<input type="hidden" name="bd"value="<?php echo $_REQUEST['bd']; ?>">

<input type="hidden"  name="tipo" value="registrarventas">
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