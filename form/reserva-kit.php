<form action="../procesos/reserva.php" method="POST">

<div class="form-group">
<a  href="#modal-envio-correo" role="button" 
class="btn btn-primary" data-toggle="modal">
<i class="fa fa-plus fa-2x"></i>
CREAR RESERVA</a>
</div>




<div class="modal fade" id="modal-envio-correo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-primary" id="myModalLabel">
CREAR RESERVA
</h4>
<h2 class="text-warning">
</h2>
</div>

<div class="modal-body">

<select name="reserva" id="" class="form-control" required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$Sql ="SELECT C.NRORESERVA,C.OT,C.USUARIO,C.CENTROCOSTO,C.TIPO FROM [022BDCOMUN].DBO.RESERVA_CAB AS C
WHERE C.ESTADO='00' AND C.USUARIO='$_SESSION[id_usuario]' AND C.TIPO='OT'
AND C.NRORESERVA NOT IN (SELECT D.NRORESERVA FROM [022BDCOMUN].DBO.RESERVA_DET AS D)
ORDER BY C.NRORESERVA";
$result=mssql_query($Sql) or die(mssql_error());
while ($row=mssql_fetch_array($result)) {
?>
<option class="text-primary"value="<?php echo $row['NRORESERVA']?>">
<?php echo "#".$row['NRORESERVA'].' - '.$row['OT'];?></option>
<?php }?>
</select>

<input type="hidden" name="tipokit" value="<?php echo strtoupper($_GET['tipo']); ?>"> 

<input type="hidden" name="tipo" value="reservakit"> 

</div>
<div class="modal-footer">

<button type="submit" class="btn btn-primary">
Crear Reserva
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button> 

</div>
</div>

</div>

</div>





</form>