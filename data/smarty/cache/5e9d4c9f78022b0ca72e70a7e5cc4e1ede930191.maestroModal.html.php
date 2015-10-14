<?php /*%%SmartyHeaderCode:1765732094561bf1c1c00e12-22647623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e9d4c9f78022b0ca72e70a7e5cc4e1ede930191' => 
    array (
      0 => '/var/www/contraluz-cirer/data/smarty/templates/maestroModal.html',
      1 => 1442574985,
      2 => 'file',
    ),
    'd37c97f1f8e5168f77fdc6d4b878496410c02b60' => 
    array (
      0 => './/data/smarty/templates/editarTurnos.html',
      1 => 1443285746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1765732094561bf1c1c00e12-22647623',
  'variables' => 
  array (
    'titulo_pagina' => 0,
    'subPlantilla' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_561bf1c1c8b929_83664010',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561bf1c1c8b929_83664010')) {function content_561bf1c1c8b929_83664010($_smarty_tpl) {?><!DOCTYPE html>
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
    <h3>Edición de Turnos</h3>
        <div class="contact-form">
        <form method="POST" action="turnos.php" id="formulario" name="formulario">
            <input type="hidden" id="id" name="id" value="1"/>
            <input type="hidden" id="metodo" name="metodo" value="edicion"/>
            
            <label>Terapia</label><br/>
            <select name="terapia">
                <option value=""></option>
<option value="1" selected="selected">Test terapia</option>
<option value="2">terapia test</option>
<option value="3">Pepe</option>
<option value="4">asd</option>
<option value="5">Ioma</option>
<option value="6">Tratamiento 2</option>
<option value="7">Ioma</option>
<option value="8">terapia test</option>
<option value="9">Ioma</option>
<option value="10">Ioma</option>
<option value="11">Tratamiento 2</option>
<option value="13">terapia test</option>
<option value="14">Ioma</option>
<option value="15">Tratamiento 2</option>
<option value="16">Tratamiento 2</option>
<option value="17">Tratamiento test</option>
<option value="18">Ioma</option>
<option value="19">Ioma</option>
<option value="20">Pepe</option>
<option value="21">Ioma</option>
<option value="22">terapia test</option>

            </select>
            <br/>
            <label>Consultorio</label><br/>
            <select name=consultorio>
                <option value=""></option>
<option value="1" selected="selected">test consultorio</option>

            </select>
            <br/>
            <label>Profesional</label><br/>
            <select name=profesional>
                <option value=""></option>
<option value="1" selected="selected">Dr nick</option>

            </select>
            <br/>
            <label>Fecha</label>
            <input type="text" value="28/09/15" id="fecha" name="fecha"/>
            <br/>
            <label>Hora</label>
            <input type="text" name="hora" id="hora" value="01:30" data-time-format="H:i"/>
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

					
	
		</div>	
	</div>		

</body>
</html>	<?php }} ?>
