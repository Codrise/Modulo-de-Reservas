<?php 
include('../includes/clases/Kit.php');
include('../includes/clases/Kitreparacion.php');
include('../includes/clases/Ensamble.php');
include('../includes/bd/conexion.php');
@session_start();

if ($_REQUEST['tipo']=='kit')
 {
	$kit = new Kit();
	$kit->Registrar($_REQUEST['codigo'],$_SESSION['id_usuario']);
 }
else if ($_REQUEST['tipo']=='ass') 
{
	$ensamble = new Ensamble();
	$ensamble->Registrar($_REQUEST['codigo'],$_SESSION['id_usuario']);
}
else if ($_REQUEST['tipo']=='rep') 
{
	$kitreparacion = new Kitreparacion();
	$kitreparacion->Registrar($_REQUEST['codigo'],$_SESSION['id_usuario']);
}
else
{
	echo "codigo no admitido";
}




 ?>