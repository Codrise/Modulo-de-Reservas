<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Ensamble</title>
<?php include('../header.php'); ?>
</head>
<body>
<div class="container-fluid">
<div class="row">

<form action="../procesos/registrarconsultarkit.php" method="POST">

<input type="hidden" name="tipo" value="ass">

<div class="col-md-12">
<h3 class="text-warning">CONSULTAR ENSAMBLE</h3>

<div class="form-group">
<select name="codigo" class="form-control"required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$SQL="SELECT   K.CODKIT,M.ADESCRI FROM  [010BDCOMUN].DBO. KITS  AS  K
INNER JOIN  [010BDCOMUN].DBO.MAEART AS M 
ON K.CODKIT=M.ACODIGO AND M.AESTADO='V'
GROUP BY K.CODKIT,M.ADESCRI
ORDER BY M.ADESCRI;
";
$RESULT=mssql_query($SQL) or die(mssql_error());
while ($row=mssql_fetch_array($RESULT)) {
?>
<option value ="<?php echo $row['CODKIT']?>">
<?php echo $row['CODKIT'].' - '.utf8_encode($row['ADESCRI'])?></option>
<?php }?>
</select>
</div>

<div class="form-group">
<button class="btn btn-warning btn-block btn-lg">Consultar</button>
</div>



</div>

</form>

</div>
</div>	
</body>
</html>