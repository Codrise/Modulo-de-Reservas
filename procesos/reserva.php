<?php 

include('../includes/clases/Reserva.php');
include('../includes/clases/Consultakit.php');
include('../includes/bd/conexion.php');
session_start();
$reserva     = new Reserva();
$consultakit = new Consultakit();
$usuariocorreo=$_SESSION['nombres'].' '.$_SESSION['apellidos'];

if ($_REQUEST['tipo']=='registrar')
 {
	$reserva->registrarReserva($_SESSION['starsoft'],$_POST['ot'],$_SESSION['id_usuario'],
	$_SESSION['idarea'],$_SESSION['aud_jefe'],$_POST['cc'],$_POST['tiporeserva']);
 }

else if ($_REQUEST['tipo']=='editar')
 {
	
	$reserva->EditarDetalle($_POST['codigo'],$_POST['cantidad'],$_POST['reserva']);
 }

 else if ($_REQUEST['tipo']=='reservakit')
 {
	
$consultakit->Registrar($_REQUEST['reserva'],$_REQUEST['tipokit'],$_SESSION['id_usuario']);

}

 else if ($_REQUEST['tipo']=='listacompra')
{
	
$consultakit->listaCompra($_REQUEST['tipokit'],$_SESSION['id_usuario'],$usuariocorreo);
}
 else if ($_REQUEST['tipo']=='registrarventas')
{
	
$reserva->ReservaVentas($_REQUEST['reserva'],$_REQUEST['bd'],$_REQUEST['rq']);
}
 else if ($_REQUEST['tipo']=='actualizaritem')
{
	
$reserva->ActualizarItem($_REQUEST['idreserva'],$_REQUEST['codigo'],$_REQUEST['precio']);
}
 else if ($_REQUEST['tipo']=='eliminaritem')
{
	
$reserva->EliminarItem($_REQUEST['idreserva'],$_REQUEST['codigo']);
}

 else if ($_REQUEST['tipo']=='listastock')
{
	
$reserva->ListaStock($_SESSION['id_usuario'],$usuariocorreo,$_POST['reposicion']);
}

 else if ($_REQUEST['tipo']=='reservavacia')
{
	
$reserva->EliminarReservaVacia($_GET['reserva']);
}


 else

 {
 	echo "no existe el tipo";
 }





 ?>