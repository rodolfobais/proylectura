<?php /* Smarty version Smarty-3.1.19, created on 2015-09-13 00:21:47
         compiled from ".//data/smarty/templates/editarProf.html" */ ?>
<?php /*%%SmartyHeaderCode:203021348355f4ebcb1851c3-96986379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c76c724380b41f2b8c513f8188a20d2a448e36d9' => 
    array (
      0 => './/data/smarty/templates/editarProf.html',
      1 => 1441935370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203021348355f4ebcb1851c3-96986379',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nombreSubpagina' => 0,
    'mensaje' => 0,
    'id' => 0,
    'metodo' => 0,
    'nombre' => 0,
    'apellido' => 0,
    'datospersonales' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55f4ebcb19f271_32114541',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f4ebcb19f271_32114541')) {function content_55f4ebcb19f271_32114541($_smarty_tpl) {?>	<div class="contact">

			<h3><?php echo $_smarty_tpl->tpl_vars['nombreSubpagina']->value;?>
</h3>
			<?php if ($_smarty_tpl->tpl_vars['mensaje']->value!='') {?>
			

			<div class="footer-text">
				<div class="container">
					<h3><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</h3>
					
				</div>
			</div>	


			<?php }?>
			<div class="contact-form">
				<form method="POST" action="profesionales.php" id="formulario" name="formulario"/>
					<input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
					<input type="hidden" id="metodo" name="metodo" value="<?php echo $_smarty_tpl->tpl_vars['metodo']->value;?>
"/>
					<label>Nombre</label>
					<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
" id="nombre" name="nombre"/>
					<label>Apellido</label>
					<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['apellido']->value;?>
" id="apellido" name="apellido"/>
					<label>Datos Personales</label>
					<textarea type="text" required="" id="datospersonales" name="datospersonales"><?php echo $_smarty_tpl->tpl_vars['datospersonales']->value;?>
</textarea>
					<input type="submit" value="Guardar Datos"/>
				</form>
			</div>

	</div>
<?php }} ?>
