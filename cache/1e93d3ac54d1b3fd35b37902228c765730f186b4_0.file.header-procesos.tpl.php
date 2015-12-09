<?php /* Smarty version 3.1.24, created on 2015-12-03 16:59:59
         compiled from "./estilos/templates/header-procesos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17570930965660bb5ff3c556_70939478%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e93d3ac54d1b3fd35b37902228c765730f186b4' => 
    array (
      0 => './estilos/templates/header-procesos.tpl',
      1 => 1449178724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17570930965660bb5ff3c556_70939478',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5660bb5ff3f318_35974480',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5660bb5ff3f318_35974480')) {
function content_5660bb5ff3f318_35974480 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17570930965660bb5ff3c556_70939478';
?>
<ul class="nav navbar-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Procesos<strong class="caret"></strong></a>
<ul class="dropdown-menu">
<li>
<a href="/reserva/procesos/CargaExcel?tipo=limpiardata">Cargar desde un Excel</a>
</li>
<li>
<a href="/reserva/consulta/carga-excel">Consultar Carga</a>
</li>
<li class="divider">
</li>
<li>
<a href="/reserva/consulta/pre-requerimiento">Pre-requerimiento</a>
</li>
<li class="divider">
</li>
</li>
<li>
<a href="/reserva/consulta/kit-reparacion">Registrar Kit de Reparación</a>
</li>
<li class="divider"></li>
<li>
<a href="/reserva/consulta/cencos-ot">Asociar Ot y Centro de costo</a>
</li>
<li class="divider">
</li>
<li>
<a href="/reserva/pages/registrar-rq">Registrar RQ</a>
</li>
</ul>
</li>
</ul><?php }
}
?>