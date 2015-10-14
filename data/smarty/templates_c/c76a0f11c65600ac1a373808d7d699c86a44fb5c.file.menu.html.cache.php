<?php /* Smarty version Smarty-3.1.19, created on 2015-09-13 01:27:53
         compiled from ".//data/smarty/templates/menu.html" */ ?>
<?php /*%%SmartyHeaderCode:202847339255f4fb49383c45-01553957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c76a0f11c65600ac1a373808d7d699c86a44fb5c' => 
    array (
      0 => './/data/smarty/templates/menu.html',
      1 => 1441935370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202847339255f4fb49383c45-01553957',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55f4fb493aabc1_43253754',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f4fb493aabc1_43253754')) {function content_55f4fb493aabc1_43253754($_smarty_tpl) {?>				  <ul class="nav1">
						<li><a <?php if ($_smarty_tpl->tpl_vars['menu']->value=="index") {?> class="active"<?php }?> href="index.php">Inicio</a></li>
						<li><a <?php if ($_smarty_tpl->tpl_vars['menu']->value=="reportes") {?> class="active"<?php }?> href="reportes.php">Reportes</a></li>
						<li><a <?php if ($_smarty_tpl->tpl_vars['menu']->value=="services") {?> class="active"<?php }?> href="services.html">Services</a></li>
						<li><a <?php if ($_smarty_tpl->tpl_vars['menu']->value=="news") {?> class="active"<?php }?> href="news.html">News</a></li>
						<li><a <?php if ($_smarty_tpl->tpl_vars['menu']->value=="contacto") {?> class="active"<?php }?> href="contact.html">Contact</a></li>
						<li><a href="salir.php">Salir</a></li>
					</ul><?php }} ?>
