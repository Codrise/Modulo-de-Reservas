<?php 
include('../includes/clases/Cotizacion.php');
include('../includes/bd/conexion.php');
session_start();
$cotizacion  = new Cotizacion();

$correlativocotizacion=sprintf("%0".'7'."s",$_POST['cotizacion']);

/*Obtener el  T/C del dia*/
$link=Conectarse();
$sql="SELECT TOP 1  TIPOCAMB_VENTA FROM [010BDCONTABILIDAD].DBO.TIPO_CAMBIO  WHERE  
TIPOMON_CODIGO='ME' ORDER  BY TIPOCAMB_FECHA DESC ";
$result=mssql_query($sql);
$row=mssql_fetch_array($result);
$tipocambio=$row['TIPOCAMB_VENTA'];


if ($_REQUEST['tipo']=='registrar') 
{
	$cotizacion->Registrar($_POST['cotizacion'],$tipocambio,$igv1,$igv2,$igv3,$_SESSION['id_usuario']);
}
else if ($_REQUEST['tipo']=='liberarcarga') 
{
	$cotizacion->LiberarCarga($_SESSION['id_usuario']);
}
else if ($_REQUEST['tipo']=='actualizar') 
{
	$cotizacion->Actualizar($_POST['codigo'],$_POST['cantidad'],$_POST['precio'],$_POST['descuento'],$_SESSION['id_usuario']);
}
else if ($_REQUEST['tipo']=='eliminaritem') 
{
	$cotizacion->EliminarItem($_POST['codigo'],$_SESSION['id_usuario']);
}

else if ($_REQUEST['tipo']=='actualizarcotizacion') 
{
	$cotizacion->ActualizarCotizacion($_POST['reserva'],$correlativocotizacion);
	
}

else 
{
	echo "no existe el tipo";
}



 ?>