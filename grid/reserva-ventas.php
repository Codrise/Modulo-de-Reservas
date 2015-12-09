<div class="table-responsive">
<table class="table table-bordered table-condensed" >
<?php
$link=  Conectarse();
$listado= mssql_query("SELECT (ROW_NUMBER() OVER(ORDER BY ADESCRI))AS ITEM,
	D.IDRESERVA_DET,D.NRORESERVA,D.CODIGO,D.CANTIDAD,
	M.ADESCRI,M.AUNIDAD,D.PRECIO,D.COTIZACION,D.CANT_PEND
FROM [022BDCOMUN].DBO.RESERVA_DET  AS D  INNER JOIN 
[010BDCOMUN].DBO.MAEART AS M  ON D.CODIGO=M.ACODIGO WHERE  NRORESERVA='$idreserva'",$link);
?>
<thead>
<tr class="success">
<th>ITEM</th>
<th>CÓDIGO</th>
<th>DESCRIPCIÓN</th>
<th>CANTIDAD</th>
<th>SALDO</th>
<th>COTIZACIÓN</th>
<th>UND</th>
</tr>
</thead>
<tbody>
<?php


while($reg= mssql_fetch_array($listado))
{
?>
<tr class="active">

<td>      <?php echo $reg[ITEM];            ?>    </td>
<td>      <?php echo $reg[CODIGO];            ?>    </td>
<td>      <?php echo utf8_encode($reg[ADESCRI]);            ?>    </td>
<td>      <?php echo $reg[CANTIDAD];          ?>    </td>
<td>      <?php echo $reg[CANT_PEND];          ?>    </td>
<td>      <?php echo $reg[COTIZACION];          ?>    </td>
<td>      <?php echo $reg[AUNIDAD];            ?>    </td>


</tr>

<?php 
}
?>
<tbody>
</table>
</div>

