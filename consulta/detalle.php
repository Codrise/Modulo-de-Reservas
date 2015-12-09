<!DOCTYPE html>
<html>
<head>
<title>DETALLE DE CÓDIGO</title>
<?php
 include('../header.php');

session_start();

//variable de Sesion que contendra el  codigo
$_SESSION['detalle']=$_GET['detalle'];
?>

<meta charset="UTF-8">
<!--    ESTILO GENERAL   -->
<link type="text/css" href="css/style.css" rel="stylesheet" />
<!--    ESTILO GENERAL    -->
<!--    JQUERY   -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="funcion/detalle.js"></script>
<!--    JQUERY    -->
<!--    FORMATO DE TABLAS -->  
<link type="text/css" href="css/demo_table.css" rel="stylesheet" /> 
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<!--    FORMATO DE TABLAS    -->

</head>
<body>
<div class="container-fluid">

<div class="row">
<div class="col-md-12">
<h2 class="text-primary">Detalle de Código: <?php echo $_SESSION['detalle']; ?></h2>
<article id="contenido"></article>
</div>
</div>

</div>
</body>
</html>


