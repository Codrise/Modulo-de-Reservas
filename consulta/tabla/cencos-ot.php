<script type="text/javascript" language="javascript"
src="listado/cencos-ot.js"></script>
<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="cencos-ot">
<?php require_once('../../includes/bd/conexion.php');
$link=  Conectarse();
$listado=  mssql_query("SELECT (ROW_NUMBER() OVER(ORDER BY IDCENCOSOT))AS ITEM,
IDCENCOSOT,CODIGOCENTROCOSTO,CENCOST_DESCRIPCION,
CODIGOOT,CONVERT(VARCHAR,FECHA,103) as FECHA,HORA,(U.nombres+' '+U.apellidos )AS FULLNAME
FROM [022BDCOMUN].DBO.CENCOSOT AS CC INNER JOIN 
[010BDCONTABILIDAD].DBO.CENTRO_COSTOS AS CCC ON 
CC.CODIGOCENTROCOSTO=CCC.CENCOST_CODIGO INNER JOIN [022BDCOMUN].DBO.USUARIOS AS U
ON CC.USUARIO=U.id_usuario 
WHERE  CODIGOOT IN (SELECT OF_COD FROM [010BDCOMUN].dbo.ORD_FAB
WHERE OF_ESTADO ='ACTIVO')  ORDER BY CENCOST_DESCRIPCION",$link);
?>
<thead>
<tr class="info">
<th>ID</th>
<th>O/T</th>
<th>CENTRO DE COSTO</th>
<th>DESCRIPCIÓN</th>
<th>HORA</th>
<th>FECHA DE CREACIÓN</th>
<th>CREADOR</th>
<th><i class="fa fa-trash-o text-danger fa-2x"></i></th>
</tr>
</thead>
<tbody>
<?php


while($reg= mssql_fetch_array($listado))
{
?>
<tr class="active">
<td><?php echo $reg[ITEM]; ?>                </td>
<td><?php echo $reg[CODIGOOT]; ?>            </td>
<td><?php echo $reg[CODIGOCENTROCOSTO]; ?>   </td>
<td><?php echo $reg[CENCOST_DESCRIPCION]; ?> </td>
<td><?php echo $reg[HORA]; ?>                </td>
<td><?php echo $reg[FECHA]; ?>              </td>
<td><?php echo $reg[FULLNAME]; ?>            </td>
<td><a href="../procesos/ot-cc?id=<?php echo $reg[IDCENCOSOT] ?> & tipo=eliminar"
title="ELIMINAR REGISTRO">
<i class="fa fa-trash-o text-danger fa-2x"></i></a></td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
