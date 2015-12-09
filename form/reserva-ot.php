<form action="../procesos/reserva.php" method="POST">

<div class="form-group">
<a  href="#modal-reserva-ot" role="button" 
class="btn btn-success" data-toggle="modal">
<i class="fa fa-plus fa-3x"></i>
REGISTRAR RESERVA POR OT</a>
</div>

<div class="modal fade" id="modal-reserva-ot" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-success" id="myModalLabel">
RESERVA POR OT
</h4>
</div>
<div class="modal-body">
<h2 class="text-success">RESERVA  #  <?php $reserva->correlativoReserva(); ?></h2>
<label for="">OT</label>
<select name="ot" id="" class="form-control" required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$Sql ="SELECT CODIGOOT FROM [022BDCOMUN].dbo.CENCOSOT
GROUP BY CODIGOOT ORDER BY CODIGOOT ";

$result=mssql_query($Sql) or die(mssql_error());
while ($row=mssql_fetch_array($result)) {
?>
<option class="text-primary" value="<?php echo $row['CODIGOOT']?>">
<?php echo $row['CODIGOOT']?></option>
<?php }?>
</select>

<input type="hidden"  name="tiporeserva" value="OT">
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




</form>