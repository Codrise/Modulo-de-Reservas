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
class="btn btn-info" data-toggle="modal">
<i class="fa fa-envelope fa-2x"></i>
ENVIO DE CORREO</a>
</div>




<div class="modal fade" id="modal-reserva-kit" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-warning" id="myModalLabel">
ENVIO DE LISTA DE COMPRA
</h4>
<h2 class="text-warning">
</h2>
</div>
<div class="modal-body">
<!-- Inicio de mensaje -->
Este  proceso genera un lista de compra  con los articulos que no  tienen stock
y  envia un correo al área
del almacen con la confirmación de la creación.
<!-- Fin de mensaje -->

<input type="hidden" name="tipo" value="listacompra">
<input type="hidden" name="tipokit" value="<?php echo strtoupper($_GET['tipo']); ?>"> 

</div>

<div class="modal-footer">

<input type="submit"  name="enviar" value="Enviar Correo"  class="btn btn-info" />

<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button> 

</div>
</div>

</div>

</div>





</form>