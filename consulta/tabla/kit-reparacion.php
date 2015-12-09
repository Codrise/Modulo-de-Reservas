<script type="text/javascript" language="javascript"
src="listado/kit-reparacion.js"></script>

<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="kit-reparacion">
<?php require_once('../../includes/bd/conexion.php');
$link=  Conectarse();
session_start();
$listado=  mssql_query("SELECT  IDKITS_REPARACION,CODART,CODKIT,CANART,
	KDESCRI,KUNIDAD,FECHA_CREACION FROM  
	[022BDCOMUN].DBO.KITS_REPARACION WHERE KUNIDAD='REP'",$link);
?>
<thead>
<tr class="info">
<th>ID</th>
<th>CÓDIGO KIT</th>
<th>DESCRIPCIÓN</th>
<th>FECHA</th>
<th><a href="#" class="btn btn-primary"><i class="fa fa-pencil fa-1x"></i></a></th>
</tr>
</thead>
<tbody>
<?php


while($reg= mssql_fetch_array($listado))
{
?>
<tr class="active">
<td><?php echo $reg[IDKITS_REPARACION]; ?></td>
<td><?php echo $reg[CODKIT]; ?></td>
<td><?php echo $reg[KDESCRI]; ?></td>
<td><?php echo $reg[FECHA_CREACION]; ?></td>
<td><a href="../pages/kit-reparacion?id=<?php echo $reg[CODKIT]; ?>" 
class="btn btn-primary"><i class="fa fa-pencil fa-1x"></i></a></td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
