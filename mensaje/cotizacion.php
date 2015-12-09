<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Cotización</title>
<?php include('../header.php'); ?>

<style>  .confirmacion{ font-size: 20em;  } </style>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-5">
<center>
<i class="fa fa-check confirmacion text-primary"></i>

<h3>
<p>Los articulos se  transfirieron correctamente a la Cotizacion 
<strong class="text-danger"><?php echo $_GET['cotizacion']; ?></strong>.
Consultar en el módulo de ventas de starsoft.</p>
<p><a class="btn btn-primary" href="/reserva/home">
<i class="fa fa-home fa-2x"></i>
Regresar al inicio</a></p>
</h3>
</center>
</div>
</div>
</div>
</body>
</html>