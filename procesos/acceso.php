<?php 
include('../includes/clases/Acceso.php');
include('../includes/bd/conexion.php');
$acceso = new Acceso($_POST['usuario'],$_POST['password']);

if ($_REQUEST['tipo']=='login') 
{

$acceso -> Login();
}

else if ($_REQUEST['tipo']=='salir') 
{
$acceso -> Salir();
}

else

{

echo "No existe el tipo";

}






?>