<?php /* Smarty version Smarty-3.1.19, created on 2015-09-28 15:09:55
         compiled from ".//data/smarty/templates/editarTratamiento.html" */ ?>
<?php /*%%SmartyHeaderCode:213800508256098273320444-56800382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e8a9005bbde61fe7661a2b210a7022d075a6d03' => 
    array (
      0 => './/data/smarty/templates/editarTratamiento.html',
      1 => 1443463764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213800508256098273320444-56800382',
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
  'unifunc' => 'content_56098273344eb0_94312179',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56098273344eb0_94312179')) {function content_56098273344eb0_94312179($_smarty_tpl) {?><div class="contact">
    <h3><?php echo $_smarty_tpl->tpl_vars['nombreSubpagina']->value;?>
</h3>
    <?php if ($_smarty_tpl->tpl_vars['mensaje']->value!='') {?>
        <div class="footer-text">
            <div class="container">
                <h3><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</h3>
            </div>
        </div>	
    <?php } else { ?>
        <div class="contact-form">
            <form method="POST" action="tratamientos.php" id="formulario" name="formulario">
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
    <?php }?>
</div>
<?php }} ?>
