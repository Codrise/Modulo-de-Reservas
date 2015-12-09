<?php 

include('../includes/clases/Kitreparacion.php');
include('../includes/bd/conexion.php');

if ($_REQUEST['tipo']=='crear') 
{
    $Kitreparacion =  new Kitreparacion();
    $Kitreparacion -> Crear($_POST['codigo'],$_POST['descripcion']);

}
else if($_REQUEST['tipo']=='agregararticulo') 
{
    $kitreparacion =  new Kitreparacion();
    $kitreparacion -> AgregarArticulo($_POST['kit'],$_POST['codigo'],$_POST['cantidad']);

}

else if($_REQUEST['tipo']=='eliminararticulo') 
{
    $kitreparacion =  new Kitreparacion();
    $kitreparacion -> EliminarArticulo($_GET['id'],$_GET['codigo']);

}
else
{
   echo "no existe el tipo";

}


 ?>