<?php /*%%SmartyHeaderCode:177113652355f4fb49364ef9-05265696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f972bd64aafa8b23343d2f6b5b1423e14f307a0' => 
    array (
      0 => '/var/www/contraluz/cirer/data/smarty/templates/maestro.html',
      1 => 1442117640,
      2 => 'file',
    ),
    'c76a0f11c65600ac1a373808d7d699c86a44fb5c' => 
    array (
      0 => './/data/smarty/templates/menu.html',
      1 => 1441935370,
      2 => 'file',
    ),
    'bb21fe4c5b74b9e68354bec6a5b86ea7d70af518' => 
    array (
      0 => './/data/smarty/templates/profesionales.html',
      1 => 1442118015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177113652355f4fb49364ef9-05265696',
  'variables' => 
  array (
    'titulo_pagina' => 0,
    'subPlantilla' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55f4fb4940fb42_11566916',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f4fb4940fb42_11566916')) {function content_55f4fb4940fb42_11566916($_smarty_tpl) {?><!DOCTYPE html>
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
<!-- Marca de edición viene de las pantallas modales. si está en S llama al método $.colorbox.close que sobreescribe al onclose -->
<input type="hidden" name="editando" id="editando" value="N" />
    <!--banner-->
	<div class="banner bnr-text">
		<!--header-->
		<div class="container">
			<div class="header">			
				
				<div class="header-logo">
					<a href="index.html"><img src="images/avatar2.png" alt="logo" width="30px" height="30px"/>  </a>
				</div>
				
				<div class="top-nav">
					<span class="menu"><img src="images/menu-icon.png" alt=""/></span>		
					
									  <ul class="nav1">
						<li><a  href="index.php">Inicio</a></li>
						<li><a  href="reportes.php">Reportes</a></li>
						<li><a  href="services.html">Services</a></li>
						<li><a  href="news.html">News</a></li>
						<li><a  href="contact.html">Contact</a></li>
						<li><a href="salir.php">Salir</a></li>
					</ul>
					
					<!-- script-for-menu -->
					 <script>
					 
					   $( "span.menu" ).click(function() {
						 $( "ul.nav1" ).slideToggle( 300, function() {
						 // Animation complete.
						  });
						 });
					   
					</script>
					<!-- /script-for-menu -->
				</div>
				
				

					<div class="clearfix"> </div>
			</div>	
			<!--//header-->								
		</div>
	</div>					
	<!--header-->
	<!--services-->
	<div class="services">
	 
		<div class="container">
			
				
		<div class="container">

			<input type="hidden" name="item" id="item" value="0" />
			<h3>Profesionales</h3>
			<hr>
			<div class="row">
            <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive">
            <a href="profesionales.php?accion=n" class="btn btn-new btn-xs iframe cboxElement">
            <span class="glyphicon glyphicon-plus">Nuevo</span>
            </a>
                <table class="table table-striped table-bordered table-condensed">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Datos Personales</th>
                      <th class="text-center">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  	                    <tr>
                      <td>1</td>
                      <td>Profesional</td>
                      <td>De Prueba</td>
                      <td>Teléfono 5555-5555</td>
                      <td class="text-center">
                        <a href="profesionales.php?id=1&accion=e" class="btn btn-warning btn-xs iframe cboxElement">
                        <span class="glyphicon glyphicon-pencil"></span></a> &nbsp;
                        <a href="profesionales.php?id=1" onclick="javacript:valor(1);"  id="dialog-link1" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a> &nbsp;
                      </td>
                    </tr>
                                        <tr>
                      <td>2</td>
                      <td>Profesional 2</td>
                      <td>De Prueba 2</td>
                      <td>Teléfono 7777-7777</td>
                      <td class="text-center">
                        <a href="profesionales.php?id=2&accion=e" class="btn btn-warning btn-xs iframe cboxElement">
                        <span class="glyphicon glyphicon-pencil"></span></a> &nbsp;
                        <a href="profesionales.php?id=2" onclick="javacript:valor(2);"  id="dialog-link2" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a> &nbsp;
                      </td>
                    </tr>
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
	
			$( "#dialog-link1" ).click(function( event ) {
			$( "#dialog" ).dialog( "open" );
			event.preventDefault();
		});
		$( "#dialog-link1, #icons li" ).hover(
				function() {
					$( this ).addClass( "ui-state-hover" );
				},
				function() {
					$( this ).removeClass( "ui-state-hover" );
				}
			);
			$( "#dialog-link2" ).click(function( event ) {
			$( "#dialog" ).dialog( "open" );
			event.preventDefault();
		});
		$( "#dialog-link2, #icons li" ).hover(
				function() {
					$( this ).addClass( "ui-state-hover" );
				},
				function() {
					$( this ).removeClass( "ui-state-hover" );
				}
			);
		</script>
					
	
		</div>	
	</div>		
	<!--footer-->
	<div class="footer"> 
		<div class="copy-right">
			<div class="container">
				<div class="social-icons">
					<ul>
						<li><a href="#"></a></li>
						<li><a href="#" class="fb"></a></li>
						<li><a href="#" class="be"></a></li>
						<li><a href="#" class="gg"></a></li>
					</ul>	
				</div>
				<p>Powered By OutBoxFactory | Design by <a href="http://www.outboxfactory.com">OutBoxFactory</a></p>
			</div>
		</div>
	</div>	
	
	<!--smooth-scrolling-of-move-up-->
		<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!--//smooth-scrolling-of-move-up-->
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
    
		    $(document).ready(function() {
		
		    	//Examples of how to assign the Colorbox event to elements
		    	$(".group1").colorbox({rel:'group1'});
		    	$(".group2").colorbox({rel:'group2', transition:"fade"});
		    	$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
		    	$(".group4").colorbox({rel:'group4', slideshow:true});
		    	$(".ajax").colorbox();
		    	$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
		    	$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
		    	$(".iframe").colorbox(
		    			{
		    				iframe:true
		    				, width:"99%"
		    				, height:"99%"
		    				,slideshow:true
		    				,onClosed:function()
		    				{
		    					//$("#frm").submit();
		    					//alert("Se cierra");
		    					window.location.reload();
		    				}
		    			}
		    			);
		    	$(".iframeEdicion").colorbox(
		    			{
		    				iframe:true
		    				, width:"99%"
		    				, height:"99%"
		    				,slideshow:false
		    				,onClosed:function()
		    				{
		    					window.location.reload();
		    				}
		    			}
		    			);
		    	$(".iframeInfo").colorbox(
		    			{
		    				iframe:true
		    				, width:"60%"
		    				, height:"80%"
		    			}
		    			);
		    	$(".inline").colorbox({inline:true, width:"50%"});
		    	/*
		    	$(".callbacks").colorbox({
		    		onOpen:function(){ alert('onOpen: colorbox is about to open'); },
		    		onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
		    		onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
		    		onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
		    		onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
		    	});
		    	*/
		    	$('.non-retina').colorbox({rel:'group5', transition:'none'})
		    	$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
		    	
		    	//Example of preserving a JavaScript event for inline calls.
		    	$("#click").click(function(){ 
		    		$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
		    		return false;
		    	});
		    });
		    
		    
		 				     
		
			var originalClose = $.colorbox.close;
			$.colorbox.close = function()
			{
				if($( "#editando" ).val() == "S")
				{
					if(confirm("Tiene datos sin guardar ¿Desea salir?"))
					{
						$( "#editando" ).val("N");
						originalClose();
					}
				}
				else
				{
					originalClose();
				}
			};
		    
		
    </script>
</body>
</html>	<?php }} ?>
