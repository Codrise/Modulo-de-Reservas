<?php 
include('../includes/clases/Rqmateriales.php');
include('../includes/bd/conexion.php');
$rqmateriales = new Rqmateriales();
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Requerimiento de Materiales - <?php echo $_GET['id']; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="/reserva/assets/img/logo48.png">
<link rel="stylesheet" href="/reserva/assets/css/bootstrap.min.css">

<style>
th,td
{
	font-size: 10px;
	font-family: arial;

}
td
{
	font-size: 9px;
	font-family: arial;


}
.center
{
   text-align: center;
}
</style>


</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<ul class="nav nav-tabs">
<li>
<a href="#"> Requerimiento de Materiales</a>
</li>
<li>
<a href="#" onclick="window.print();" title="Imprimir">N° <?php echo $_GET['id']; ?></a>
</li>
<li>
<a href="#">Codrise - Comercial Drilling Services</a>
</li>
</ul>
</div>
</div>


<div class="row">
<div class="col-md-12">
<table class="table table-bordered table-condensed">
<thead>

<tr class="info">
<th>FECHA EMISIÓN:</th>
<td><?php $rqmateriales -> MostrarAtributo($_GET['id'],'FECHA'); ?></td>
<th>SOLICITANTE:</th>
<td><?php $rqmateriales -> MostrarAtributo($_GET['id'],'TDESCRI'); ?></td>
</tr>

<tr class="success">
<th>COMENTARIO:</th>
<td><?php $rqmateriales -> MostrarAtributo($_GET['id'],'REQ_GLOSA'); ?></td>
<th>JEFE DE ÁREA SOLICITANTE:</th>
<td></td>
</tr>

<tr class="active">
<th>NOTA DE SALIDA:</th>
<td></td>
<th>ENCARGADO DE ÁLMACEN:</th>
<td></td>
</tr>

</thead>
<tbody>
<tr>

</tr>
</tbody>
</table>
</div>
</div>


<div class="row">
<div class="col-md-12">
<table class="table table-bordered table-condensed">
<thead>
<tr class="info">
<th>IT</th>
<th>CÓDIGO</th>
<th>DESCRIPCIÓN</th>
<th>CANT. S.</th>
<th>SALDO</th>
<th>T. DESP</th>
<th>CANT. ENT.</th>
<th>UND</th>
<th>C.C</th>
<th>OT</th>
<th>UBIC</th>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT INVD.REQ_ITEM,INVD.ACODIGO,M.ADESCRI,M.AUNIDAD,
INVD.REQ_CANTIDAD_REQUERIDA AS CANT,
(INVD.REQ_CANTIDAD_REQUERIDA-INVD.REQ_CANTIDAD_DESPACHADA) as SALDO ,
TC.TCASILLERO,
(INVD.REQ_CANTIDAD_REQUERIDA-(INVD.REQ_CANTIDAD_REQUERIDA-INVD.REQ_CANTIDAD_DESPACHADA) )AS DESPACHO,
INVD.CENCOST_CODIGO,INVD.REQ_DEORDFAB
FROM [010BDCOMUN].DBO.INV_REQMATERIAL_CAB  AS INVC 
INNER JOIN [010BDCOMUN].DBO.INV_REQMATERIAL_DET  AS INVD 
ON INVC.REQ_NUMERO=INVD.REQ_NUMERO 
INNER JOIN [010BDCOMUN].DBO.MAEART AS M ON INVD.ACODIGO=M.ACODIGO  
LEFT JOIN [010BDCOMUN].DBO.TABCASILLERO AS TC ON 
M.ACODIGO=TC.TCODART  AND TCODALM='01'
INNER JOIN [010BDCOMUN].DBO.TABAYU AS T ON
INVC.REQ_PERSONAL_SOLIC=T.TCLAVE   WHERE 
  T.TCOD=12   AND INVC.REQ_NUMERO='$_GET[id]'
  ORDER BY TCASILLERO";
$result                                                      = mssql_query($sql) or die(mssql_error());
if(mssql_num_rows($result)                                   ==0) die("NO TENEMOS DATOS PARA MOSTRAR");

while($row                                                   =mssql_fetch_array($result))
{

?>



<tbody>
<tr>


<td> <?php  echo $row[REQ_ITEM];       ?>     </td>
<td> <?php  echo utf8_encode($row[ACODIGO]);        ?>     </td>
<td> <?php  echo utf8_encode($row[ADESCRI]);        ?>     </td>
<td class="center"> <?php  echo round($row[CANT],2);           ?>     </td>
<td class="center"> <?php  echo round($row[SALDO],2);          ?>     </td>
<td class="center"> <?php  echo  round($row[DESPACHO],2);      ?>     </td>
<td>                                          </td>
<td> <?php  echo $row[AUNIDAD];        ?>     </td>
<td> <?php  echo $row[CENCOST_CODIGO]; ?>     </td>
<td> <?php  echo $row[REQ_DEORDFAB];   ?>     </td>
<td> <?php  echo $row[TCASILLERO];     ?>     </td>


</tr>
<?php 
}?>

</tbody>
</table>
</div>
</div>



</div>
</body>
</html>