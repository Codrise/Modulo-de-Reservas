<?php /* Smarty version 3.1.24, created on 2015-12-03 16:59:59
         compiled from "./estilos/templates/header-buscar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16207940245660bb60003693_24633009%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '427275da542af0d8738c2cfd3a7f6442e5549745' => 
    array (
      0 => './estilos/templates/header-buscar.tpl',
      1 => 1449178724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16207940245660bb60003693_24633009',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5660bb60005197_67993953',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5660bb60005197_67993953')) {
function content_5660bb60005197_67993953 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16207940245660bb60003693_24633009';
?>

<form class="navbar-form navbar-left" role="search" method="POST"
action='/reserva/consulta/codigo'>
<div class="form-group">
<input type="text" name="codigo" class="form-control"  placeholder="Código o descripción"  required autofocus >
</div> 
<button type="submit" class="btn btn-primary">
Buscar por  Código o Descripción
</button>
</form>
<?php }
}
?>