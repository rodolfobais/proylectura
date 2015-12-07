<?PHP
function ImpresionDocumento($bloques, $parametros, $orientacion, $pdf, $tplidx) {
   require("../../PIRAMIDE/config/config.inc.php");
 
	$connection = mssql_connect ($dbServer, $dbUser, $dbPass) OR die ("Error en la conexion***");
	mssql_select_db( $dbName );//Conexion a Zurich_PTCore
	//Busco a que base a la que me debo conectar
	$query = "EXEC WS_OBTENER_DB '".$_SESSION['IDSISTEMA']."'";
	$result = mssql_query($query, $connection) OR die ("Error: ".$query."<hr> ".mssql_get_last_message()."<BR>");
	$i=0;
	unset($vlist);
	while ($list = @mssql_fetch_row($result)){
	  $cantidadLineas = count($list);
	  for($j = 0; $j < $cantidadLineas; $j++){
		$vlist[$i][$j] = $list[$j];
	  }
	  $i++;
	}
	$dbNamePE = $vlist[0][0];
	unset($vlist);

	mssql_select_db( $dbNamePE );//Conexion a DB correspondiente al Sistema
   
   // RECORRO EL ARRAY DE BLOQUES
   for ($b=0;$b<count($bloques);$b++) {
     // OBTENGO LA CONSULTA PARA GENERAR LOS DATOS   
     $sp = $bloques[$b][3];
     
     
     foreach ( $parametros as $indice=>$valor ) {
       $sp = ereg_replace($indice, $valor, $sp);
     }
     
     $result = mssql_query($sp, $connection) OR die ("Error: ".$sp."<hr> ".mssql_get_last_message()."<BR>");
     $i=0;
     while ($list = @mssql_fetch_row($result)){
       $cantidadLineas = count($list);
       for($j = 0; $j < $cantidadLineas; $j++){
         $vlist[$i][mssql_field_name($result, $j)] = $list[$j];
       }
       $i++;
     }

     $datos = $vlist;
     /*
     echo "<pre>bloques".count($bloques)."<br>";
     print_r($bloques);
     echo "</pre>";
    */
     // die;
     unset($vlist);
	 if (count($datos) == 0) {
	    return false;
	 }
	 
     // OBTENGO LOS BLOQUES PARA EL DOCUMENTO   
     $query  = " EXEC WSCamposDocumento ".$bloques[$b][0].", ".$bloques[$b][1];
     $result = mssql_query($query, $connection) OR die ("Error: ".$query."<hr> ".mssql_get_last_message()."<BR>");
     $j = 0;
     while ($list = @mssql_fetch_row($result)){
       $cantidadLineas = count($list);
       for ($k = 0; $k < $cantidadLineas; $k++){
         $vlist[$j][$k] = $list[$k];
       }
       $j++;
     }
     $campos = $vlist;
	 
	 
	 //ORDENO EL PDF EN CASO DE QUE EL SINIESTRO NO INVOLUCRE AUTOMOVILES O SIMILARES
	 
	 
	 //COMIENZA
	 // OBTENGO EL PRODUCTO
	 $producto = substr($datos[0][NRO_POLIZA],0,3);
	 $i = 0;
	 $j = 0;
	 //echo $producto;
	 if($bloques[$b][0] == 1)//Para el documento de notificación
	 {
		 if($producto != 020 and $producto != 031 and $producto != 120 and $producto != 220 and $producto != 420 and $producto != 431 and $producto != 820 and $producto != 920)
		 {
		 
			foreach($campos as $indice => $valor)
			{
					switch($indice)
					{
						case 22+$i:
						if($indice < 26){
						$campos[$indice][1] = 10;
						$campos[$indice][2] = 112 + ($i*3);
						}
						else
						{
						$campos[$indice][1] = 10;
						$campos[$indice][2] = 135 + ($i*3);
						}
						$i++;
						break;
					}
			}
		 }
	 }
	 else//Para el documento de Declaración
	 {
		$i = 0;
		$j = 0;
		$k = 0;
		if($producto != 020 and $producto != 031 and $producto != 120 and $producto != 220 and $producto != 420 and $producto != 431 and $producto != 820 and $producto != 920)
		{
			foreach($campos as $indice => $valor)
			{
				
					switch($indice)
					{
						case 27:
							$campos[$indice][1] = 10;
							$campos[$indice][2] = 123;
						break;
						case 28+$k:
						if($indice != 45 and $indice != 46 and $indice != 47 and $indice != 48)
						{
							if((28+$k)%2==0)
							{
								$campos[$indice][1] = 10;
								$campos[$indice][2] = 126 + ($i*3);
								$i++;
							}
							else
							{
								$campos[$indice][1] = 110;
								$campos[$indice][2] = 126 + ($j*3);
								$j++;
							}
						}
						else
						{
							if($indice == 45)
							{
							$campos[$indice][1] = 10;
							$campos[$indice][2] = 177;
							}
							elseif($indice == 46)
							{
							$campos[$indice][1] = 10;
							$campos[$indice][2] = 207;
							}
							elseif($indice == 47)
							{
							$campos[$indice][1] = 10;
							$campos[$indice][2] = 205;
							}
							elseif($indice == 48)
							{
							$campos[$indice][1] = 10;
							$campos[$indice][2] = 215;
							}
						}
						$k++;
						break;
					}
			}
		}
	 }
	 //TERMINA
	 
	 
	//echo "<pre>";
     //print_r($campos);
     //echo "</pre>";
     unset($vlist);
     if ($bloques[$b][2] == "A") {
       // RECORRO EL ARRAY DE CAMPOS A IMPRIMIR (DETALLE)
       nuevaPagina($pdf, $orientacion, $tplidx);
       for ( $c=0; $c<count($campos); $c++ ){
         // ASIGNO LAS CARACTERISTICAS DEL CAMPO A IMPRIMIR
         if ($campos[$c][15] == 'B') {
           $pdf->SetFont($campos[$c][4], 'B', $campos[$c][5]);
		 } else {
           $pdf->SetFont($campos[$c][4], '', $campos[$c][5]);
		 }
         $pdf->SetTextColor($campos[$c][6],$campos[$c][7],$campos[$c][8]); 
         // SI ES CODIGO DE BARRAS
         if ($campos[$c][13] == 'CB') {
           EscribeCodigoBarras($datos[0][$campos[$c][0]], $campos[$c][0], $campos[$c][1], $campos[$c][2], $pdf);
         } 
         // SI ES IMAGEN
         elseif ($campos[$c][13] == 'IM') { 
           EscribeImagen($datos[0][$campos[$c][0]], $campos[$c][0], $pdf);
         }
         // SI ES TEXTO DONDE SE CONCATENAN VARIOS CAMPOS
         elseif ( ereg('\|',$campos[$c][0]) ) {
           $campo = '';
           $concat = explode('|',$campos[$c][0]);
           for ( $d=0; $d<count($concat); $d++ ){
             $campo .= $datos[0][$concat[$d]];
           }
        
           EscribeTexto($campo, $campos[$c][1], $campos[$c][2], $campos[$c][10], $campos[$c][11], $campos[$c][12], $campos[$c][3], $campos[$c][14], $orientacion, $pdf, $tplidx);
         }
         // SI ES TEXTO NORMAL
         else {
           EscribeTexto($datos[0][$campos[$c][0]], $campos[$c][1], $campos[$c][2], $campos[$c][10], $campos[$c][11], $campos[$c][12], $campos[$c][3], $campos[$c][14], $orientacion, $pdf, $tplidx);
         }
  	   }
  	 } else {
           $item = 0;
           
	   for ( $u=0; $u<count($datos); $u++ ) {
	   
	   if (ereg('@',$datos[$u][$campos[0][0]]) && $campos[0][0] != 'T_PIE') {
            $adato = explode('@', $datos[$u][$campos[0][0]]);

            for ( $g=0; $g<count($adato); $g++ ){
               $dato = $adato[$g];
               ImpresionLista($campos, $dato, $item, $pdf, $orientacion, $tplidx);
               $item ++;
 			}
         } else {
            
              $dato = $datos[$u][$campos[0][0]];
              ImpresionLista($campos, $datos[$u], $item, $pdf, $orientacion, $tplidx);
              $item ++;
            
         }
       }
  	 }	 
   }
   return true;
}

function ImpresionLista($campos, $dato, $u, $pdf, $orientacion, $tplidx) {
   $renglon = 0;
   for ( $c=0; $c<count($campos); $c++ ) {
       
         $campo = (is_array($dato))?$dato[$campos[$c][0]]:$dato;
         $pdf->SetFont($campos[$c][4], '', $campos[$c][5]);
         $pdf->SetTextColor($campos[$c][6],$campos[$c][7],$campos[$c][8]);
         if ($campos[$c][13] == 'CB') {
            EscribeCodigoBarras($datos[$campos[$c][0]], $campos[$c][0], $campos[$c][1], $campos[$c][2], $pdf);
         }
         // SI ES IMAGEN
         elseif ($campos[$c][13] == 'IM') { 
            EscribeImagen($datos[$campos[$c][0]], $campos[$c][0], $pdf);
         }
         // SI ES TEXTO DONDE SE CONCATENAN VARIOS CAMPOS
         elseif ( ereg('\|',$campos[$c][0]) ) {
            $campo = '';
            $concat = explode('|',$campos[$c][0]);
            for ( $d=0; $d<count($concat); $d++ ){
               $campo .= $datos[$c][$concat[$d]];
            }
         } else {
            EscribeTexto($campo, $campos[$c][1], $campos[$c][2]+($u*3), $campos[$c][10], $campos[$c][11], $campos[$c][12], $campos[$c][3], $campos[$c][14], $orientacion, $pdf, $tplidx);
         }
   }
   return;
}

function nuevaPagina($pdf, $orientacion, $tplidx) {
   $pdf->addPage($orientacion);
   $pdf->useTemplate($tplidx, 0, 0);
   $pdf->SetTopMargin(0);
   $pdf->SetXY(0, 0);
   return;
}

// CREA UNA IMAGEN CON EL CODIGO DE BARRAS EN LA CARPETA pdfgen/temp Y SE PEGA EN EL FORMULARIO
function EscribeCodigoBarras($cb, $camcod, $x, $y, $pdf) {
   require_once("../barcode2/core.php");
   require("../config/config.inc.php");
   $connection = mssql_connect ($dbServer,$dbUser, $dbPass) OR die ("Error en la conexion***");
   $carpeta   = 'temp/';
   $extension = "jpg";
   // ASIGNO UN NOMBRE PARA LA IMAGEN A GENERAR
   $filenameAIG = $PDFCreationDir.rand(1000000000,9999999999);
   if ($cb != '') {
      // OBTENGO LOS PARAMETROS PARA GENERAR EL CODIGO DE BARRAS
      $query    = " EXEC WSDetalleCodigoBarras '".$camcod."' ";
      $resultCB = mssql_query($query, $connection) OR die ("Error: ".$query."<hr> ".mssql_get_last_message()."<BR>");
      $row = @mssql_fetch_row($resultCB);
      // GENERO EL CODIGO DE BARRAS Y LO GUARDA EN UN ARCHIVO
      $bc = barCode($row[0], $cb, $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $p_check, $row[9], $carpeta.$filenameAIG);
      // INSERTO LA IMAGEN DEL ARCHIVO CREADO EN EL DOCUMENTO
      $pdf->Image($carpeta.$filenameAIG.".".$extension."", $x, $y, $row[12], $row[13], '', '');
   }
   return;
}

// CREA UNA IMAGEN (TEXTO PROVEIDO) EN LA CARPETA pdfgen/temp Y SE PEGA EN EL FORMULARIO
function EscribeImagen($campo, $camcod, $pdf) {
   require("../config/config.inc.php");
   $connection = mssql_connect ($dbServer,$dbUser, $dbPass) OR die ("Error en la conexion***");
   // OBTENGO LOS PARAMETROS PARA GENERAR LA IMAGEN
   $query    = " EXEC WSDetalleImagen '".$camcod."' ";
   $resultIM = mssql_query($query, $connection) OR die ("Error: ".$query."<hr> ".mssql_get_last_message()."<BR>");
   $row = @mssql_fetch_row($resultIM);
   // ASIGNO UN NOMBRE PARA LA IMAGEN A GENERAR
   $carpeta     = 'temp/';
   $filenameAIG = $PDFCreationDir.rand(1000000000,9999999999);
   if (count($row>0)) {
      // GENERO LA IMAGEN 
      $im = @imagecreate($row[0], $row[1]) or die("Cannot Initialize new GD image stream");
      // ASIGNA LAS CARACTERISTICAS COMO COLOR DE FONDO, COLOR DE TEXTO Y ROTACION
      $background_color = imagecolorallocate($im, 255, 255, 255);
      $text_color = imagecolorallocate($im, 0, 0, 0);
      imagestring($im, $row[2], $row[3], $row[4], $campo, $text_color);
      $im = imagerotate($im, $row[5], $row[6]);
	  if (file_exists($carpeta.$filenameAIG.".png")) {
	     @unlink($carpeta.$filenameAIG.".png");
	  }
      // GUARDA LA IMAGEN EN UN ARCHIVO
      if (imagepng($im,$carpeta.$filenameAIG.".png")) {
         imagedestroy($im);
         // INSERTO LA IMAGEN DEL ARCHIVO CREADO EN EL DOCUMENTO
         $pdf->Image($carpeta.$filenameAIG.".png", $row[7], $row[8], $row[9], $row[10],'', ''); 
      }
   }
   return;
}

// IMPRESION STANDARD DE LOS CAMPOS EN LOS FORMULARIOS
function EscribeTexto($campo, $x, $y, $substring, $InicioSubstring, $LongitudSubstring, $pre, $post, $orientacion, $pdf, $tplidx) {
   // SI EL CAMPO CONTIENE '~' SE ARMA UN ARRAY Y SE IMPRIME DICHO ARRAY, SE UTILIZA 
   // PARA LAS CONDICIONES PARTICULARES, SI ES NECESARIO AGREGA NUEVAS HOJAS
   
    if ( ereg('@',$campo) ) {
      $arrcondiciones = explode('@',$campo);
      $j = 0;
      // RECORRE EL ARRAY GENERADO Y LO IMPRIME EN POSICION RELATIVA
      for ( $g=0; $g<count($arrcondiciones); $g++ ){
         // IMPRIME LA LINEA
         $pdf->SetXY($x, $y+($j*2.7));
         //$pdf->Write(0, $arrcondiciones[$g]);
         $j++;
         
         // SI ES NECESARIO SE DA DE ALTA UNA NUEVA PAGINA EN EL DOCUMENTO
         if ($j > 81) {
            $pdf->addPage($orientacion);
            $pdf->useTemplate($tplidx, 0, 0);
            $pdf->SetTopMargin(0);
            $pdf->SetXY($x, $y);
            $j = 0;
         }
         // IMPRIME LA LINEA
         
         $pdf->Write(0, $arrcondiciones[$g]);
      }
   }
   else {
      // ASIGNO LAS COORDENADAS DONDE SE IMPRIME EL CAMPO
      $pdf->SetXY($x, $y);
      // ASIGNO EL INICIO Y LONGITUD A IMPRIMIR DEL CAMPO         
      if ( $substring != 'S' ) {
         $InicioSubstring   = 0;
         $LongitudSubstring = strlen($campo);
      }
      // IMPRIME EL TEXTO EN EL DOCUMENTO
	  if ($pre != '') {
         $pdf->Write(0, $pre);
	  }
	  if ($post != 0) {
         $pdf->SetX($x+$post);
	  }
      $pdf->Write(0, substr($campo,$InicioSubstring,$LongitudSubstring));
	  
//    $pdf->Write(0, $pre.substr($campo,$InicioSubstring,$LongitudSubstring));
   }
   return;
}
?>