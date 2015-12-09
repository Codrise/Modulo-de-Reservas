<table class="table table-bordered table-condensed">
<thead>
<tr class="success">
<th>IT</th>
<th>CÓDIGO <?php echo strtoupper($_GET['tipo']); ?></th>
<th>CÓDIGO ARTICULO</th>s
<th>CANT  <?php echo strtoupper($_GET['tipo']); ?></th>
<th>DESCRIPCIÓN</th>
<th>UND</th>
<th>CANT RESV.</th>
<th>CANT DISP.</th>
<th><i class="fa fa-trash text-danger fa-3x"></i></th>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT K.IDKIT,
 (ROW_NUMBER() OVER(ORDER BY ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0)) DESC))AS
 ITEM,SUM(ISNULL(D.CANT_PEND,0)) AS CANT_RESERV,
ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0)) AS CANT_DISP,
 K.CODART,K.CODKIT,K.CANTIDAD,K.DESCRIPCION,K.UNIDAD,K.TIPO
  FROM [022BDCOMUN].DBO.KIT  AS K  INNER JOIN 
[010BDCOMUN].DBO.STKART AS S ON 
K.CODART=S.STCODIGO AND S.STALMA='01' LEFT JOIN 
[022BDCOMUN].DBO.RESERVA_DET AS D ON 
K.CODART=D.CODIGO   WHERE K.USUARIO=$_SESSION[id_usuario] AND  TIPO='$_GET[tipo]'
GROUP BY  K.IDKIT,K.CODART,K.CODKIT,K.CANTIDAD,K.DESCRIPCION,K.UNIDAD,K.TIPO,S.STSKDIS";  
$result= mssql_query($sql) or die(mssql_error());
if(mssql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mssql_fetch_array($result))
{?>

<tbody>
<tr>
<td><?php echo $row['ITEM']; ?></td>
<td><?php echo $row['CODKIT']; ?></td>
<td><?php echo $row['CODART']; ?></td>
<td><?php echo round($row['CANTIDAD'],2); ?></td>
<td><?php echo $row['DESCRIPCION']; ?></td>
<td><?php echo $row['UNIDAD']; ?></td>
<td><?php echo $row['CANT_RESERV']; ?></td>
<td><?php echo $row['CANT_DISP']; ?></td>
<td><a href="../procesos/consultakit.php?id=<?php echo $row[IDKIT];?>&
tipo=<?php echo $tipo;?>&tipokit=<?php echo $tipokit;?>"><i class="fa fa-trash text-danger fa-2x"></i></a></td>
</tr>
<?php 

}
 ?>
</tbody>
</table>