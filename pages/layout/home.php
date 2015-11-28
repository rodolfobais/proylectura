<?php 
 //die; 
 error_reporting(E_ALL); 
 ini_set("display_errors", 1); 
 include_once("../../data/config.php"); 
  
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
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">'.$categ->getDescrp().'</h3>
                        </div>
                        <div class="box-body">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                    ';
    /*
    $sliders = '                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>';*/
    $pos=0; $active = ' class="active"';
    foreach ($sliderMae as $sliderItem) {
        if($pos != 0){$active = "";}
        $sliders .= '              <li data-target="#carousel-example-generic" data-slide-to="'.$pos++.'" '.$active.'></li>
                            ';
     }
    $sliders .= '                </ol>
                                <div class="carousel-inner">
                            ';
    /*
    $sliders .= '                    <div class="item active">
                                        <img src="http://placehold.it/900x500/39CCCC/ffffff&text=I+Love+Bootstrap" alt="First slide">
                                        <div class="carousel-caption">First Slide</div>
                                    </div>
                                    <div class="item">
                                        <img src="http://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide">
                                        <div class="carousel-caption">Second Slide</div>
                                    </div>
                                    <div class="item">
                                        <img src="http://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap" alt="Third slide">
                                        <div class="carousel-caption">Third Slide</div>
                                    </div>';*/
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
                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="fa fa-angle-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Widgets</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">-->
        <!-- Font Awesome 
        <link rel="stylesheet" href="/css/font-awesome.min.css">-->
        <!-- Ionicons 
        <link rel="stylesheet" href="/css/ionicons.min.css">-->
        <!-- Theme style -->
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load.
        <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css"> -->

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
                    //$("#slider1").responsiveSlides({maxwidth: 1600, speed: 600});
                    $('.carousel').carousel();
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
            <!--End-image-slider---->
            <!---start-content---->
            <div class="content">
                <div class="row">
                    <?php echo $sliders; ?>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="box box-default box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Mi biblioteca</h3>
                                    <div class="box-tools pull-right">
                                        <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                                    </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul>
                                    <?php echo $listaLibros;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="box box-default box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Notificaciones</h3>
                                    <div class="box-tools pull-right">
                                        <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                                    </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul>
                                  <li>Lorem ipsum dolor sit amet</li>
                                  <li>Consectetur adipiscing elit</li>
                                  <li>Integer molestie lorem at massa</li>
                                  <li>Facilisis in pretium nisl aliquet</li>
                                  <li>Faucibus porta lacus fringilla vel</li>
                                </ul>
                              </div>
                        </div>
                    </div>
                    
                   <div class="col-md-3">
                        <div class="box box-default box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Clasificados</h3>
                                    <div class="box-tools pull-right">
                                        <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                                    </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul>
                                  <li>Lorem ipsum dolor sit amet</li>
                                  <li>Consectetur adipiscing elit</li>
                                  <li>Integer molestie lorem at massa</li>
                                  <li>Facilisis in pretium nisl aliquet</li>
                                  <li>Faucibus porta lacus fringilla vel</li>
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