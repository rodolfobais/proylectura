<?php 
session_start(); 
if(isset($_GET['close']) and $_GET['close']==1){ // si vino la variable por get, destruye las variables de session
	$_SESSION['login']=0;
	$_SESSION['usuario']=''; 
	session_destroy();
}

?>
<link href="/proylectura/css/cuerpo.css" type="text/css"  rel="stylesheet"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link rel="stylesheet" type="text/css" href="css/iframe-style.css" />
    <div id="columna_centro">
    <h4>SUBIR AUDIOLIBRO</h4>	
    <?php 
        if(isset($_GET['upload'])){
        echo 'Subido con éxito';
        }
    ?>
    	  <form name="formmp3" method="POST" action="php/mp3.php" enctype="multipart/form-data">
  			<div class="cont">
         	<label style="margin-left:10px;">Audiolibro: </label>
         	<br />
         	<input type="file" id="mp3" value="" name="mp3"  /> 
            
         </div>
   	  <div class="cont">
         	<label style="margin-left:10px;">Nombre del Audiolibro: </label>
         	<br />
         	<input type="text" id="nombreaudiolibro" name="nombreaudiolibro" value="" />                
         </div>
        
        <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $_SESSION['login']; ?>" />
            
        <div class="cont">
        <input name="enviar" type="submit" value="Subir" />
        </div>	
    </form>
    </div>
<br/><br/><br/><br/><br/><br/><br/>