<?php 

@session_start();




include('includes/libs/Smarty.class.php');

$template = new Smarty(0);

$template->display('acceso.tpl');




 ?>