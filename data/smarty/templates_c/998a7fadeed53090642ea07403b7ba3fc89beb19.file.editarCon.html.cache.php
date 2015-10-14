<?php /* Smarty version Smarty-3.1.19, created on 2015-10-12 14:06:43
         compiled from ".//data/smarty/templates/editarCon.html" */ ?>
<?php /*%%SmartyHeaderCode:735815746561be8a377c0c1-11598782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '998a7fadeed53090642ea07403b7ba3fc89beb19' => 
    array (
      0 => './/data/smarty/templates/editarCon.html',
      1 => 1443272834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '735815746561be8a377c0c1-11598782',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nombreSubpagina' => 0,
    'mensaje' => 0,
    'id' => 0,
    'metodo' => 0,
    'idusuario' => 0,
    'descripcion' => 0,
    'ubicacion' => 0,
    'capacidad' => 0,
    'arrayhorarios' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_561be8a384afc8_49548824',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561be8a384afc8_49548824')) {function content_561be8a384afc8_49548824($_smarty_tpl) {?><div class="contact">
    <h3><?php echo $_smarty_tpl->tpl_vars['nombreSubpagina']->value;?>
</h3>
    <?php if ($_smarty_tpl->tpl_vars['mensaje']->value!='') {?>
        <div class="footer-text">
            <div class="container">
                <h3><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</h3>
            </div>
        </div>
        <script>
            //Opcional, si se quita esto no va a cerrar la ventana modal
            //y va a dejar la pantalla para continuar cargado, ya sea un registro nuevo o editando
            $(document).ready(function(c){
                parent.jQuery.colorbox.close();		
            });
        </script>
    <?php }?>
    <div class="contact-form">
        <form method="POST" action="consultorios.php" id="formulario" name="formulario">
            <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
            <input type="hidden" id="idEditando" name="idEditando" value="0"/>
            <input type="hidden" id="metodo" name="metodo" value="<?php echo $_smarty_tpl->tpl_vars['metodo']->value;?>
"/>
            <input type="hidden" id="idu" name="idu" value="<?php echo $_smarty_tpl->tpl_vars['idusuario']->value;?>
"/>
            <label>Descripción</label>
            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
" id="descripcion" name="descripcion" required=""/>
            <label>Ubiación/Sede</label>
            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['ubicacion']->value;?>
" id="apellido" name="ubicacion" required=""/>
            <label>Capacidad</label>
            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['capacidad']->value;?>
" id="capacidad" name="capacidad" required=""/>
            <label>Horarios Disponibles</label>            
            <a href="javascript:mostrarDiv()">
                <img id="botonHorarios" src="/images/plus.png" border="0"/>
            </a>
            <div id="fechasCont" style="display:none" class="container">
                <div id="fechas" style="padding: .5em;">
                    <label>Dias</label>
                    <select id="dias" name="dias">
                        <option value="">[Seleccione]</option>
                        <option value="L">Lunes</option>
                        <option value="M">Martes</option>
                        <option value="A">Miércoles</option>
                        <option value="J">Jueves</option>
                        <option value="V">Viernes</option>
                        <option value="S">Sábado</option>
                        <option value="D">Domingo</option>
                    </select>
                    <label>Desde</label>
                    <input name="desde" id="desde" value="" data-time-format="H:i:s" class="time"/>
                    <label>Hasta</label>
                    <input name="hasta" id="hasta" value="" data-time-format="H:i:s" class="time"/>
                </div>
                <input type="button" id="guardarHorarioTemp" name="guardarHorarioTemp" value="Guardar"/>
                <input type="button" id="cancelarHorarioTemp" name="cancelarHorarioTemp" value="Cancelar"/>
            </div>
            <br>
            <div id="grillaHorarios">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Día de la semana</th>
                            <th>Horario desde</th>
                            <th>Horario Hasta</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrayhorarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['dia'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['horadesde'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['horahasta'];?>
</td>
                                <td class="text-center">
                                    <a href="javascript:editarItem(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" class="btn btn-warning btn-xs iframe cboxElement">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a> &nbsp;
                                    <a href="editar.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onclick="javacript:valor(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
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
            <br> 
            <input type="submit" value="Guardar Datos"/>
        </form>
    </div>		
</div>

    <script type="text/javascript">
        $('#desde').timepicker();
        $('#hasta').timepicker();
        $('.time').mask('00:00:00');
        //Quita la marca de editando que está en el maestro.html
        function validarHoras(desde,hasta){
            var fdesde = new Date("09 28 2015 " + hasta);
            var fhasta = new Date("09 28 2015 " + desde);
            var diff = ( fhasta - fdesde ) / 1000 / 60 / 60;
            //si es 0 o positivo la fecha hora es desde es mayor a hasta
            return diff < 0
        }
		 
        function quitarMarcaEditando(){
            window.parent.document.getElementById("editando").value="N";
        }
        //Coloca la marca de editando en S en el maestro.html y pregunta si desea o no guardar los cambios
        //Es para los datos que se guardan por ajax en las tablas temporales.
        function ponerMarcaEditando(){
           window.parent.document.getElementById("editando").value="S";
        }	 
        cargarGrilla();
        quitarMarcaEditando();
 		
        function mostrarDiv(){
            if($("#fechasCont").css("display") == "none"){
                $("#fechasCont").css("display", "inline");
                $("#botonHorarios").attr("src","/images/minus.png");
            }else{
                $("#fechasCont").css("display", "none");
                $("#botonHorarios").attr("src","/images/plus.png");
            }
        }
        $('#cancelarHorarioTemp').click(function() {
            quitarMarcaEditando();
            $("#dias").val("");
            $("#desde").val("");
            $("#hasta").val("");
            $("#idEditando").val("0");
            if($("#fechasCont").css("display") != "none"){ mostrarDiv(); }
        });
        $('#guardarHorarioTemp').click(function() { 
            txtIdU = $("#idu").val();
            txtDia = $("#dias").val();
            txtDesde = $("#desde").val();
            txtHasta = $("#hasta").val();
            
            $.blockUI({ message: "<h1>Guardando datos...</h1>" });
            var proc="tmpHorarios";//nuevo item
            var itemEditar = 0;
            if($("#idEditando").val() != 0) //si se está editando un item
            {
            	proc="tmpEditarHorario";//editar item
            	itemEditar = $("#idEditando").val(); 
            }
            var jsonx = {proceso:proc,idu:txtIdU,dia:txtDia,desde:txtDesde,hasta:txtHasta,itemx:itemEditar};
            if(txtDia == "" || txtDesde == "" || txtHasta == ""){
            	$.blockUI({ message: '<h1>Los campos del horario no pueden estar vacios</h1> <br> <input type="button" id="ok" value="Ok" onclick=javascript:$.unblockUI(); />', css: { width: '350px'} });
                return false;
            }
            
            if(!validarHoras(txtDesde,txtHasta)){
            	$.blockUI({ message: '<h1>La hora desde debe ser menor a la hora hasta</h1> <br> <input type="button" id="ok" value="Ok" onclick=javascript:$.unblockUI(); />', css: { width: '350px'} });
                return false;
            }	
            
            $.ajax({
                data: {json: $.toJSON(jsonx) },
                type: "POST",
                dataType: "json",
                url: "includes/procesos.php",
                success: function(data){
                    if(data.html!=""){
                        cargarGrilla();
                        mostrarDiv()
                        $.unblockUI();
                        //$("#editando").val("S");
                        ponerMarcaEditando();
                        return true;
                    }
                    if(data.otroerror){ 		 				
                        $.blockUI({ message: '<h1>'+data.otroerrormessage+'<h1> <input type="button" id="ok" value="Ok" onclick=javascript:$.unblockUI(); />', css: { width: '350px',top: '10px' } });
                        return false;
                    }
                    return false;
                },
                error: function(xhr, textStatus, errorThrown) {
                    // Handle error
                    alert(errorThrown);
                    $.unblockUI(); 
                }
            }); 
        }); 
        //carga la grilla temporal
        function cargarGrilla(){
            txtIdU = $("#idu").val();
            var jsonx = {proceso:"tmpCargarGrilla",idu:txtIdU};
            $.ajax({
                data: {json: $.toJSON(jsonx) },
                type: "POST",
                dataType: "json",
                url: "includes/procesos.php",
                success: function(data){
                    if(data.html=="OK"){
                        $("#grillaHorarios").html(data.grilla);
                        return true;
                    }
                    if(data.otroerror){ 		 				
                        $.blockUI({ message: '<h1>'+data.otroerrormessage+'<h1> <input type="button" id="ok" value="Ok" onclick=javascript:$.unblockUI(); />', css: { width: '350px',top: '10px' } });
                        return false;
                    }
                    return false;
                },
                error: function(xhr, textStatus, errorThrown) {
                    // Handle error
                    alert(errorThrown);
                    $.unblockUI(); 
                }
            });
        }
        
        var originalClose = $.colorbox.close;
        $.colorbox.close = function(){
            var response;
            if($('#cboxLoadedContent').find('form').length > 0){
                response = confirm('Do you want to close this window?');
                if(!response){
                    return; // Do nothing.
                }
            }
            originalClose();
        };
        $('a#example').colorbox();
        
        function editarItem(item)
        {
            if($("#fechasCont").css("display") == "none"){
                mostrarDiv();
            }
            //indica que está editando un item y que no tiene que guardar uno nuevo
            //sino editar el seleccionado
            $("#idEditando").val(item);
        	
            txtIdU = $("#idu").val();
            var jsonx = {proceso:"getTmpHorario",idu:txtIdU,Item:item};
            $.ajax({
                data: {json: $.toJSON(jsonx) },
                type: "POST",
                dataType: "json",
                url: "includes/procesos.php",
                success: function(data){
                    if(data.html=="OK"){
                        //$("#grillaHorarios").html(data.grilla);
                        ponerMarcaEditando();

                        $("#dias").val(data.dia);
                        $("#desde").val(data.desde);
                        $("#hasta").val(data.hasta);
                        return true;
                    }
                    if(data.otroerror){ 		 				
                        $.blockUI({ message: '<h1>'+data.otroerrormessage+'<h1> <input type="button" id="ok" value="Ok" onclick=javascript:$.unblockUI(); />', css: { width: '350px',top: '10px' } });
                        return false;
                    }
                    return false;
                },
                error: function(xhr, textStatus, errorThrown) {
                    // Handle error
                    alert(errorThrown);
                    $.unblockUI(); 
                }
            });	
        }
        function eliminarItem(item){
            if(confirm("¿Realmente desea eliminar este horario?")){
                $.blockUI({ message: "<h1>Guardando datos...</h1>" });
                var jsonx = {proceso:"delTmpHorario",Item:item};
                $.ajax({
                    data: {json: $.toJSON(jsonx) },
                    type: "POST",
                    dataType: "json",
                    url: "includes/procesos.php",
                    success: function(data){
                        if(data.html=="OK"){
                            ponerMarcaEditando();
                            $.unblockUI();
                            cargarGrilla();
                            return true;
                        }
                        if(data.otroerror){ 		 				
                            $.blockUI({ message: '<h1>'+data.otroerrormessage+'<h1> <input type="button" id="ok" value="Ok" onclick=javascript:$.unblockUI(); />', css: { width: '350px',top: '10px' } });
                            return false;
                        }
                        return false;
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle error
                        alert(errorThrown);
                        $.unblockUI(); 
                    }
                });
            }
        }
    </script>
<?php }} ?>
