<?php /* Smarty version Smarty-3.1.19, created on 2015-10-12 14:45:37
         compiled from ".//data/smarty/templates/editarTurnos.html" */ ?>
<?php /*%%SmartyHeaderCode:1241402129561bf1c1c30286-13274055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd37c97f1f8e5168f77fdc6d4b878496410c02b60' => 
    array (
      0 => './/data/smarty/templates/editarTurnos.html',
      1 => 1443285746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1241402129561bf1c1c30286-13274055',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nombreSubpagina' => 0,
    'mensaje' => 0,
    'id' => 0,
    'metodo' => 0,
    'terapias' => 0,
    'terapia' => 0,
    'consultorios' => 0,
    'consultorio' => 0,
    'profesionales' => 0,
    'profesional' => 0,
    'fecha' => 0,
    'hora' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_561bf1c1c7b0a1_21086208',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561bf1c1c7b0a1_21086208')) {function content_561bf1c1c7b0a1_21086208($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/contraluz-cirer/data/smarty/libs/plugins/function.html_options.php';
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
        <form method="POST" action="turnos.php" id="formulario" name="formulario">
            <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
            <input type="hidden" id="metodo" name="metodo" value="<?php echo $_smarty_tpl->tpl_vars['metodo']->value;?>
"/>
            
            <label>Terapia</label><br/>
            <select name="terapia">
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['terapias']->value,'selected'=>$_smarty_tpl->tpl_vars['terapia']->value),$_smarty_tpl);?>

            </select>
            <br/>
            <label>Consultorio</label><br/>
            <select name=consultorio>
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['consultorios']->value,'selected'=>$_smarty_tpl->tpl_vars['consultorio']->value),$_smarty_tpl);?>

            </select>
            <br/>
            <label>Profesional</label><br/>
            <select name=profesional>
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['profesionales']->value,'selected'=>$_smarty_tpl->tpl_vars['profesional']->value),$_smarty_tpl);?>

            </select>
            <br/>
            <label>Fecha</label>
            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['fecha']->value;?>
" id="fecha" name="fecha"/>
            <br/>
            <label>Hora</label>
            <input type="text" name="hora" id="hora" value="<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
" data-time-format="H:i"/>
            <br/>            
            <input type="submit" value="Guardar Datos"/>
        </form>
    </div>
</div>

    <script type="text/javascript">
        $('#hora').timepicker();
        $('#hora').mask('00:00:00');
        $('#fecha').datepicker({ dateFormat: 'dd/mm/y' });
    </script>
<?php }} ?>
