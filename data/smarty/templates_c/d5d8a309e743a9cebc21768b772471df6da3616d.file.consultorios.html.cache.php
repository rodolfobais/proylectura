<?php /* Smarty version Smarty-3.1.19, created on 2015-10-12 14:25:34
         compiled from ".//data/smarty/templates/consultorios.html" */ ?>
<?php /*%%SmartyHeaderCode:220348533561bed0e3ea116-48693625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5d8a309e743a9cebc21768b772471df6da3616d' => 
    array (
      0 => './/data/smarty/templates/consultorios.html',
      1 => 1443272857,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '220348533561bed0e3ea116-48693625',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'titulo' => 0,
    'consultorios' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_561bed0e446005_96181058',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561bed0e446005_96181058')) {function content_561bed0e446005_96181058($_smarty_tpl) {?><div class="container">
    <input type="hidden" name="item" id="item" value="0" />
    <h3><u><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</u></h3>
    <hr>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <a href="consultorios.php?accion=n" class="btn btn-new btn-xs iframeEdicion cboxElement">
                    <span class="glyphicon glyphicon-plus">Nuevo</span>
                </a>
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descripción</th>
                            <th>Ubicación/Sede</th>
                            <th>Disponibilidad</th>
                            <th>Capacidad</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['consultorios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['descripcion'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['ubicacion'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['horarios'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['capacidad'];?>
</td>
                                <td class="text-center">
                                    <a href="consultorios.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&accion=e" class="btn btn-warning btn-xs iframeEdicion cboxElement">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a> &nbsp;
                                    <a href="#" onclick="javacript:valor2(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"  id="dialog-link<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a> &nbsp;
                                </td>
                            </tr>
                        <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
                            <tr>
                                <td colspan="6">No se encontraron registros.</td>
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
    
	function valor2(idx){ $("#item").val(idx); }
	$( "#dialog" ).dialog({
            autoOpen: false, width: 300,
            buttons:[{
                text: "Cancelar",
                click: function() { $( this ).dialog( "close" ); }
            },{
                text: "Eliminar",
                click: function() {
                    //alert($("#item").val());
                    window.open("consultorios.php?id="+$("#item").val()+"&accion=d","_self"); $( this ).dialog( "close" );					
                }
            }]
	});
    		
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['consultorios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
            function() { $( this ).addClass( "ui-state-hover" ); },
            function() { $( this ).removeClass( "ui-state-hover" ); }
        );
    <?php } ?>
</script><?php }} ?>
