<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Kit de Reparación</title>
<?php include('../header.php'); ?>
</head>
<body>
<div class="container-fluid">
<div class="row">

<form action="../procesos/registrarconsultarkit.php" method="POST">

<input type="hidden" name="tipo" value="rep">

<div class="col-md-12">
<h3 class="text-success">CONSULTAR KIT DE REPARACIÓN</h3>

<div class="form-group">
<select name="codigo" class="form-control"required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$SQL="SELECT CODKIT,KDESCRI FROM  KITS_REPARACION  WHERE  KUNIDAD='REP'
ORDER BY CODKIT";
$RESULT=mssql_query($SQL) or die(mssql_error());
while ($row=mssql_fetch_array($RESULT)) {
?>
<option value ="<?php echo $row['CODKIT']?>">
<?php echo  $row['CODKIT'].' - '.$row['KDESCRI']?></option>
<?php }?>
</select>
</div>

<div class="form-group">
<button class="btn btn-success btn-block btn-lg">Consultar</button>
</div>



</div>

</form>

</div>
</div>	
</body>
</html>