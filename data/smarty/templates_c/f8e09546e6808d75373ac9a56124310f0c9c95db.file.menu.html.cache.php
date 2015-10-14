<?php /* Smarty version Smarty-3.1.19, created on 2015-10-12 14:46:25
         compiled from ".//data/smarty/templates/menu.html" */ ?>
<?php /*%%SmartyHeaderCode:281969275561bf1f197a3f6-19099503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8e09546e6808d75373ac9a56124310f0c9c95db' => 
    array (
      0 => './/data/smarty/templates/menu.html',
      1 => 1443287168,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '281969275561bf1f197a3f6-19099503',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_561bf1f19bb838_10206406',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561bf1f19bb838_10206406')) {function content_561bf1f19bb838_10206406($_smarty_tpl) {?><ul class="nav1">
    <li style="background: none repeat scroll 0 0 #868e3f;padding: 9px;"><a <?php if ($_smarty_tpl->tpl_vars['menu']->value=="index") {?> class="active"<?php }?> href="index.php">Inicio</a></li>
    <li style="background: none repeat scroll 0 0 #868e3f;padding: 9px;"><a <?php if ($_smarty_tpl->tpl_vars['menu']->value=="turnos") {?> class="active"<?php }?> href="turnos.php">Turnos</a></li>
    <li style="background: none repeat scroll 0 0 #868e3f;padding: 9px;"><a <?php if ($_smarty_tpl->tpl_vars['menu']->value=="reportes") {?> class="active"<?php }?> href="#">Reportes</a></li>
    <li style="background: none repeat scroll 0 0 #868e3f;padding: 9px;"><a <?php if ($_smarty_tpl->tpl_vars['menu']->value=="asistencias") {?> class="active"<?php }?> href="asistencias.php">Asistencia</a></li>
    <li style="background: none repeat scroll 0 0 #868e3f;padding: 9px;"><a href="salir.php">Salir</a></li>
</ul><?php }} ?>
