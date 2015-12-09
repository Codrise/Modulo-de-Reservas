<style>
th,td
{
font-size: 12px;
}
</style>


<div class="table-responsive">
<table class="table table-bordered table-condensed" >
<?php
$link=  Conectarse();
$listado= mssql_query("SELECT (ROW_NUMBER() OVER(ORDER BY CODIGO))AS ITEM,
	CODIGO,ADESCRI,AUNIDAD,CANTIDAD,PRECIO,PORCENTAJE 
	FROM [022BDCOMUN].DBO.COTIZACIONES AS C INNER JOIN [010BDCOMUN].DBO.MAEART AS M
ON C.CODIGO=M.ACODIGO
 WHERE USUARIO=1",$link);
?>
<thead>
<tr class="success">
<th>IT</th>
<th>CÓDIGO</th>
<th>DESCRIPCIÓN</th>
<th>UND</th>
<th>CANT.</th>
<th>$ PRECIO</th>
<th>% DESCUENTO</th>
<th style="text-align: center"><i class="fa fa-pencil-square-o fa-2x text-primary"></i></th>
<th style="text-align: center"><i class="fa fa-trash fa-2x text-danger"></i></th>
</tr>
</thead>
<tbody>
<?php


while($reg= mssql_fetch_array($listado))
{
?>
<tr class="active">
<?php 
$txta                      ='modal-containera-';
$txtxa                     ='#modal-containera-';
$txta                      .=$j;
$txtxa                     =$txtxa.=$j;


$txt                       ='modal-container-';
$txtx                      ='#modal-container-';
$txt                       .=$i;
$txtx                      =$txtx.=$i;
?>
<td> <?php echo $reg[ITEM];    ?>    </td>
<td> <?php echo $reg[CODIGO];  ?>    </td>
<td> <?php echo utf8_encode($reg[ADESCRI]); ?>    </td>
<td> <?php echo $reg[AUNIDAD];            ?>    </td>
<td> <?php echo round($reg[CANTIDAD],2); ?>    </td>
<td> <?php echo round($reg[PRECIO],2); ?>    </td>
<td> <?php echo round($reg[PORCENTAJE],2); ?>    </td>
<td style="text-align: center">
<a id="modal-899574" href='<?php echo $txtxa;?>'
role="button" class="btn" data-toggle="modal">
<i class="fa fa-pencil-square-o fa-2x text-primary"></i></a>
</td>


<td style="text-align: center">
<a id="modal-899574" href='<?php echo $txtx;?>'
role="button" class="btn" data-toggle="modal">
<i class="fa fa-trash fa-2x text-danger"></i></a>
</td>

<!-- INICIO MODAL ACTUALIZAR -->

<form action="../procesos/cotizacion.php" method="POST">

<div class="modal fade" id="<?php echo $txta; ?>" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-primary" id="myModalLabel">
ACTUALIZAR  DATOS
</h4>
</div>
<div class="modal-body">
<div class="form-group">
<label for="">CÓDIGO:</label>
<input type="text" name="codigo" class="form-control"  readonly=""
value="<?php echo $reg[CODIGO]; ?>">
</div>

<div class="form-group">
<label for="">DESCRIPCIÓN:</label>
<input type="text" name="descripcion" class="form-control"  readonly=""
value="<?php echo  utf8_encode($reg[ADESCRI]); ?>">
</div>


<div class="form-group">
<label for="">CANTIDAD:</label>
<input type="number" name="cantidad" class="form-control" 
value="<?php echo round($reg[CANTIDAD],2); ?>" 
 step="any"  min="1"  >
</div>

<div class="form-group">
<label for="">PRECIO:</label>
<input type="number" name="precio" class="form-control" 
value="<?php echo round($reg[PRECIO],2); ?>" 
 step="any"  min="1"  >
</div>

<div class="form-group">
<label for="">DESCUENTO:</label>
<input type="number" name="descuento" class="form-control" 
value="<?php echo round($reg[PORCENTAJE],2); ?>" 
 step="any"  min="1"  >
</div>

<input type="hidden" name="tipo" value="actualizar">
</div>
<div class="modal-footer">

<button type="submit" class="btn btn-primary">
Actualizar
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button> 
</div>
</div>

</div>

</div>

</form>
<!-- FIN MODAL ACTUALIZAR-->



<!-- INICIO MODAL ELIMINAR ITEM -->

<form action="../procesos/cotizacion.php" method="POST">

<div class="modal fade" id="<?php echo $txt; ?>" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-danger" id="myModalLabel">
ELIMINAR CÓDIGO
</h4>
</div>
<div class="modal-body">

<div class="form-group">
<label for="">CÓDIGO:</label>
<input type="text" name="codigo" class="form-control"  readonly=""
value="<?php echo $reg[CODIGO]; ?>">
</div>


<div class="form-group">
<label for="">DESCRIPCIÓN:</label>
<input type="text" name="descripcion" class="form-control"  readonly=""
value="<?php echo utf8_encode($reg[ADESCRI]); ?>">
</div>

<div class="form-group">
<label for="">CANTIDAD:</label>
<input type="number" name="cantidad" class="form-control" value="<?php echo round($reg[CANTIDAD],2); ?>" 
 step="any"  min="1"  max="<?php echo round($reg[CANTIDAD],2); ?>" readonly>
</div>

<input type="hidden" name="tipo" value="eliminaritem">

</div>
<div class="modal-footer">

<button type="submit" class="btn btn-danger">
Eliminar
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button> 
</div>
</div>

</div>

</div>

</form>
<!-- FIN MODAL ELIMINAR ITEM-->





</tr>

<?php 
$i=$i+1;
$j=$j+1;
}
?>
<tbody>
</table>
</div>
