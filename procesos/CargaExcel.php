<?php 

 include('../includes/bd/conexion.php');
 include('../includes/clases/CargaExcel.php');
 session_start();
 $link=Conectarse();


 if ($_REQUEST['tipo']=='total')
  {
	 $cargaexcel = new CargaExcel();
	 $cargaexcel->LiberarTotal($_SESSION['id_usuario']);
  }

else if ($_REQUEST['tipo']=='item') 
{
	$cargaexcel = new CargaExcel();
	$cargaexcel->LiberarItem($_SESSION['id_usuario'],$_GET['codigo']);
}

else if ($_REQUEST['tipo']=='registrar') 
{
	$cargaexcel = new CargaExcel();
	$cargaexcel->Registrar($_SESSION['id_usuario'],$_POST['reserva']);
}

else if ($_REQUEST['tipo']=='limpiardata') 
{
	$cargaexcel = new CargaExcel();
	$cargaexcel->LimpiarData($_SESSION['id_usuario']);
}


else 

{
   echo "no existe el tipo";

}


 ?>