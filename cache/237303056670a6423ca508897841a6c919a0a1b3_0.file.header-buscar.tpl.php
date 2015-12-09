<?php /* Smarty version 3.1.24, created on 2015-12-03 17:00:01
         compiled from "../estilos/templates/header-buscar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:352829055660bb617bf9a0_84840503%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '237303056670a6423ca508897841a6c919a0a1b3' => 
    array (
      0 => '../estilos/templates/header-buscar.tpl',
      1 => 1449178724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '352829055660bb617bf9a0_84840503',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5660bb617c1ca4_73101964',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5660bb617c1ca4_73101964')) {
function content_5660bb617c1ca4_73101964 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '352829055660bb617bf9a0_84840503';
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