<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Consulta de Empresa</title>
<?php
@session_start();
include('../header.php'); ?>
<script language="javascript">
$(document).ready(function() {
$(".botonExcel").click(function(event) {
$("#datos_a_enviar").val( $("<div>").append( $("#carga-excel").eq(0).clone()).html());
$("#FormularioExportacion").submit();
});
});
</script>

<style>
.botonExcel{cursor:pointer;}
</style>

</head>
<body>
<div class="container-fluid">

<div class="row">
<div class="col-md-6">
<form action="empresa" method="POST">
<div class="form-group">
<input type="number" value="<?php echo $_POST['rq']; ?>" class="form-control"
 name="rq" min="1" required placeholder="Ingresar el número de Requerimiento de Compra."
 >
</div>
<div class="form-group">
<select name="bd" id="" class="form-control" required title="SELECCIONAR LA EMPRESA PORFAVOR">
<option value="">
<?php
if (!isset($_POST['bd']))
{
echo "[SELECCIONAR LA EMPRESA]";
}

else
{
if ($_POST['bd']=='[004BDCOMUN]')
{
	echo "ROCKDRILL";
}
else
{
	echo "OVERPRIME";
}

}

?>


</option>
<option value="[004BDCOMUN]">ROCKDRILL</option>
<option value="[011BDCOMUN]">OVERPRIME</option>
</select>
</div>
<div class="form-group">
<button class="btn btn-primary">Consultar</button>
</div>
</form>
</div>

<div class="col-md-3">
</div>
<div class="col-md-3">
<?php 

if (!isset($_POST['bd']) and !isset($_POST['rq'])) 
{
	echo "";
}
else
{
?>

<form action="../librerias/Excel/generar-excel.php" method="post" target="_blank" id="FormularioExportacion">

<img src="/adm-reserva/assets/img/excel.png" class="img-responsive botonExcel" 
title="DESCARGAR ARCHIVO"id="#excel" width="50">


<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>

<?php
}
 
?>
</div>


</div>


<div class="row">
<div class="col-md-12">
<?php include('../grid/consultas-ventas-empresa.php'); ?>
</div>
</div>
</div>
</body>
</html>