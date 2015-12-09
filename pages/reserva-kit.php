<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Generar Reserva</title>
<?php 
include('../header.php');
@session_start();
$tipo="eliminar";
$tipokit=$_GET['tipo'];
?>
</head>
<body>
<div class="container-fluid">

<div class="row">
<div class="col-md-12">
<h3 class="text-success">
<?php
 if ($_GET['msj']=='ok')
  {
  	echo "La  lista de verificación fue enviada correctamente".
  	"<i class='fa fa-check fa-3x'></i>";
  } 
  else
  {
  	echo "";
  }
 ?>
 </h3>
</div>
</div>


<div class="row">

<div class="col-md-6">
<?php include('../form/reserva-kit.php'); ?>
</div>
<div class="col-md-4"> </div>

<div class="col-md-2">
<?php include('../form/enviocorreo.php'); ?>
</div>

</div>



<div class="row">
<div class="col-md-12">
<?php include('../grid/reserva-kit.php'); ?>
</div>
</div>
</div>

</body>
</html>