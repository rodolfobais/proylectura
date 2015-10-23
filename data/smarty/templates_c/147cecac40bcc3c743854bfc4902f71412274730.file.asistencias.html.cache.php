<?php /* Smarty version Smarty-3.1.19, created on 2015-10-09 14:16:49
         compiled from ".//data/smarty/templates/asistencias.html" */ ?>
<?php /*%%SmartyHeaderCode:11162411115617f681f3a215-99849927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '147cecac40bcc3c743854bfc4902f71412274730' => 
    array (
      0 => './/data/smarty/templates/asistencias.html',
      1 => 1443294407,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11162411115617f681f3a215-99849927',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'titulo' => 0,
    'turnos' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5617f6820481b6_23893795',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5617f6820481b6_23893795')) {function content_5617f6820481b6_23893795($_smarty_tpl) {?><div class="container">
    <input type="hidden" name="item" id="item" value="0" />
    <h3><u><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</u></h3>
    <hr>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Terapia</th>
                            <th>Consultorio</th>
                            <th>Profesional</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th class="text-center">Asistencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['turnos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <tr>
                              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['terapia'];?>
</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['consultorio'];?>
</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['profesional'];?>
</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['fecha'];?>
</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['hora'];?>
</td>
                              <td class="text-center">
                                <a href="asistencias.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&accion=e&as=s" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-check"></span>
                                </a> &nbsp;
                                <a href="asistencias.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&accion=e&as=n" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a> &nbsp;
                              </td>
                            </tr>
                        <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
                            <tr>
                                <td colspan="7">No se encontraron registros.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>		
</div><?php }} ?>
