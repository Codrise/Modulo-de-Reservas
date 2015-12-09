<?php 


include('../includes/clases/Rqmateriales.php');
include('../includes/bd/conexion.php');

session_start();
$rqmateriales  = new Rqmateriales();

$centrocosto=$_POST['cc'].$_POST['ccot'];
 $fecha=date("2015/10/29");


$rqmateriales->Registrar($_POST['requerimiento'],$_POST['reserva'],	$_POST['ot'],
	$centrocosto,$_SESSION['starsoft'],$_POST['glosa'],$fecha);

 ?>


