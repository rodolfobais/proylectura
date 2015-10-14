<?php /*%%SmartyHeaderCode:330266449561bf1f1924c35-36652502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '709a960c9df226016c467ab99076a84f2643a0f8' => 
    array (
      0 => '/var/www/contraluz-cirer/data/smarty/templates/maestro.html',
      1 => 1443186611,
      2 => 'file',
    ),
    'f8e09546e6808d75373ac9a56124310f0c9c95db' => 
    array (
      0 => './/data/smarty/templates/menu.html',
      1 => 1443287168,
      2 => 'file',
    ),
    '829a412d3ae0d98ba7cf59ea42815caffa2a1368' => 
    array (
      0 => './/data/smarty/templates/index.html',
      1 => 1443214746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '330266449561bf1f1924c35-36652502',
  'variables' => 
  array (
    'titulo_pagina' => 0,
    'subPlantilla' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_561bf1f19dfa22_60053966',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561bf1f19dfa22_60053966')) {function content_561bf1f19dfa22_60053966($_smarty_tpl) {?><!DOCTYPE html>
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
                    <a href="index.php">
                        <img src="images/logo-cirer.png" alt="logo" width="200px" height="73px"/>
                    </a>
                </div>
                <div class="top-nav">
                    <ul class="nav1">
    <li style="background: none repeat scroll 0 0 #868e3f;padding: 9px;"><a  class="active" href="index.php">Inicio</a></li>
    <li style="background: none repeat scroll 0 0 #868e3f;padding: 9px;"><a  href="turnos.php">Turnos</a></li>
    <li style="background: none repeat scroll 0 0 #868e3f;padding: 9px;"><a  href="#">Reportes</a></li>
    <li style="background: none repeat scroll 0 0 #868e3f;padding: 9px;"><a  href="asistencias.php">Asistencia</a></li>
    <li style="background: none repeat scroll 0 0 #868e3f;padding: 9px;"><a href="salir.php">Salir</a></li>
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
            <div class="srvc-bottom">
    <!--<h3>Módulos Disponibles</h3>-->
    <div class="row  srvc-row">			
        <div class="col-sm-6 col-md-4 srvc-bottom-grids">
            <div class="thumbnail">
                <a href="turnos.php" title="">
                    <img src="images/calendar.jpg" class="img-responsive zoom-img " alt="">				
                </a>
                <div class="caption srvc-caption">
                    <h3 style="text-align: center"><a href="turnos">Turnos</a></h3>
                    <p style="text-align: center">Administración de Turnos</p>				
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 srvc-bottom-grids">
            <div class="thumbnail">
                <a href="profesionales.php" title="">
                    <img src="images/doctors.jpg" class="img-responsive zoom-img " alt="">				
                </a>
                <div class="caption srvc-caption">
                    <h3 style="text-align: center"><a href="profesionales.php">Profesionales</a></h3>
                    <p style="text-align: center">Administración de Profesionales</p>				
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 srvc-bottom-grids">
            <div class="thumbnail">
                <a href="consultorios.php"  title="">
                    <img src="images/consultory.jpg" class="img-responsive zoom-img " alt="">				
                </a>
                <div class="caption srvc-caption">
                    <h3 style="text-align: center"><a href="consultorios.php">Consultorios</a></h3>
                    <p style="text-align: center">Administración de Consultorios</p>				
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
        <div class="col-sm-6 col-md-4 srvc-bottom-grids">
            <div class="thumbnail">
                <a href="pacientes.php" title="">
                    <img src="images/img19.jpg" class="img-responsive zoom-img" alt="">				
                </a>
                <div class="caption srvc-caption">
                    <h3 style="text-align: center"><a href="pacientes.php">Pacientes</a></h3>
                    <p style="text-align: center">Administración de Pacientes</p>				
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 srvc-bottom-grids">
            <div class="thumbnail">
                <a href="tratamientos.php" title="">
                    <img src="images/img21.jpg" class="img-responsive zoom-img " alt="">				
                </a>
                <div class="caption srvc-caption">
                    <h3><a href="tratamientos.php" style="text-align: center">Tratamientos</a></h3>
                    <p style="text-align: center">Administración de Tratamientos</p>				
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 srvc-bottom-grids">
            <div class="thumbnail">
                <a href="terapias.php" title="">
                    <img src="images/terapia.jpg" class="img-responsive zoom-img " alt="">				
                </a>
                <div class="caption srvc-caption">
                    <h3 style="text-align: center"><a href="terapias.php">Terapias</a></h3>
                    <p style="text-align: center">Administración de Terapias</p>				
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
        <div class="col-sm-6 col-md-4 srvc-bottom-grids">
            <div class="thumbnail">
                <a href="obrassociales.php" title="">
                    <img src="images/administration.png" class="img-responsive zoom-img" alt="">				
                </a>
                <div class="caption srvc-caption">
                    <div class="caption srvc-caption">
                        <h3 style="text-align: center"><a href="obrassociales.php">Obras Sociales y Prepagas</a></h3>
                        <p style="text-align: center">Administración de Obras Sociales y Prepagas</p>				
                    </div>
                </div>
            </div>
        </div>						
    </div>
    <link rel="stylesheet" href="css/swipebox.css">
    <script src="js/jquery.swipebox.min.js"></script> 
    <script type="text/javascript">
        
            jQuery(function($){
                $(".swipebox").swipebox();
            });
        	
    </script>
</div>
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
                <p>Powered & Designed by <a href="http://www.outboxfactory.com" target="blank">OutBoxFactory</a></p>
            </div>
        </div>
    </div>	
	
    <!--smooth-scrolling-of-move-up-->
    <a href="#" id="toTop" style="display: hidden;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
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
                $(".iframe").colorbox({
                    iframe:true
                    , width:"99%"
                    , height:"99%"
                    ,slideshow:true
                    ,onClosed:function(){
                        //$("#frm").submit();
                        //alert("Se cierra");
                        window.location.reload();
                    }
                });
                $(".iframeEdicion").colorbox({
                    iframe:true
                    , width:"99%"
                    , height:"99%"
                    ,slideshow:false
                    ,onClosed:function(){
                        window.location.reload();
                    }
                });
                $(".iframeInfo").colorbox({
                    iframe:true
                    , width:"60%"
                    , height:"80%"
                });
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
            $.colorbox.close = function(){
                if($( "#editando" ).val() == "S"){
                    if(confirm("Tiene datos sin guardar ¿Desea salir?")){
                        $( "#editando" ).val("N");
                        originalClose();
                    }
                }else{
                    originalClose();
                }
            };
		    
        
    </script>
</body>
</html>	<?php }} ?>
