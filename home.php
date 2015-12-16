<?php
//die; 
 error_reporting(E_ALL); 
 ini_set("display_errors", 1); 
 include_once("data/config.php"); 
  
 $libros = LibroQuery::create()->limit(5)->find(); 
  
 $listaLibros = ""; 
 foreach ($libros as $reg) { 
     $listaLibros .= "<li>".$reg->getNombre()."</li>"; 
 } 
 
 //$sliderItem = Slider_maeQuery::create()->findOneById(1);
 //$sliderItem->getLibro()->getImage();
 //$sliderItem->getLibro()->getNombre();
 //Armo los slider
 $categoriasSlider = Slider_categQuery::create()->limit(4)->find();
 $sliders = "";
 foreach ($categoriasSlider as $categ) {
     $sliderMae = Slider_maeQuery::create()->filterById_categoria($categ->getId())->find();
     $sliders .= '<div class="col-md-3">
                    <div><!-- class="box box-solid"-->
                        <div class="box-header">
                            <h3 class="box-title">'.$categ->getDescrp().'</h3>
                        </div>
                        <div class="box-body">
                            <div id="carousel-example-generic-'.$categ->getId().'" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                    ';
    $pos=0; $active = ' class="active"';
    foreach ($sliderMae as $sliderItem) {
        if($pos != 0){$active = "";}
        $sliders .= '              <li data-target="#carousel-example-generic-'.$categ->getId().'" data-slide-to="'.$pos++.'" '.$active.'></li>
                            ';
     }
    $sliders .= '                </ol>
                                <div class="carousel-inner">
                            ';
    $pos=0; $active = ' active';
    foreach ($sliderMae as $sliderItem) {
        if($pos != 0){$active = "";}
        $pos++;
        $sliders .= '                <div class="item'.$active.'">
                                        <img style="max-height:300px" src="'.PROJECT_REL_DIR.'/imagen/'.$sliderItem->getLibro()->getImage().'" alt="'.$sliderItem->getLibro()->getNombre().'">
                                        <div class="carousel-caption"><b>'.$sliderItem->getLibro()->getNombre().'</b></div>
                                    </div>
                            ';
    }
    $sliders .= '                </div>
                                <a class="left carousel-control" href="#carousel-example-generic-'.$categ->getId().'" data-slide="prev">
                                    <span class="fa fa-angle-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic-'.$categ->getId().'" data-slide="next">
                                    <span class="fa fa-angle-right"></span>
                                </a>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>';
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Proyecto lectura</title>
        <link rel="icon"  href="<?php echo PROJECT_REL_DIR;?>/images/favicon.ico" />
        <script src="js/jquery.min.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
        <meta name="keywords" content="legend iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <link href='css/font-Ropa+Sans.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/responsiveslides.css">
        <script src="js/responsiveslides.min.js"></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <script type="text/javascript" src="<?php echo PROJECT_REL_DIR;?>/js/jquery-1.4.2.min.js"></script>
        <!--  <script src="<?php echo PROJECT_REL_DIR;?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
        <script type="text/javascript" src="<?php echo PROJECT_REL_DIR;?>/js/ajax.js"></script>
        
        <link href="<?php echo PROJECT_REL_DIR;?>/css/base.css" type="text/css"  rel="stylesheet"/>
        <link href="<?php echo PROJECT_REL_DIR;?>/css/cuerpo.css" type="text/css"  rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo PROJECT_REL_DIR;?>/js/jquery-1.9.0.min.js"></script>
        <link rel="stylesheet" href="<?php echo PROJECT_REL_DIR;?>/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo PROJECT_REL_DIR;?>/css/font-awesome.min.css">
        
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo PROJECT_REL_DIR;?>/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo PROJECT_REL_DIR;?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo PROJECT_REL_DIR;?>/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo PROJECT_REL_DIR;?>/dist/css/skins/_all-skins.min.css">
        <link href="<?php echo PROJECT_REL_DIR;?>/css/crearlista.css" type="text/css"  rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo PROJECT_REL_DIR;?>/plugins/datatables/dataTables.bootstrap.css">
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
        $(window).load(function() {
            //$(function () {
                  $("#slider1").responsiveSlides({
                    maxwidth: 1600, speed: 600
                  });
            });
        </script>
    </head>
    <body>
        <!---start-wrap---->
        <!---start-header---->
        <div class="header">
            <div class="wrap">
                <div class="logo">
                    <a href="">
                        <img style="max-width:100%;" src="imagen/logoPL.png" title="logo" height = 50 />
                    </a>
                </div>
                <div class="top-search-bar">
                    <div class="header-top-nav">
                        <ul>
                            <li><a href="login.php"><span class="botones">Iniciar Sesion</span></a></li>
                            <li><a href="registro.php"><span class="botones">Registrarse</span></a></li>	  	 		      
                        </ul>
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
        </div>
        <div class="clear"> </div>
        <center>
            <div class="wrap">
                <div class="row"><?php echo $sliders; ?></div>
                <div class="clear"> </div>    
            </div>
        </center>
        <div class="footer"> 
            <div class="wrap"> 
                <div class="footer-left">&copy; 2015 ProyectoLectura.com</div>
                <div class="footer-right"><p></p> </div>					
                <div class="clear"> </div>
            </div>
            <div class="clear"> </div>
        </div>
        <script src="<?php echo PROJECT_REL_DIR;?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo PROJECT_REL_DIR;?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo PROJECT_REL_DIR;?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo PROJECT_REL_DIR;?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo PROJECT_REL_DIR;?>/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo PROJECT_REL_DIR;?>/dist/js/app.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo PROJECT_REL_DIR;?>/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="<?php echo PROJECT_REL_DIR;?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo PROJECT_REL_DIR;?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo PROJECT_REL_DIR;?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="<?php echo PROJECT_REL_DIR;?>/plugins/chartjs/Chart.min.js"></script>
        <script type="text/javascript" src="<?php echo PROJECT_REL_DIR;?>/js/jquery.json.js"></script>
        <script src="<?php echo PROJECT_REL_DIR;?>/plugins/fastclick/fastclick.min.js"></script>
        <script src="<?php echo PROJECT_REL_DIR;?>/js/home.js"></script>
        <script type="text/javascript">
            $( document ).ready(function() {
                //refreshDivs('cuerpocentro','pages/layout/home.php');
                iniciarcarousel();
                //actualizacionesAutomaticas();
            });
            
        </script>
    </body>
</html>