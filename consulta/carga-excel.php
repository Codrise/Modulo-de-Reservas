<!DOCTYPE html>
<html>
<head>
<title>CARGA DESDE EXCEL</title>
<?php include('../header.php'); ?>
<meta charset="UTF-8">
<!--    ESTILO GENERAL   -->
<link type="text/css" href="css/style.css" rel="stylesheet" />
<!--    ESTILO GENERAL    -->
<!--    JQUERY   -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="funcion/carga-excel.js"></script>
<!--    JQUERY    -->
<!--    FORMATO DE TABLAS -->  
<link type="text/css" href="css/demo_table.css" rel="stylesheet" /> 
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<!--    FORMATO DE TABLAS    -->

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
<div class="col-md-12">
<?php 

if (empty($_GET['msj']))
{
echo "";
}
else
{
?>
<div class="alert alert-success alert-dismissable">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
×
</button>
<h4>
Correo enviado exitosamente
<i class="fa fa-check fa-2x"></i>
</h4>
</div>
<?php
}


?>
</div>
</div>

<div class="row">
<div class="col-md-3">
<?php include('../form/reserva-carga-excel.php'); ?>
</div>

<div class="col-md-5">
<?php include('../form/enviocorreo-stock.php'); ?>
</div>

<div class="col-md-2">
<form action="../librerias/Excel/generar-excel.php" method="post" target="_blank" id="FormularioExportacion">

<div class="form-group">
<button class="btn btn-success btn-block botonExcel">
<i class="fa fa-file-excel-o fa-2x"></i>
DESCARGAR EXCEL
</button>
</div>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>
</div>

<div class="col-md-2">
<div class="form-group">
<a href="../procesos/CargaExcel.php?tipo=total" class="btn btn-danger btn-block">
<i class="fa fa-trash-o fa-2x"></i>
Liberar
</a>
</div>
</div>

</div>



<div class="row">
<div class="col-md-12">
<article id="contenido"></article>
</div>
</div>


</div>
</body>
</html>


