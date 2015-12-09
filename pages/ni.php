<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Detalle Nota de Ingreso</title>
<?php
@session_start();
include('../header.php'); 

$link=Conectarse();
$sql="SELECT MC.CANUMDOC AS  NI,
	OC_SOLICITA,TDESCRI,CONVERT(VARCHAR,MC.CAFECDOC,103)AS FECHA,
	OC_ORDFAB AS OT FROM  [010BDCOMUN].DBO.COMOVC AS C INNER JOIN 
[010BDCOMUN].DBO.MOVALMCAB AS MC ON C.OC_CNUMORD=MC.CANUMORD  INNER JOIN 
[022BDCOMUN].DBO.AUD_RQ AS A ON 
C.OC_CNRODOCREF=A.NROREQUI INNER JOIN 
[010BDCOMUN].DBO.TABAYU AS T ON C.OC_SOLICITA=T.TCLAVE AND TCOD='12'
INNER JOIN [022BDCOMUN].DBO.CENCOSOT  AS O ON 
OC_ORDFAB=O.CODIGOOT
WHERE C.OC_CSITORD IN ('03','04')AND C.OC_CDOCREF='RQ'
AND MC.CAALMA='01' AND MC.CATD='NI' AND CACODMOV='CL' 
AND MC.CASITGUI='V' AND MC.CANUMDOC='$_GET[ni]' AND 
MC.CANUMDOC  NOT IN (SELECT NRODOCUMENTO FROM 
[022BDCOMUN].DBO.DOCUMENTO ) ORDER BY MC.CANUMDOC";
$result=mssql_query($sql);
$row=mssql_fetch_array($result);
$IdSolicitante=$row['OC_SOLICITA'];
$Solicitante=$row['TDESCRI'];
$Ot=$row['OT'];


?>
</head>
<body>
<div class="container-fluid">
<div class="row">
<form action="../procesos/ni" method="POST">
<div class="col-md-3">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">
Detalle
</h3>
</div>
<div class="panel-body">

<input type="hidden"  value="registrar" name="tipo">

<div class="form-group">
<label for="">SOLICITANTE:</label>
<input type="text" name="" class="form-control" value="<?php echo $Solicitante; ?>" readonly>
</div>

<div class="form-group">
<label for="">NOTA DE INGRESO:</label>
<input type="text" name="ni" class="form-control" value="<?php echo $_GET['ni']; ?>" readonly> 
</div>

<div class="form-group">
<label for="">OT:</label>
<input type="text" name="" class="form-control" value="<?php echo $Ot; ?>" readonly>
</div>

<div class="form-group">
<label for="">RESERVA:</label>
<select name="reserva" class="form-control" required>
<option value="">SELECCIONE LA RESERVA...</option>
<?php
$link=Conectarse();
$Sql ="SELECT C.NRORESERVA,(T.TDESCRI) AS DESCRI ,C.OT,C.CENTROCOSTO from [022BDCOMUN].DBO.RESERVA_CAB AS C
INNER JOIN [010BDCOMUN].DBO.TABAYU AS T ON
C.SOLICITANTE=T.TCLAVE WHERE   T.TCOD=12  AND  C.USUARIO='$_SESSION[id_usuario]' AND
ESTADO='00'  AND C.OT='$Ot'AND C.NRORESERVA NOT IN 
(SELECT NRORESERVA FROM [022BDCOMUN].DBO.RESERVA_DET) 
ORDER BY  C.NRORESERVA";
$result=mssql_query($Sql) or die(mssql_error());
while ($row=mssql_fetch_array($result)) {
?>
<option    value="<?php echo $row['NRORESERVA']?>">
<?php echo $row['NRORESERVA'].'-->'.$row['DESCRI'].'-->'.$row['OT'].$row['CENTROCOSTO']?></option>
<?php }?>

</select>
</div>
</div>
<div class="panel-footer">

<?php 

if ($IdSolicitante==$_SESSION['starsoft'])
 {
     echo "<button type='submit' class='btn btn-success btn-block'>Transferir</button>";	

 }

else
{
	echo "";
}

 ?>

</div>
</div>
</div>
</form>
<div class="col-md-9">
<?php include('../grid/detalle-ni.php'); ?>
</div>

</div>
</div>
</body>
</html>