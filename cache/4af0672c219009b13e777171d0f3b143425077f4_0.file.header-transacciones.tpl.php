<?php /* Smarty version 3.1.24, created on 2015-12-03 16:59:59
         compiled from "./estilos/templates/header-transacciones.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:18918021775660bb5ff2c676_54535704%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4af0672c219009b13e777171d0f3b143425077f4' => 
    array (
      0 => './estilos/templates/header-transacciones.tpl',
      1 => 1449178725,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18918021775660bb5ff2c676_54535704',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5660bb5ff39ce1_22667017',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5660bb5ff39ce1_22667017')) {
function content_5660bb5ff39ce1_22667017 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18918021775660bb5ff2c676_54535704';
?>
<ul class="nav navbar-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Transacciones<strong class="caret"></strong></a>
<ul class="dropdown-menu">
<li>
<a href="/reserva/consulta/reserva">Reserva</a>
</li>
<li>
<a href="/reserva/consulta/rq-materiales">Requerimiento de Materiales</a>
</li>
<li class="divider">
</li>
<li>
<a href="/reserva/pages/consulta-kit">Kit - Ensamble - Kit de reparación</a>
</li>
<li class="divider">
</li>
<li>
<a href="/reserva/consulta/ni">Transferir por Nota de Ingreso</a>
</li>
</ul>
</li>
</ul><?php }
}
?>