<?php /*%%SmartyHeaderCode:178043676555f4fb3b416795-01613099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '435fb4462980a5934d10a0df37cc70bfe3c936f2' => 
    array (
      0 => '/var/www/contraluz/cirer/data/smarty/templates/maestroModal.html',
      1 => 1442117648,
      2 => 'file',
    ),
    '92879fc8a472971c8da4eaa65efd728d72132f65' => 
    array (
      0 => './/data/smarty/templates/editarCon.html',
      1 => 1442118405,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178043676555f4fb3b416795-01613099',
  'variables' => 
  array (
    'titulo_pagina' => 0,
    'subPlantilla' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55f4fb3b484867_18054697',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f4fb3b484867_18054697')) {function content_55f4fb3b484867_18054697($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<title>..::C.I.R.E.R.::..</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link href="css/colorbox.css" type="text/css" rel="stylesheet" media="all">
<link href="css/jquery-ui.css" type="text/css" rel="stylesheet" media="all">
<link href="css/theme.css" type="text/css" rel="stylesheet" media="all">
<link href="css/jquery.timepicker.css" type="text/css" rel="stylesheet" media="all">


<style>
		body{}
	.demoHeaders {
			margin-top: 2em;
		}
		#dialog-link {
			
			text-decoration: none;
			position: relative;
		}
		#dialog-link span.ui-icon {
			margin: 0 5px 0 0;
			position: absolute;
			left: .2em;
			top: 50%;
			margin-top: -8px;
		}
		#icons {
			margin: 0;
			padding: 0;
		}
		#icons li {
			margin: 2px;
			position: relative;
			padding: 4px 0;
			cursor: pointer;
			float: left;
			list-style: none;
		}
		#icons span.ui-icon {
			float: left;
			margin: 0 4px;
		}
		.fakewindowcontain .ui-widget-overlay {
			position: absolute;
		}
		select {
			width: 200px;
		}
</style>

<!--web-font-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<!--//web-font-->
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Metge Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript">

addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
 
</script>
<!-- //Custom Theme files -->
<!-- js -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.colorbox.js"></script>  
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.blockUI.js"></script>
<script src="js/jquery.json-2.2.min.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/modernizr.custom.63321.js"></script>
<script src="js/jquery.mask.min.js"></script>

<!-- //js -->	
<!-- start-smoth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">

		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});

</script>
<!--//end-smoth-scrolling-->
</head>
<body>
	<!--services-->
	<div class="services">
	 
		<div class="container">
			
				<div class="contact">

			<h3>Edición de Consultorio</h3>
							<div class="footer-text">
					<div class="container">
						<h3>Datos Guardados con éxito</h3>
					</div>
				</div>
				<script>
				
				$(document).ready(function(c) 
						{
					parent.jQuery.colorbox.close();		
					});
				
				
				</script>
						<div class="contact-form">
				<form method="POST" action="consultorios.php" id="formulario" name="formulario"/>
					<input type="hidden" id="id" name="id" value="18"/>
					<input type="hidden" id="idEditando" name="idEditando" value="0"/>
					<input type="hidden" id="metodo" name="metodo" value="edicion"/>
					<input type="hidden" id="idu" name="idu" value="1"/>
					<label>Descripción</label>
					<input type="text" value="Consultorio 3" id="descripcion" name="descripcion" required=""/>
					<label>Ubiación/Sede</label>
					<input type="text" value="Sarmiento" id="apellido" name="ubicacion" required=""/>
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
			                  				                    <tr>
									<td colspan="5">No se encontraron registros.</td>
								</tr>
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
 		 function validarHoras(desde,hasta)
		 {
 			var fdesde = new Date("09 28 2015 " + hasta);
 			var fhasta = new Date("09 28 2015 " + desde);
			var diff = ( fhasta - fdesde ) / 1000 / 60 / 60;
 			
			//si es 0 o positivo la fecha hora es desde es mayor a hasta
			return diff < 0
		 }
		 
		 function quitarMarcaEditando()
		 {
		 	window.parent.document.getElementById("editando").value="N";
		 }
 
 		 //Coloca la marca de editando en S en el maestro.html y pregunta si desea o no guardar los cambios
 		 //Es para los datos que se guardan por ajax en las tablas temporales.
		 function ponerMarcaEditando()
		 {
		 	window.parent.document.getElementById("editando").value="S";
		 }
		 
 		cargarGrilla();
 		quitarMarcaEditando();
 		
 		function mostrarDiv()
 		{
 			
 			if($("#fechasCont").css("display") == "none")
 			{

 				$("#fechasCont").css("display", "inline");
 				$("#botonHorarios").attr("src","/images/minus.png");
	
 			}
 			else
 			{

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
            if($("#fechasCont").css("display") != "none")
        	{
        		mostrarDiv();
        	}
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
            if(txtDia == "" || txtDesde == "" || txtHasta == "")
            {
            	$.blockUI({ message: '<h1>Los campos del horario no pueden estar vacios</h1> <br> <input type="button" id="ok" value="Ok" onclick=javascript:$.unblockUI(); />', css: { width: '350px'} });
	 			return false;
            }
            
            if(!validarHoras(txtDesde,txtHasta))
            {
            	$.blockUI({ message: '<h1>La hora desde debe ser menor a la hora hasta</h1> <br> <input type="button" id="ok" value="Ok" onclick=javascript:$.unblockUI(); />', css: { width: '350px'} });
	 			return false;
            }	
            
            
            $.ajax({
				data: {json: $.toJSON(jsonx) },
				type: "POST",
				dataType: "json",
				url: "includes/procesos.php",
				success: function(data)
				{
					
					if(data.html!="")
					{
						cargarGrilla();
						mostrarDiv()
						$.unblockUI();
						//$("#editando").val("S");
						ponerMarcaEditando();
						return true;
					}
		 			if(data.otroerror)
			 		{ 		 				
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
        function cargarGrilla()
        {
        	txtIdU = $("#idu").val();
        	var jsonx = {proceso:"tmpCargarGrilla",idu:txtIdU};
            $.ajax({
				data: {json: $.toJSON(jsonx) },
				type: "POST",
				dataType: "json",
				url: "includes/procesos.php",
				success: function(data)
				{
					
					if(data.html=="OK")
					{
						$("#grillaHorarios").html(data.grilla);
						return true;
					}
		 			if(data.otroerror)
			 		{ 		 				
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
        	if($("#fechasCont").css("display") == "none")
        	{
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
				success: function(data)
				{
					
					if(data.html=="OK")
					{
						//$("#grillaHorarios").html(data.grilla);
						ponerMarcaEditando();
						
						$("#dias").val(data.dia);
						$("#desde").val(data.desde);
						$("#hasta").val(data.hasta);
						return true;
					}
		 			if(data.otroerror)
			 		{ 		 				
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
        
        function eliminarItem(item)
        {
        	if(confirm("¿Realmente desea eliminar este horario?"))
			{
            	
        		$.blockUI({ message: "<h1>Guardando datos...</h1>" });
        		var jsonx = {proceso:"delTmpHorario",Item:item};
                $.ajax({
    				data: {json: $.toJSON(jsonx) },
    				type: "POST",
    				dataType: "json",
    				url: "includes/procesos.php",
    				success: function(data)
    				{
    					if(data.html=="OK")
    					{
    						ponerMarcaEditando();
    						$.unblockUI();
    						cargarGrilla();
    						return true;
    					}
    		 			if(data.otroerror)
    			 		{ 		 				
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

					
	
		</div>	
	</div>		

</body>
</html>	<?php }} ?>
