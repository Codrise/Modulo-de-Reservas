<?php /* Smarty version 3.1.24, created on 2015-12-03 16:59:59
         compiled from "./estilos/templates/header-salir.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:11778222755660bb60007033_28427857%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '841a545eddbdc9f3074ad6473aeeef29b3c97aaa' => 
    array (
      0 => './estilos/templates/header-salir.tpl',
      1 => 1449178724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11778222755660bb60007033_28427857',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5660bb6000cb57_92677706',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5660bb6000cb57_92677706')) {
function content_5660bb6000cb57_92677706 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '11778222755660bb60007033_28427857';
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