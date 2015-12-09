<?php 

include('../includes/clases/Ni.php');
include('../includes/bd/conexion.php');

 @session_start();

if ($_REQUEST['tipo']=='registrar') 
{
    $ni =  new Ni();
    $ni -> TransferirReserva($_POST['reserva'],$_POST['ni']);

}
else
{
   echo "no existe el tipo";

}




 ?>