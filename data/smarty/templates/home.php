<?php 
 //die; 
 error_reporting(E_ALL); 
 ini_set("display_errors", 1); 
 include_once("../../../data/config.php"); 
  
 $libros = LibroQuery::create()->find(); 
  
 $listaLibros = ""; 
 foreach ($libros as $reg) { 
     $listaLibros .= "<li>".$reg->getNombre()."</li>"; 
 } 
 ?> 
<!DOCTYPE HTML>
<html>
    <head>
        <title>Proyecto lectura</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Widgets</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="/css/ionicons.min.css">
        <!-- Theme style -->
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
	<script>
            {literal}
	    // You can also use "$(window).load(function() {"
                $(function () {
		      // Slideshow 1
                    $("#slider1").responsiveSlides({
                        maxwidth: 1600, speed: 600
                    });
		});
                function mostrar(){
                    document.getElementById("boton").style.display = "none"; 
                    var elements = document.getElementsByClassName("more");
                    for(var i=0; i < elements.length; i++ ){
                        elements[i].style.display = "block";
                    }
                }
            {/literal}
	</script>
    </head>
    <body>
        <!---start-wrap---->
       
				
        <!---end-header---->
        <!--start-image-slider---->
        <div class="wrap">
            <div class="image-slider">
                <ul class="rslides" id="slider1">
                    <?php echo $slider; ?>
                </ul>		    		    
                <!-- Slideshow 2 -->
            </div>
            <!--End-image-slider---->
            <!---start-content---->
            <div class="content">
                <div class="section group">
                    <div class="col-md-3">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Mi biblioteca</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul>
                                  <li>Lorem ipsum dolor sit amet</li>
                                  <li>Consectetur adipiscing elit</li>
                                  <li>Integer molestie lorem at massa</li>
                                  <li>Facilisis in pretium nisl aliquet</li>
                                  <li>Faucibus porta lacus fringilla vel</li>
                                  <li>Aenean sit amet erat nunc</li>
                                  <li>Eget porttitor lorem</li>
                                </ul>
                              </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Notificaciones</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul>
                                  <li>Lorem ipsum dolor sit amet</li>
                                  <li>Consectetur adipiscing elit</li>
                                  <li>Integer molestie lorem at massa</li>
                                  <li>Facilisis in pretium nisl aliquet</li>
                                  <li>Faucibus porta lacus fringilla vel</li>
                                  <li>Aenean sit amet erat nunc</li>
                                  <li>Eget porttitor lorem</li>
                                </ul>
                              </div>
                        </div>
                    </div>
                    
                   <div class="col-md-3">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Clasificados</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul>
                                  <li>Lorem ipsum dolor sit amet</li>
                                  <li>Consectetur adipiscing elit</li>
                                  <li>Integer molestie lorem at massa</li>
                                  <li>Facilisis in pretium nisl aliquet</li>
                                  <li>Faucibus porta lacus fringilla vel</li>
                                  <li>Aenean sit amet erat nunc</li>
                                  <li>Eget porttitor lorem</li>
                                </ul>
                              </div>
                        </div>
                    </div>
                </div>			
            </div>
            <!---End-content---->
            <div class="clear"> </div>
        </div>
    </body>
</html>