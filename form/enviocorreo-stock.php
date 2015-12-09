<script>
function validar(f){
f.enviar.value="Por favor, espere";
f.enviar.disabled=true;
f.usuario.value=(f.usuario.value=="")?"Anónimo":f. usuario.value;
return true}
</script>

<form action="../procesos/reserva.php" method="POST" onsubmit="return validar(this)">

<div class="form-group">
<a  href="#modal-reserva-kit" role="button" 
class="btn btn-info btn-block" data-toggle="modal">
<i class="fa fa-envelope fa-2x"></i>
ENVIO DE CORREO DE ARTICULOS SIN STOCK</a>
</div>




<div class="modal fade" id="modal-reserva-kit" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-primary" id="myModalLabel">
ENVIO DE CORREO DE ARTICULOS SIN STOCK
</h4>
<h2 class="text-warning">
</h2>
</div>
<div class="modal-body">
<!-- Inicio de mensaje -->
Se enviara un correo al área de almacen confirmando la solicitud de árticulos sin stock
necesario.
<!-- Fin de mensaje -->
<div class="form-group">
<select name="reposicion" id="" class="form-control" required>
<option value="">[SELECCIONE EL TIPO DE REPOSICIÓN]</option>
<option value="UTL">UTILES DE OFICINA</option>
<option value="VTA">VENTAS</option>
</select>
</div>
</div>

<div class="modal-footer">

<input type="hidden" name="tipo" value="listastock">
<input type="submit"  name="enviar" value="Enviar Correo"  class="btn btn-info" />

<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button> 

</div>
</div>

</div>

</div>





</form>