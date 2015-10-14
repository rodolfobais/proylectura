<?php /* Smarty version Smarty-3.1.19, created on 2015-10-09 11:33:50
         compiled from ".//data/smarty/templates/editarTerapia.html" */ ?>
<?php /*%%SmartyHeaderCode:19269983045617d04ea82a39-38239842%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cafc96fe39d66829f6eceac86d3204b905561e6' => 
    array (
      0 => './/data/smarty/templates/editarTerapia.html',
      1 => 1443463643,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19269983045617d04ea82a39-38239842',
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
    'tratamientos' => 0,
    'tratamiento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5617d04eac1025_97329852',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5617d04eac1025_97329852')) {function content_5617d04eac1025_97329852($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_checkboxes')) include '/var/www/contraluz-cirer/data/smarty/libs/plugins/function.html_checkboxes.php';
?><div class="contact">
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
            <form method="POST" action="terapias.php" id="formulario" name="formulario">
                <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
                <input type="hidden" id="metodo" name="metodo" value="<?php echo $_smarty_tpl->tpl_vars['metodo']->value;?>
"/>
                <label>Nombre</label>
                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
" id="nombre" name="nombre"/>

                <?php echo smarty_function_html_checkboxes(array('name'=>"tratamiento",'options'=>$_smarty_tpl->tpl_vars['tratamientos']->value,'selected'=>$_smarty_tpl->tpl_vars['tratamiento']->value,'separator'=>"<br/>"),$_smarty_tpl);?>


                <input type="submit" value="Guardar Datos"/>
            </form>
        </div>
    <?php }?>
</div>
<?php }} ?>
