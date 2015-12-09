
<style>
.rojo{
	color: red;
}
</style>


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

<div class="panel panel-primary">

<div class="panel-footer">

<form action="../procesos/reserva.php" method="POST">

<input type="hidden" name="reserva" value="<?php echo $idreserva; ?>">

<div class="form-group">
<label for="">CÓDIGO:</label>
<input type="text" name="codigo" id="usuario" class="form-control"
 maxlength="20" required autofocus>
</div>
<div class="rojo" id="resultado"></div>
<div class="form-group">
<label for="">CANTIDAD:</label>
<input type="number" name="cantidad" class="form-control"  any="step" min="1" required>
</div>
 
<input type="hidden" name="tipo" value="editar">

<button class="btn btn-success btn-block">AGREGAR</button>

</form>

</div>
</div>
