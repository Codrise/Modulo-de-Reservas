<?php 

include('../includes/clases/Consultakit.php');
include('../includes/bd/conexion.php');

 @session_start();

$consultakit = new Consultakit();

if ($_REQUEST['tipo']=='kit') 
{
	$consultakit->liberarkit();
}

else if ($_REQUEST['tipo']=='ass') {
	$consultakit->liberarass();
}
else if ($_REQUEST['tipo']=='rep') {
	$consultakit->liberarrep();
}
else if ($_REQUEST['tipo']=='eliminar') {
	
	$consultakit->EliminarId($_REQUEST['id'],$_REQUEST['tipokit']);
}
else
{
	echo "no existe el tipo";
}


 ?>