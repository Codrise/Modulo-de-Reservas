<?php /* Smarty version 3.1.24, created on 2015-12-03 17:00:04
         compiled from "../estilos/templates/header-buscar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12089941385660bb6491c5f9_65829191%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4dfdd899e77f6407c833b255baf85dfb08b5f93' => 
    array (
      0 => '../estilos/templates/header-buscar.tpl',
      1 => 1449178724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12089941385660bb6491c5f9_65829191',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5660bb6491e176_06667409',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5660bb6491e176_06667409')) {
function content_5660bb6491e176_06667409 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12089941385660bb6491c5f9_65829191';
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