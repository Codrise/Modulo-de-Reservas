<!-- validar si existe detalle en la reserva -->
<?php 
$reserva->ExisteDetalle($idreserva);
?>


<form action="../procesos/requerimiento.php" method="POST">


<div class="modal fade" id="modal-reserva-rqm" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-warning" id="myModalLabel">
CREAR REQUERIMIENTO DE MATERIALES
</h4>
<h2 class="text-warning">
REQUERIMIENTO # <?php $rqmateriales->correlativoRqmateriales(); ?>
</h2>
</div>

<div class="modal-body">

<input type="hidden" name="requerimiento"  value="<?php $rqmateriales->correlativoRqmateriales(); ?>"> 
<input type="hidden" name="reserva"  value="<?php echo  $idreserva; ?>">
<input type="hidden" name="ot"  value="<?php $reserva->MostrarAtributo($idreserva,'OT') ?>">
<input type="hidden" name="cc"  value="<?php $reserva->MostrarAtributo($idreserva,'CENTROCOSTO') ?>">
<input type="hidden" name="ccot"  value="<?php $reserva->ObtenerCentrocosto($idreserva) ?>">

<input type="text"  name="glosa" class="form-control" placeholder="Ingresar el comentario para 
el requerimiento"
onchange="conMayusculas(this);" 
 required>

</div>
<div class="modal-footer">

<button type="submit" class="btn btn-primary">
Crear Requerimiento
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button> 

</div>
</div>

</div>

</div>





</form>