<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Reserva</title>
<?php 
include('../header.php');
include('../includes/clases/Reserva.php');
$idreserva=$_REQUEST['id'];
$reserva = new Reserva();
?>
</head>
<body>

<?php 
$link=Conectarse();
$sql="SELECT *  FROM [022BDCOMUN].DBO.RESERVA_CAB
WHERE NRORESERVA='$_GET[id]' AND  USUARIO='$_SESSION[id_usuario]'";
$result=mssql_query($sql);
$row=mssql_fetch_array($result);
$miusuario=$row['USUARIO'];
?>

<div class="container-fluid">
<div class="row">

<div class="col-md-3">
<?php include('../form/cotizacion-reserva.php') ?>
<?php include('../form/editar-reserva-visitante.php') ?>
</div>


<div class="col-md-9">
<?php include('../grid/reserva-ventas.php') ?>
</div>

</div>
</div>
</body>
</html>