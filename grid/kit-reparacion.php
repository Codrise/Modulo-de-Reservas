<table class="table table-bordered table-condensed">
<thead>
<tr class="info">
<th>CÓDIGO ARTICULO</th>
<th>DESCRIPCIÓN</th>
<th>UND</th>
<th>CANTIDAD</th>
<th>FECHA</th>
<th><i class="fa fa-trash text-danger fa-2x"></i></th>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT  IDKITS_REPARACION,CODART,CODKIT,CANART,KDESCRI,
KUNIDAD,FECHA_CREACION FROM  
KITS_REPARACION WHERE CODKIT='$_GET[id]' AND  KUNIDAD<>'REP'
ORDER BY KDESCRI
";  
$result= mssql_query($sql) or die(mssql_error());
if(mssql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mssql_fetch_array($result))
{?>

<tbody>
<tr>
<td><?php echo $row['CODART']; ?></td>
<td><?php echo $row['KDESCRI']; ?></td>
<td><?php echo $row['KUNIDAD']; ?></td>
<td><?php echo $row['CANART']; ?></td>
<td><?php echo $row['FECHA_CREACION']; ?></td>
<td><a href="../procesos/kit-reparacion.php?id=<?php echo $row[CODKIT];?>&
codigo=<?php echo $row[CODART];?>&tipo=eliminararticulo">
<i class="fa fa-trash text-danger fa-2x"></i></a></td>
</tr>
<?php 

}
 ?>
</tbody>
</table>