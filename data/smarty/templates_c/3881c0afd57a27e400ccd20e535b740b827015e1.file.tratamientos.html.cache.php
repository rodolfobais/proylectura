<?php /* Smarty version Smarty-3.1.19, created on 2015-10-12 14:02:33
         compiled from ".//data/smarty/templates/tratamientos.html" */ ?>
<?php /*%%SmartyHeaderCode:2023759273561be7a94eeed0-15667034%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3881c0afd57a27e400ccd20e535b740b827015e1' => 
    array (
      0 => './/data/smarty/templates/tratamientos.html',
      1 => 1444180803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2023759273561be7a94eeed0-15667034',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'titulo' => 0,
    'tratamientos' => 0,
    'item' => 0,
    'profesionales' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_561be7a95403f1_93580838',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561be7a95403f1_93580838')) {function content_561be7a95403f1_93580838($_smarty_tpl) {?><div class="container">
    <input type="hidden" name="item" id="item" value="0" />
    <h3><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h3>
    <hr>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <a href="tratamientos.php?accion=n" class="btn btn-new btn-xs iframe cboxElement">
                    <span class="glyphicon glyphicon-plus">Nuevo</span>
                </a>
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tratamientos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
</td>
                                <td class="text-center">
                                  <a href="tratamientos.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&accion=e" class="btn btn-warning btn-xs iframe cboxElement">
                                  <span class="glyphicon glyphicon-pencil"></span></a> &nbsp;
                                  <a href="tratamientos.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&accion=d" onclick="javacript:valor(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"  id="dialog-link<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a> &nbsp;
                                </td>
                            </tr>
                        <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
                            <tr>
                                <td colspan="5">No se encontraron registros.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
	
	<!-- ui-dialog -->
	<div id="dialog" title="Eliminar">
		<p>Se dispone a eliminar este registro<br>¿Realmente desea eliminarlo?</p>
	</div>
	
	<script>
	
	function valor(idx)
	{
		$("#item").val(idx);
	}
	$( "#dialog" ).dialog({
		autoOpen: false,
		width: 300,
		buttons: [
			{
				text: "Cancelar",
				click: function() {
					$( this ).dialog( "close" );
				}
			},
			{
				text: "Eliminar",
				click: function() {
					
					//alert($("#item").val());
					window.open("profesionales.php?id="+$("#item").val()+"&accion=d","_self");
					$( this ).dialog( "close" );
					
				}
			}
		]
	});
	
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['profesionales']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		$( "#dialog-link<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" ).click(function( event ) {
			$( "#dialog" ).dialog( "open" );
			event.preventDefault();
		});
		$( "#dialog-link<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
, #icons li" ).hover(
				function() {
					$( this ).addClass( "ui-state-hover" );
				},
				function() {
					$( this ).removeClass( "ui-state-hover" );
				}
			);
	<?php } ?>
	</script><?php }} ?>
