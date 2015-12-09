<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Detalle Kit de Reparación</title>
<?php 
include('../header.php');
include('../includes/clases/Kitreparacion.php');
$kitreparacion = new Kitreparacion();
//$kitreparacion->MostrarAtributo('REP-0003','CODKIT');
 ?>
</head>
<body>
<div class="container-fluid">

<div class="row">
<div class="col-md-3">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">
<?php  $kitreparacion->MostrarAtributo('REP-0003','CODKIT') ?>
</h3>
</div>
<div class="panel-body">
<?php $kitreparacion->MostrarAtributo('REP-0003','KDESCRI') ?>
</div>
</div>

<form action="../procesos/kit-reparacion" method="POST">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">
Agregar Articulo
</h3>
</div>
<div class="panel-body">
<label for="">Código</label>
<input type="text" name="codigo"class="form-control" required autofocus>
<label for="">Cantidad</label>
<input type="number"  name="cantidad"class="form-control" required>
<input type="hidden" name="kit" value="<?php echo $_GET[id]; ?>">
<input type="hidden" name="tipo" value="agregararticulo">
</div>
<div class="panel-footer">
<button class="btn btn-success">Registrar</button>
</div>
</div>
</form>

</div>


<div class="col-md-9">
<?php include('../grid/kit-reparacion.php'); ?>
</div>
</div>

</div>
</body>
</html>