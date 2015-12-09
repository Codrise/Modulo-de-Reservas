<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registrar Requerimiento de Compra</title>
<?php include('../header.php'); ?>
</head>
<body>
<div class="container-fluid">
<form action="../procesos/rqcompra.php" method="POST">
<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-5">
<h2 class="text-primary">Ingrese el número de RQ de Compra:</h2>
<hr>
<div class="form-group">
<input type="number"  name="nrorequi" min="1"
 placeholder="Ejemplo: 2508" class="form-control" autofocus required>
</div>
<input type="hidden" name="tipo" value="existe"> 
<button class="btn btn-primary">Registrar</button>
</div>
</div>
</form>
</div>
</body>
</html>