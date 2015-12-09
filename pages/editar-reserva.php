<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Reserva</title>
<?php 
include('../header.php');
include('../includes/clases/Reserva.php');
include('../includes/clases/Rqmateriales.php');
include('../includes/clases/Otcc.php');
$idreserva=$_REQUEST['id'];
$reserva = new Reserva();
$rqmateriales = new Rqmateriales();
$otcc = new Otcc();
?>
<script src="script.js" ></script>
</head>
<body>

<?php //echo "Mi sesion:".$_SESSION['id_usuario']; ?>

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
<?php 

if ($miusuario==$_SESSION['id_usuario'])
{
?>
<?php include('../form/rq-de-materiales.php') ?>
<?php include('../form/editar-reserva.php') ?>
<?php
}
else
{
?>
<?php include('../form/editar-reserva-visitante.php') ?>
<?php
}

?>

</div>


<div class="col-md-9">
<?php include('../grid/reserva.php') ?>
</div>

</div>
</div>
</body>
</html>