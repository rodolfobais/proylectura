<?php
    //set_time_limit(512);
    //aumentamos memoria del servidor si es necesario 
    //////ini_set("memory_limit","1024M"); //rdiaz
    session_start();    
    require_once('pdfDocs.class.php');
    require_once("dompdf/dompdf_config.inc.php");
    
    $arrBloques        = array();
    $arrDocs           = array();
    $oDocumento        = new pdfDocs();
    
    $oDocumento->setSubSiniestro( $_REQUEST[u] );
    $oDocumento->setTramite(      $_REQUEST[t] );
    $oDocumento->setSiniestro(    $_REQUEST[s] );
    $oDocumento->setItem(         $_REQUEST[i] );
    $oDocumento->setOrden(        $_REQUEST[o] );
    $oDocumento->setProveedor(    $_REQUEST[p] );
    $oDocumento->setCodigoDoc(    $_REQUEST[d] );
 
    $arrDocs = $oDocumento->getDocsImprimir();
    
    if($arrDocs[0][1] == "Orden de Reparación"){
        $arrBloques   = $oDocumento->getBloquesDoc();
        $arrSPBloques = getSpBloques( $oDocumento, $arrBloques );
    }
    
    if( !empty($arrSPBloques) ){
        
        $arrCamposBloque = $oDocumento->getCamposBloque( $arrSPBloques[0] );
        $arrItemsBloque  = $oDocumento->getCamposBloque( $arrSPBloques[1] );
        $arrTotales      = $oDocumento->getCamposBloque( $arrSPBloques[2] );
        $TPLOrden        = getCamposTPL( $arrCamposBloque[0], $arrItemsBloque, $arrTotales[0] );
 
        $dompdf = new DOMPDF();
        $dompdf->load_html( $TPLOrden );
        /*
        ini_set("max_execution_time","2500");
        ini_set("max_input_time","180");
        ini_set("memory_limit","200M");     
        */
        $dompdf->set_base_path( "pdfstyles.css" );
                            
        $dompdf->render(); 
        $array_opciones = array(
			 "afichero" => 1,
			 "compress" => 1
			); 
        $dompdf->stream("orden_de_reparacion.pdf",$array_opciones);
             
        
        /*
        $tmpfile = tempnam("/tmp", "dompdf_");
        file_put_contents($tmpfile, $TPLOrden); // Replace $smarty->fetch()// with your HTML string
        $url = "PE/PDFGEN/dompdf/dompdf.php?input_file=" . rawurlencode($tmpfile) . 
       "&paper=letter&output_file=" . rawurlencode("My Fancy PDF.pdf");
        header("Location: http://localhost/jc_zurich_dcs/$url");
        */
    }
    
    
    /**
     * Retorno array con stores procedures listos para ejecutar.
     * @param array $arrBloques 
     */
    function getSpBloques( $oDocumento, $arrBloques ){
        
        $arrCamposBloque = array();
        $spBloques       = array();
        
        foreach( $arrBloques as $bloque ){

            $iCodigoDoc = $bloque[0];
            $iCodigoBlq = $bloque[1];
            $spBloque   = $bloque[3];

            $spBloque    = str_replace( 'NROTRAMITE',   $oDocumento->getTramite(),      $spBloque );
            $spBloque    = str_replace( 'SUBSINIESTRO', $oDocumento->getSubSiniestro(), $spBloque );
            $spBloque    = str_replace( 'SINIESTRO',    $oDocumento->getSiniestro(),    $spBloque );
            $spBloque    = str_replace( 'ITEM',         $oDocumento->getItem(),         $spBloque );
            $spBloque    = str_replace( 'ORDEN',        $oDocumento->getOrden(),        $spBloque );
            $spBloque    = str_replace( 'IDPROVEEDOR',  $oDocumento->getProveedor(),    $spBloque );
            $spBloques[] = $spBloque;
            
        }
        
        return $spBloques;
    }

    
    function replaceBreakLine( $value ){
     
//        if( !empty($valueReplaced) ){
            $valueReplaced = str_replace("@","<br />",$value);
            return $valueReplaced;
  //      }
    //    return false;
    }
    
    
    function getLogoLocation(){
        
       $arrayDir = explode("\\",$_SERVER['SCRIPT_FILENAME']);
       $arrayDir[count($arrayDir)-1] = "";
       $arrayDir  = implode("\\",$arrayDir);
       $logoImage = $arrayDir."EncabezadoOrdenes.jpg";
       return $logoImage;
        
    }
    function getSingLocation(){
        
       $arrayDir = explode("\\",$_SERVER['SCRIPT_FILENAME']);
       $arrayDir[count($arrayDir)-1] = "";
       $arrayDir  = implode("\\",$arrayDir);
       $logoImage = $arrayDir."sings/sello.jpg";
       return $logoImage;
        
    }
    /**
     *
     * @param object $smarty objeto smarty.
     * @param array $arrCamposBloque arreglo con los campos.
     */
    function getCamposTPL( $arrCamposBloque, $arrItemsBloque, $arrTotales ){
        /*
        echo "<pre>"; print_r($arrCamposBloque); echo "</pre>";
        echo "<pre>"; print_r($arrItemsBloque); echo "</pre>";
        echo "<pre>"; print_r($arrTotales); echo "</pre>";
        die;
        */
        
        $sContent = '<html>
                 <body>
				<script type="text/php">
				if ( isset($pdf) ) { 
			        $font = Font_Metrics::get_font("helvetica", "normal");    
			        $pdf->page_text(560, 26, "{PAGE_NUM}/{PAGE_COUNT}", $font, 12, array(0,0,0));
			        $font = Font_Metrics::get_font("sans-serif", "normal");
					$pdf->page_text(245, 25,"{CABECERA}", $font, 10, array(0,0,0),0,0,"'.$arrCamposBloque[1]." ".$arrCamposBloque[2].'");
				} 
				</script>
                 ';
                 
                //---------------------------- 
                //divido observaciones en bloques de 2500 caracteres  las observaciones                              
                if(strlen($arrCamposBloque[21])>125){
                    $arrCamposBloque21 = wordwrap($arrCamposBloque[21],125,"@@@@@");  
                    $arrCamposBloque21 = explode('@@@@@',$arrCamposBloque21);
                }
                else{
                    $arrCamposBloque21 = 0;
                }
                //----------------------------
                /*echo "<pre>";
                print_r($arrCamposBloque21);
                echo "</pre>";die;*/
   			 	if ($arrCamposBloque[30] != ''){
                 	$reemplaza_a = "(REEMPLAZA A $arrCamposBloque[1] $arrCamposBloque[30])";
                 }else{
                 	$reemplaza_a = "";
                 }
        $sContent .= "
                <style type='text/css'>
	                body{
	                	font-size: 9pt;
	                	font-family: sans-serif;
	    			}
	    			.nume{
	    				/*width: 10px;*/
	    				text-align: left;
	    			}
	    			.nume2{
	    				/*width: 10px;*/
	    				text-align: right;
	    			}
                    .nume3{
	    				/*width: 10px;*/
                        text-align: left;
	    				vertical-align:text-top;
	    			}
	    			.tabla{
	    				padding:0px 0px 0px 0px;
	    				margin:0px 0px 0px 0px;
	    			}
	    			TD{
	    				padding:0px 0px 0px 0px;
	    				margin:0px 0px 0px 0px;
	    			}
    			</style>        
                <div style='width:800px;margin:0 auto;' id='container'>
                <table width='550'>
                        <tr>
                            <td colspan='1' align='right'><img src=".getLogoLocation()." width=\"610\" /><br /><br />$arrCamposBloque[0]</td>
                        </tr>
                        <tr>
                            <td align='center' colspan='2'>$arrCamposBloque[1] $arrCamposBloque[2] $reemplaza_a</td>
                        </tr>
                </table>
                
                <!--datos generales-->                
                
                <table width='550' CELLPADDING='0'>
                    <thead>
                        <tr>
                            <th colspan='4' align='left' height='10'>$arrCamposBloque[3]</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td width='80'>Tomador:</td>
                        <td>$arrCamposBloque[4]</td>
                        <td width='80'>Asegurado:</td>
                        <td>$arrCamposBloque[5]</td>
                    </tr>
                    <tr>
                        <td width='80'>P&oacute;liza Nro:</td>
                        <td>$arrCamposBloque[6]</td>
                        <td width='80'>Certificado Nro:</td>
                        <td>$arrCamposBloque[7]</td>
                    </tr>
                    <tr>
                        <td width='80'>Nro. Siniestro:</td>
                        <td>$arrCamposBloque[8]</td>
                        <td width='80'>Fecha Ocurrencia:</td>
                        <td>$arrCamposBloque[9]</td>
                    </tr>
                    <tr>
                        <td>Analista:</td>
                        <td>$arrCamposBloque[10]</td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                    
                </table>
                
                 <!--datos del vehiculo-->  
                
                <table width='600' CELLPADDING='0'>
                    <thead>
                        <tr>
                            <th colspan='3' align='left' height='10'>$arrCamposBloque[11]</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width='50'><label>A&ntilde;o:</label></td>
                            <td>$arrCamposBloque[12]</td>
                            <td width='50'><label>Marca:</label></td>
                            <td>$arrCamposBloque[13]</td>
                        </tr>
                        <tr>
                            <td width='50'><label>Modelo:</label></td>
                            <td>$arrCamposBloque[14]</td>
                            <td width='50'><label>L&iacute;nea:</label></td>
                            <td>$arrCamposBloque[15]</td>
                        </tr>
                        <tr>
                            <td width='50'><label>Transmisi&oacute;n:</label></td>
                            <td></td>
                            <td width='50'><label>Placa:</label></td>
                            <td>$arrCamposBloque[17]</td>
                        </tr>
                        <tr>
                            <td width='50'><label>Serial:</label></td>
                            <td>$arrCamposBloque[19]</td>
                            <td width='50'><label></label></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                
                <!--datos de ajuste-->  
        
                <table width='550'>
                    <thead>
                        <tr>
                            <th  align='left' height='10'>$arrCamposBloque[20]</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>";  
                        
                        if($arrCamposBloque21==0){                        
                           $sContent .= "<td><strong>Observaciones:</strong><br />".replaceBreakLine($arrCamposBloque[21])."</td></tr>";                            
                        }   
                        else{
                            $sContent .= "<td><strong>Observaciones:</strong><br /></td></tr>";
                            for($rds=0;$rds<count($arrCamposBloque21);$rds++){
                                $sContent .= "<tr><td>".replaceBreakLine($arrCamposBloque21[$rds])."</td></tr>"; 
                            }
                        }
                        
          $sContent .= "
                    </tbody>
                </table>
                
                <!--datos proveedor-->
                
                <table width='550'>
                    <thead>
                        <tr>
                            <th align='left' height='10' colspan='2'>$arrCamposBloque[22]</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td  width='80'><label>Nombre:</label></td>
                            <td><strong>$arrCamposBloque[23]</strong></td>
                        </tr>
                    </tbody>
                </table>
                
                <!--sirvase...-->
                
                <table width='540'>
                    <thead>
                        <tr>
                            <th align='left' colspan='2'>$arrCamposBloque[24]</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td  width='80'><label>Nombre:</label></td>
                            <td>$arrCamposBloque[25]</td>
                        </tr>
                        <tr>    
                            <td  width='80'><label>Direcci&oacute;n:</label></td>
                            <td>$arrCamposBloque[26]</td>
                        </tr>
                        <tr>
                            <td  width='80'><label>Persona Contacto:</label></td>
                            <td>$arrCamposBloque[27]</td>
                        </tr>
                        <tr>      
                            <td  width='80'><label>Tel&eacute;fono:</label></td>
                            <td>$arrCamposBloque[28]</td>
                        </tr>
                    </tbody>
                </table>
               
                <!--  -->
    
                <table width='550'>
                    <!--<thead><tr>-->
                        <!--<tr><td><strong>$arrCamposBloque[29] PRUEBA5</strong></td></tr>-->
                        <!--<td><strong>$arrCamposBloque[30]</strong></td>-->
                       <!-- <td><strong>$arrCamposBloque[31]</strong></td>-->
                    <!--</tr></thead>-->";
                    
                    /////////////                                       
                    for($nroMO=0;$nroMO<count($arrItemsBloque);$nroMO++){
                        $items = $arrItemsBloque[$nroMO];                       
                        /*echo "<pre>";
                        print_r($items);
                        echo "</pre>";die;*/
                        //------------
                            //divido observaciones en bloques de 2500 caracteres  las observaciones                              
                                $items[0] = "<strong>$arrCamposBloque[29] ".($nroMO+1).":</strong>".$items[0];
                                if(strlen($items[0])>125){
                                    $itemSeg = wordwrap($items[0],125,"@@@@@");  
                                    $itemSeg = explode('@@@@@',$itemSeg);
                                }
                                else{
                                    $itemSeg = 0;
                                }
                        //------------
                                if($itemSeg == 0){
                                    $sContent .= "<tr><td width='450'>".replaceBreakLine($items[0])."</td></tr>";
                                }
                                else{
                                   // $sContent .= "<tr>                                                      
                                   //                   <td><table border=1 >";
                                    
                                        for($rdx=0;$rdx<count($itemSeg);$rdx++){
                                            if($rdx==0){
                                                $sContent .= "<tr><td width='500'>".replaceBreakLine($itemSeg[$rdx])."</td></tr>";
                                            }
                                            else{
                                                $sContent .= "<tr><td width='500'>".replaceBreakLine($itemSeg[$rdx])."</td></tr>";
                                            }                                            
                                        }
                                }
                                $sContent .= "<tr><td class='nume' width='50'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                              Total $arrCamposBloque[29] ".($nroMO+1)."......................................................................................
                                              BsF ".replaceBreakLine($items[1])."</td></tr>
                                              <tr><td>&nbsp;&nbsp;&nbsp;</td></tr>";
                                               
                        //------------       
                    }
                    ////////////////
                    
                    /*foreach($arrItemsBloque as $items){
                        $sContent .= "<tr>";
                        if ($i++ % 2 == 0) { foreach($items as $item){ if ($i2++ == 1) {  $sContent .= "";$i3=0;//"<td class='nume2' style='background-color:#DDDDDD;' ><!--".replaceBreakLine($item)."--></td>";   }
                                else{  $sContent .= "<td class='nume' width='550'>".replaceBreakLine($item)."</td>";$i3=0;  }  }  
                            } else{ foreach($items as $item){ if ($i3++ != 1) {  $sContent .= "<td class='nume' width='550'>".replaceBreakLine($item)."</td>";$i2=0;  }
                                else{ $sContent .= "";$i2=0;//"<td class='nume2'><!--".replaceBreakLine($item)."--></td>";$i2=0;  } } }
                        
                        $sContent .= "<td class='nume' width='550'>".replaceBreakLine($item)."</td>";
                        $sContent .= "</tr>";                        
                    }*/
                $sContent .= "</table>";
                $sContent .= "<BR>
                		<table><tr><td>
                			<table width='200' height='500'>
                                <tr>
                                    <td colspan='2' height='20'></td>
                                </tr>
                                <tr>
                                    <td>$arrTotales[0]</td>
                                    <td class='nume2'>".replaceBreakLine($arrTotales[6])."</td>
                                </tr>
                                <tr>
                                    <td>$arrTotales[1]</td>
                                    <td class='nume2'>".replaceBreakLine($arrTotales[7])."</td>
                                </tr>
                                <tr>
                                    <td>$arrTotales[2]</td>
                                    <td class='nume2'>".replaceBreakLine($arrTotales[8])."</td>
                                </tr>
                                <tr>
                                    <td>$arrTotales[3]</td>
                                    <td class='nume2'>".replaceBreakLine($arrTotales[9])."</td>
                                </tr>
                                <tr>
                                    <td>$arrTotales[4]</td>
                                    <td class='nume2'>".replaceBreakLine($arrTotales[10])."</td>
                                </tr>
                                <tr>
                                    <td>$arrTotales[5]</td>
                                    <td class='nume2'>".replaceBreakLine($arrTotales[11])."</td>
                                </tr>
                            </table>
						</td></tr></table>
						<table width='550' align='center'><tr><td align='center'>
                            <table width='420'>    
                            <tr>
                            	<td align='center'><img src=".getSingLocation()." width=\"60\" /><br />".replaceBreakLine($arrTotales[13])."</td>
                            </tr>
                            </table>
						</td></tr></table>
                            ";
            $sContent .= "</div></body></html>";
            
            return $sContent;
        
    }
    
?>