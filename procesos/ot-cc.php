<?php 

include('../includes/clases/Otcc.php');
include('../includes/bd/conexion.php');

 @session_start();

$otcc = new Otcc();

if ($_REQUEST['tipo']=='registrar') 
{
	$otcc->Registrar($_POST['ot'],$_POST['cc'],$_SESSION['id_usuario'],$_SERVER['REMOTE_ADDR']);
}


else if ($_REQUEST['tipo']=='eliminar') 
{
	$otcc->Eliminar($_GET['id']);
}


else
{
	echo "no existe el tipo";
}


 ?>