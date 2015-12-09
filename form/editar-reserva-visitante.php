<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>DETALLE RESERVA: # <?php echo $idreserva; ?></strong></h3>
</div>
<div class="panel-footer"><strong>SOLICITANTE:</strong></div>
<div class="panel-footer"><strong class="text-primary"><?php $reserva->MostrarAtributo($idreserva,'TDESCRI'); ?></strong></div>
<div class="panel-footer"><strong>OT:</strong></div>
<div class="panel-footer"><strong class="text-primary"><?php $reserva->MostrarAtributo($idreserva,'OT'); ?></strong></div>
<div class="panel-footer"><strong>CENTRO DE COSTO:</strong></div>
<div class="panel-footer"><strong class="text-primary"><?php $reserva->MostrarAtributo($idreserva,'CENTROCOSTO'); ?></strong></div>
</div>