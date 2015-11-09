<?php
//session_start();

//echo "<pre>"; print_r($_COOKIE); echo "</pre>";die;
	//if($_SESSION["login_user"] != "") //|| if(isset($_COOKIE[$cookie_user]))
		//header("location: index.php/home");

//error_reporting(E_ALL);

//include_once 'classes/dataBase.class.php';
//$db = new dataBase('');
//$sql = "SELECT id, nombre FROM libro"; 
//$result = $db -> QueryFetchArrayASSOC($sql);
//echo "<pre>"; print_r($result);echo "</pre>";
/*
array[0][id] -> 1
array[0][nombre] -> el lago de los cisnes


array[1][id] -> 1234543654765
array[1][nombre] -> libro 1342
*/



$arrSliderHeader = array();
$pos = 0;$pos2 = 0;
$arrSliderHeader[$pos]['titulo'] = "Lo mas recomendado";
$arrSliderHeader[$pos]['contenido_'.$pos2]['img'] = "imagen/a33.jpg";
$arrSliderHeader[$pos]['contenido_'.$pos2]['txt'] = "Inspirada en el universo de Star Trek, viajeros perdidos en un planeta desconocido";
$pos2++;
$arrSliderHeader[$pos]['contenido_'.$pos2]['img'] = "imagen/a22.jpg";
$arrSliderHeader[$pos]['contenido_'.$pos2]['txt'] = "Ensayo de materiales de PVC para utilizacion en laboratorio de microbiologia";
$pos2++;
$arrSliderHeader[$pos]['contenido_'.$pos2]['img'] = "imagen/a11.jpg";
$arrSliderHeader[$pos]['contenido_'.$pos2]['txt'] = "Proyecto de educacion de la ciudad de mexico, material docente de calidad educativa ";

$pos++;$pos2 = 0;
$arrSliderHeader[$pos]['titulo'] = "Lo mas descargado";
$arrSliderHeader[$pos]['contenido_'.$pos2]['img'] = "imagen/a22.jpg";
$arrSliderHeader[$pos]['contenido_'.$pos2]['txt'] = "Ensayo de materiales de PVC para utilizacion en laboratorio de microbiologia";
$pos2++;
$arrSliderHeader[$pos]['contenido_'.$pos2]['img'] = "imagen/a33.jpg";
$arrSliderHeader[$pos]['contenido_'.$pos2]['txt'] = "Inspirada en el universo de Star Trek, viajeros perdidos en un planeta desconocido";
$pos2++;
$arrSliderHeader[$pos]['contenido_'.$pos2]['img'] = "imagen/a11.jpg";
$arrSliderHeader[$pos]['contenido_'.$pos2]['txt'] = "Proyecto de educacion de la ciudad de mexico, material docente de calidad educativa ";


$pos++;$pos2 = 0;
$arrSliderHeader[$pos]['titulo'] = "Ultimos publicados";
$arrSliderHeader[$pos]['contenido_'.$pos2]['img'] = "imagen/a11.jpg";
$arrSliderHeader[$pos]['contenido_'.$pos2]['txt'] = "Proyecto de educacion de la ciudad de mexico, material docente de calidad educativa ";
$pos2++;
$arrSliderHeader[$pos]['contenido_'.$pos2]['img'] = "imagen/a22.jpg";
$arrSliderHeader[$pos]['contenido_'.$pos2]['txt'] = "Ensayo de materiales de PVC para utilizacion en laboratorio de microbiologia ";
$pos2++;
$arrSliderHeader[$pos]['contenido_'.$pos2]['img'] = "imagen/a33.jpg";
$arrSliderHeader[$pos]['contenido_'.$pos2]['txt'] = "Inspirada en el universo de Star Trek, viajeros perdidos en un planeta desconocido";


$slider = '';
foreach ($arrSliderHeader as $key => $value) {
	$slider .= '
	<li >	
		<table >
        
			<tr ><td colspan = 3 ><h4>'.$value['titulo'].'</h4></td></tr>
      		<tr >
            <div  >
      			<td >
	    			<img  src="'.$value['contenido_0']['img'].'"><br/><p>'.$value['contenido_0']['txt'].'</p>		
	    		</td>
	    		<td>
	    			<img src="'.$value['contenido_1']['img'].'"><br/><p>'.$value['contenido_1']['txt'].'</p>		
	    		</td>
	      		<td>
	      			<img src="'.$value['contenido_2']['img'].'"><br/><p>'.$value['contenido_2']['txt'].'</p>		
	      		</td>
            </div>
	   		</tr>
        
   		</table>
	</li>';
}

//$sql = "SELECT nombre FROM libro";
//$misTrabajosArr = $db -> QueryFetchArrayASSOC($sql);
//$misTrabajos = array();// '<ul style = "list-style-type: circle;">';
//foreach ($misTrabajosArr as $key => $value) {
//	$misTrabajos .= '
//	<li>
		//<a href="#">'.$value['nombre'].'</a>
//	</li>';
//}
//$misTrabajos .= '</ul>';
//echo "<pre>"; print_r($misTrabajosArr);echo "</pre>";
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Proyecto lectura</title>
        <script src="js/jquery.min.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="legend iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<link href='css/font-Ropa+Sans.css' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		
        
        
        
        
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 1
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
				<!---start-logo---->
				      <div class="logo">
					      <a href="">
					      	<img style="max-width:100%;" src="imagen/logoPL.png" title="logo" height = 50 />
				      	</a>
				      </div>
				      <!---end-logo---->
				      <!---start-search---->
				      <div class="top-search-bar">
					      <div class="header-top-nav">
						      <ul>
							      <li><a href="pages/layout/login.php"><span class="botones">Iniciar Sesion</span></a></li>
							      <li><a href="pages/layout/registro.php"><span class="botones">Registrarse</span></a></li>
					  	 		      
						      </ul>
					      </div>
				      </div>
				      <div class="clear"> </div>
				</div>
			</div>
				<div class="clear"> </div>
				
			<!---end-header---->
			<!--start-image-slider---->
			<div class="wrap">
					<div class="image-slider">
						<!-- Slideshow 1 
						<div style="height: 200px;">Slider de no me acuerdo que</div>
						-->
					    <ul class="rslides" id="slider1">
					      	<?php echo $slider; ?>
					    </ul>
					    
					    
						 <!-- Slideshow 2 -->
					</div>
					<!--End-image-slider---->
					<!---End-content---->
					<div class="clear"> </div>
				</div>
					<div class="footer"> 
						<div class="wrap"> 
							<div class="footer-left">
									&copy; 2015 ProyectoLectura.com 
							</div>
							
							<div class="footer-right">
								<p></p> </div>
							
							<div class=="clear"> </div>
						</div>
						<div class="clear"> </div>
					</div>
		<!---end-wrap---->
	</body>
</html>