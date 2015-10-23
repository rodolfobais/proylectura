<?php /* Smarty version Smarty-3.1.19, created on 2015-10-12 14:07:29
         compiled from ".//data/smarty/templates/editarPacientes.html" */ ?>
<?php /*%%SmartyHeaderCode:1660768782561be8d123dee4-33711606%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79f9ac5cdb68600d2441b85d6d67bf253fe9f69c' => 
    array (
      0 => './/data/smarty/templates/editarPacientes.html',
      1 => 1442666715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1660768782561be8d123dee4-33711606',
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
    'obrassociales' => 0,
    'obrasocial' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_561be8d127c176_03375200',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561be8d127c176_03375200')) {function content_561be8d127c176_03375200($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/contraluz-cirer/data/smarty/libs/plugins/function.html_options.php';
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


    <?php }?>
    <div class="contact-form">
        <form method="POST" action="pacientes.php" id="formulario" name="formulario"/>
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
            <label>Obra social</label>
            <select name=obrasocial>
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['obrassociales']->value,'selected'=>$_smarty_tpl->tpl_vars['obrasocial']->value),$_smarty_tpl);?>

            </select>
            <input type="submit" value="Guardar Datos"/>
        </form>
    </div>
</div>
<?php }} ?>
