<?php 
include('../includes/clases/Rqcompra.php');
include('../includes/bd/conexion.php');
session_start();
$rqcompra= new Rqcompra();

/*Obtener el formato correcto del RQ*/
$RQ=sprintf("%0".'10'."s",$_POST['nrorequi']);

/*Obtener el centro  de costo*/
$link=Conectarse();
$sql="SELECT * FROM CENCOSOT WHERE  CODIGOOT='$_POST[ot]'";
$result=mssql_query($sql);
$row=mssql_fetch_array($result);
$cc=$row['CODIGOCENTROCOSTO'];


if ($_REQUEST['tipo']=='registrar') 
{

$rqcompra -> Registrar($_POST['nrorequi'],$_SESSION['id_usuario'],$_POST['nromaquina'],
	$_SESSION['starsoft']);
}
else if  ($_REQUEST['tipo']=='actualizaritem') 
{

$rqcompra -> ActualizarItem($_POST['id'],$_POST['ot'],$cc);
}

else if  ($_REQUEST['tipo']=='eliminaritem') 
{

$rqcompra -> EliminarItem($_GET['id']);
}


else  if ($_REQUEST['tipo']=='existe') 
{

$rqcompra -> Existe($RQ,$_SESSION['id_usuario'],$_SESSION['starsoft']);

}
else

{

echo "No existe el tipo";

}






?>