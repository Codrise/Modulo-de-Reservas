<script type="text/javascript" language="javascript"
src="listado/pre-requerimiento.js"></script>

<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="pre-requerimiento">
<?php require_once('../../includes/bd/conexion.php');
$link=  Conectarse();
session_start();
$listado=  mssql_query("SELECT (ROW_NUMBER() OVER(ORDER BY PR.CODIGOPRE_REQUISD))AS ITEM,
PR.IDPRE_REQUISD,PR.CODIGOPRE_REQUISD,M.ADESCRI,M.AUNIDAD,PR.CANTPRE_REQUISD,
PR.OT,PR.CENTROCOSTO
FROM PRE_REQUISD AS  PR INNER JOIN [010BDCOMUN].DBO.MAEART AS M 
ON PR.CODIGOPRE_REQUISD=M.ACODIGO WHERE  USUARIO='$_SESSION[id_usuario]'
",$link);
?>
<thead>
<tr class="info">
<th width="10">IT</th>
<th width="100">CÓDIGO</th>
<th width="200">DESCRIPCIÓN</th>
<th width="100">CANTIDAD</th>
<th width="100">UND</th>
<th width="100">OT</th>
<th width="100">CENTRO COSTO</th>
<th width="100">ACTUALZAR INFORMACIÓN</th>
<th width="10"><a href="#" class="btn btn-danger"><i class="fa fa-trash-o fa-1x"></i></a></th>
</tr>
</thead>
<tbody>
<?php


while($reg= mssql_fetch_array($listado))
{
?>
<tr class="active">
<td><?php echo $reg[ITEM]; ?></td>
<td><?php echo $reg[CODIGOPRE_REQUISD]; ?></td>
<td><?php echo utf8_encode($reg[ADESCRI]); ?></td>
<td><?php echo $reg[CANTPRE_REQUISD]; ?></td>
<td><?php echo $reg[AUNIDAD]; ?></td>
<td><?php echo $reg[OT]; ?></td>
<td><?php echo $reg[CENTROCOSTO]; ?></td>
<td>
<form class="navbar-form navbar-left" role="search" method="POST"
action='/reserva/procesos/rqcompra.php'>
<input type="hidden" name="id"  value="<?php echo $reg[IDPRE_REQUISD]; ?>">
<input type="hidden" name="tipo" value="actualizaritem">
<div class="form-group">
<select name="ot" id="" class="form-control">
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$Sql ="SELECT (ROW_NUMBER() OVER(ORDER BY IDCENCOSOT))AS ITEM,
IDCENCOSOT,CODIGOCENTROCOSTO,CENCOST_DESCRIPCION,
CODIGOOT,CONVERT(VARCHAR,FECHA,103) as FECHA,HORA,(U.nombres+' '+U.apellidos )AS FULLNAME
FROM [022BDCOMUN].DBO.CENCOSOT AS CC INNER JOIN 
[010BDCONTABILIDAD].DBO.CENTRO_COSTOS AS CCC ON 
CC.CODIGOCENTROCOSTO=CCC.CENCOST_CODIGO INNER JOIN [022BDCOMUN].DBO.USUARIOS AS U
ON CC.USUARIO=U.id_usuario 
WHERE  CODIGOOT IN (SELECT OF_COD FROM [010BDCOMUN].dbo.ORD_FAB
WHERE OF_ESTADO ='ACTIVO')  ORDER BY CENCOST_DESCRIPCION";
$result=mssql_query($Sql) or die(mssql_error());
while ($row=mssql_fetch_array($result)) {
?>
<option class="text-primary"value="<?php echo $row['CODIGOOT']?>">
<?php echo $row['CODIGOOT'];?></option>
<?php }?>
</select>
</div> 
<button type="submit" class="btn btn-primary">
Actualizar
</button>
</form>

</td>
<td><a href="../procesos/rqcompra?id=<?php echo $reg[IDPRE_REQUISD]; ?>&
tipo=eliminaritem" 
class="btn btn-danger"><i class="fa fa-trash-o fa-1x"></i></a></td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
