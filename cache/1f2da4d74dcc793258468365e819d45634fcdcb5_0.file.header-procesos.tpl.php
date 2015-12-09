<?php /* Smarty version 3.1.24, created on 2015-12-03 17:00:01
         compiled from "../estilos/templates/header-procesos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:10456044825660bb617b4707_37937885%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f2da4d74dcc793258468365e819d45634fcdcb5' => 
    array (
      0 => '../estilos/templates/header-procesos.tpl',
      1 => 1449178724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10456044825660bb617b4707_37937885',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5660bb617b8024_66269291',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5660bb617b8024_66269291')) {
function content_5660bb617b8024_66269291 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '10456044825660bb617b4707_37937885';
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