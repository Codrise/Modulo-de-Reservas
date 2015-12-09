<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Acceso</title>

<meta name="description" content="Source code generated using layoutit.com">
<meta name="author" content="LayoutIt!">

<link href="/reserva/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="/reserva/assets/css/style.css" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="/reserva/assets/img/logo48.png">

</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<form action="procesos/acceso.php" method="POST">

<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<h1 class="modal-title text-center text-primary" id="myModalLabel">
Modulo Reserva
</h1>
</div>
<div class="modal-body">

<div class="form-group">
<input type="text" name="usuario" id="" class="form-control" placeholder="Usuario" required autofocus>
</div>

<div class="form-group">
<input type="password" name="password" id="" class="form-control" placeholder="Contraseña" required>
</div>

<input type="hidden" name="tipo" value="login">

</div>
<div class="modal-footer">

<button type="submit" class="btn btn-primary">
Ingresar
</button>
</div>
</div>

</div>


</form>


</div>
</div>
</div>

<script src="/reserva/assets/js/jquery.min.js"></script>
<script src="/reserva/assets/js/bootstrap.min.js"></script>
<script src="/reserva/assets/js/scripts.js"></script>
</body>
</html>