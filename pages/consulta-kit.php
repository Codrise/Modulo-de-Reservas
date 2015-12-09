<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Consultar Kit - Ensamble - Kit de reparación</title>
<?php include('../header.php');
 ?>

</head>
<body>
<div class="container-fluid">

<div class="row">
<div class="col-md-12">
<h1>SELECCIONAR EL TIPO,PARA  PODER GENERAR LA RESERVA:</h1>
<hr>
</div>
</div>


<div class="row">

<div class="col-md-4">
<a href="../procesos/consultakit?tipo=kit" class="btn btn-primary btn-block btn-lg">
<i class="fa fa-plus fa-3x"></i>
kit</a>
</div>

<div class="col-md-4">
<a href="../procesos/consultakit?tipo=ass" class="btn btn-warning btn-block btn-lg">
<i class="fa fa-plus fa-3x"></i>
Ensamble</a>
</div>

<div class="col-md-4">
<a href="../procesos/consultakit?tipo=rep" class="btn btn-success btn-block btn-lg">
<i class="fa fa-plus fa-3x"></i>
kit de reparación</a>
</div>

</div>

</div>
</body>
</html>