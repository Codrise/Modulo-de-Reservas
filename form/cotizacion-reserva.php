<form action="../procesos/cotizacion.php" method="POST">

<div class="form-group">
<a  href="#modal-reserva-cc" role="button" 
class="btn btn-primary btn-block" data-toggle="modal">
<i class="fa fa-plus fa-2x"></i>
AGREGAR COTIZACIÓN</a>
</div>

<div class="modal fade" id="modal-reserva-cc" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-primary" id="myModalLabel">
AGREGAR COTIZACIÓN
</h4>
</div>
<div class="modal-body">
<input type="number" name="cotizacion" class="form-control" 
placeholder="Ingresar el número de cotización" min='1'
required autofocus>
<input type="hidden" name="tipo" value="actualizarcotizacion">
<input type="hidden" name="reserva" value="<?php echo $_GET['id'] ?>">
</div>
<div class="modal-footer">

<button type="submit" class="btn btn-primary">
Actualizar
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button> 

</div>
</div>

</div>

</div>





</form>