<form action="../procesos/kit-reparacion.php" method="POST">

<div class="form-group">
<a  href="#modal-kit-reparacion" role="button" 
class="btn btn-primary" data-toggle="modal">
CREAR KIT DE REPARACIÓN</a>
</div>

<div class="modal fade" id="modal-kit-reparacion" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-primary" id="myModalLabel">
CREAR KIT DE REPARACIÓN
</h4>
</div>
<div class="modal-body">

<label for="">CÓDIGO</label>
<input name="codigo"type="text"  autofocus class="form-control" required  onchange="conMayusculas(this);">

<label for="">DESCRIPCIÓN</label>
<input name="descripcion"type="text" class="form-control" required onchange="conMayusculas(this);">


<input type="hidden"  name="tipo" value="crear">
</div>
<div class="modal-footer">

<button type="submit" class="btn btn-primary">
Crear
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button> 

</div>
</div>

</div>

</div>





</form>