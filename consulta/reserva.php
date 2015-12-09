<!DOCTYPE html>
<html>
<head>
<title>RESERVA</title>
<?php include('../header.php'); ?>
<meta charset="UTF-8">
<!--    ESTILO GENERAL   -->
<link type="text/css" href="css/style.css" rel="stylesheet" />
<!--    ESTILO GENERAL    -->
<!--    JQUERY   -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="funcion/reserva.js"></script>
<!--    JQUERY    -->
<!--    FORMATO DE TABLAS -->  
<link type="text/css" href="css/demo_table.css" rel="stylesheet" /> 
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<!--    FORMATO DE TABLAS    -->

</head>
<body>
<?php 
include('../includes/clases/Reserva.php');
$reserva = new Reserva();
?>
<div class="container-fluid">

<div class="row">

<div class="col-md-6">
<?php include('../form/reserva-ot.php'); ?>
</div>

<div class="col-md-6">
<?php include('../form/reserva-cc.php'); ?>
</div>


</div>


<div class="row">
<div class="col-md-12">
<article id="contenido">
</article>
</div>
</div>
</div>

</body>
</html>


