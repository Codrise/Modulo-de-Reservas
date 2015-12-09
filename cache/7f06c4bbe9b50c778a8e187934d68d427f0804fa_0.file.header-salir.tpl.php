<?php /* Smarty version 3.1.24, created on 2015-12-03 17:00:04
         compiled from "../estilos/templates/header-salir.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17220074945660bb64920026_69320141%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f06c4bbe9b50c778a8e187934d68d427f0804fa' => 
    array (
      0 => '../estilos/templates/header-salir.tpl',
      1 => 1449178724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17220074945660bb64920026_69320141',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5660bb64925d34_68409097',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5660bb64925d34_68409097')) {
function content_5660bb64925d34_68409097 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17220074945660bb64920026_69320141';
?>
<ul class="nav navbar-nav navbar-right">
<li>
<a href="#">
<i class="glyphicon glyphicon-user text-success"></i>
<?php echo $_SESSION['nombres'];?>
 <?php echo $_SESSION['apellidos'];?>
</a>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong class="caret"></strong></a>
<ul class="dropdown-menu">
<li>
<a href="/reserva/procesos/acceso?tipo=salir">Salir</a>
</li>
</ul>
</li>
</ul><?php }
}
?>