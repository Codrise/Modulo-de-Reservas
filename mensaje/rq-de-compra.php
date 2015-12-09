<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Requerimento de Compra</title>
<?php include('../header.php'); ?>

<style>  .confirmacion{ font-size: 25em;  } </style>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-5">
<center>
<i class="fa fa-thumbs-up confirmacion text-primary"></i>

<h3>
<p>Los articulos se  transfirieron correctamente al requerimiento
<strong class="text-danger"><?php echo $_GET['nrorequi']; ?></strong>.
Consultar en el módulo de compras de starsoft.</p>
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