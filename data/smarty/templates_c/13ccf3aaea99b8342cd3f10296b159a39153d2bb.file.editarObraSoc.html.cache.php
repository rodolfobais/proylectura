<?php /* Smarty version Smarty-3.1.19, created on 2015-09-19 09:37:31
         compiled from ".//data/smarty/templates/editarObraSoc.html" */ ?>
<?php /*%%SmartyHeaderCode:17456921055fd570b509c51-76794741%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13ccf3aaea99b8342cd3f10296b159a39153d2bb' => 
    array (
      0 => './/data/smarty/templates/editarObraSoc.html',
      1 => 1442664813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17456921055fd570b509c51-76794741',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55fd570b52e139_71042070',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55fd570b52e139_71042070')) {function content_55fd570b52e139_71042070($_smarty_tpl) {?><div class="contact">
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
    <form method="POST" action="obrassociales.php" id="formulario" name="formulario"/>
        <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
        <input type="hidden" id="metodo" name="metodo" value="<?php echo $_smarty_tpl->tpl_vars['metodo']->value;?>
"/>
        <label>Nombre</label>
        <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
" id="nombre" name="nombre"/>
        <input type="submit" value="Guardar Datos"/>
    </form>
    </div>

</div>
<?php }} ?>
