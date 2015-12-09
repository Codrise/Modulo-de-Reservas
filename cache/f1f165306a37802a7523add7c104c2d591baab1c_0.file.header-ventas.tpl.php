<?php /* Smarty version 3.1.24, created on 2015-12-03 17:00:01
         compiled from "../estilos/templates/header-ventas.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:8958483985660bb617ba749_76769722%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1f165306a37802a7523add7c104c2d591baab1c' => 
    array (
      0 => '../estilos/templates/header-ventas.tpl',
      1 => 1449178725,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8958483985660bb617ba749_76769722',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5660bb617bd494_31588031',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5660bb617bd494_31588031')) {
function content_5660bb617bd494_31588031 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '8958483985660bb617ba749_76769722';
?>
<ul class="nav navbar-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ventas<strong class="caret"></strong></a>
<ul class="dropdown-menu">
<li>
<a href="/reserva/ventas/empresa">Consultar  RQ  de  Oveprime y Rockdrill</a>
</li>
<li class="divider">
</li>
<li>
<a href="/reserva/procesos/cotizacion?tipo=liberarcarga">Cargar Excel</a>
</li>
<li class="divider">
</li>
<li>
<a href="/reserva/ventas/consulta-carga">Consulta de Carga</a>
</li>
<li class="divider">
</li>
<li>
<a href="/reserva/consulta/reserva-ventas">Reservas</a>
</li>
</ul>
</li>
</ul>
<?php }
}
?>