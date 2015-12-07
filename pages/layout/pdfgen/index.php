<?PHP
session_cache_limiter ('private');
session_start();
require_once("funciones_impresion.php");
//require("../config/config.inc.php");
require("../../PIRAMIDE/config/config.inc.php");
require_once("../../STROS/classes/ConsultaCatalogos.class.php");

$cc = new ConsultaCatalogos();

define("ORDEN_COMPRA",6);
define("ORDEN_REPARACION",7);
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
//echo "<br>bdname:".$dbNamePE."<br>";
unset($vlist);

mssql_select_db( $dbNamePE );//Conexion a DB correspondiente al Sistema

$parametros[SUBSINIESTRO] = ''.$_REQUEST[u];
$parametros[NROTRAMITE]   = ''.$_REQUEST[t];
$parametros[SINIESTRO]    = ''.$_REQUEST[s];
$parametros[ITEM]         = ''.$_REQUEST[i];
$parametros[ORDEN]        = ''.$_REQUEST[o];
$parametros[IDPROVEEDOR]  = ''.$_REQUEST[p];
$cod_doc      = $_REQUEST[d];

// Obtengo datos del Documento
$query  = " EXEC WSDocs_a_imprimir ".$cod_doc;
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
$documento = $vlist;
unset($vlist);
/**
 * Con las tres lineas siguientes en caso de que llegue una Orden de Compra el pdf se va a generar con la nueva libreria.
 * Si son quitadas estas lineas el pdf va a ser generado como antes.
 */
if($documento[0][1] == "Orden de Compra"){
    header("Location:index_new.php?u=$_GET[u]&t=$_GET[t]&s=$_GET[s]&i=$_GET[i]&o=$_GET[o]&p=$_GET[p]&d=$_REQUEST[d]");
    die;
}
if($documento[0][1] == "Orden de Reparación"){
    header("Location:index_new2.php?u=$_GET[u]&t=$_GET[t]&s=$_GET[s]&i=$_GET[i]&o=$_GET[o]&p=$_GET[p]&d=$_REQUEST[d]");
    die;
}
//echo $query;
//print_r($documento);die;

ob_end_clean();
require_once('FPDI-1/fpdi.php'); 

if (count($documento) > 0) {
   $pdf =& new FPDI(); 

   //AGREGO PAGINA EN EL PDF Y SELECCIONO EL TEMPLATE A UTILIZAR
   $pagecount   = $pdf->setSourceFile($documento[0][2].$documento[0][3]); 
   $tplidx      = $pdf->importPage(1); 
   $orientacion = $documento[0][4];
/*
   $pdf->addPage($documento[$i][4]);
   $pdf->useTemplate($tplidx, 0, 0);
   $pdf->SetTopMargin(0);
   $pdf->SetAutoPageBreak(false, 0);
*/   
   // OBTENGO LOS BLOQUES PARA EL DOCUMENTO   
   $query  = " EXEC WSBloquesDocumento ".$documento[0][5];
   
   $result = mssql_query($query, $connection) OR die ("Error: ".$query."<hr> ".mssql_get_last_message()."<BR>");
   $j = 0;
   while ($list = @mssql_fetch_row($result)){
     $cantidadLineas = count($list);
     for ($k = 0; $k < $cantidadLineas; $k++){
       $vlist[$j][$k] = $list[$k];
     } 
     $j++;
   }
   $bloques = $vlist;
   unset($vlist);

   if($_REQUEST[acc] == "")
   {
		$ruta = "doc.pdf";
		$tipo_salida = "I";
   }
   
   else
   {
		if($_REQUEST[acc] == 'G')
		{
			$ruta = "temp/doc".rand(1000000000,9999999999).".pdf";
			$tipo_salida = "F";                        
		//	echo $ruta;
		}
   }
   // SE IMPRIMEN LOS FORMULARIOS STANDARD
   
   
   
   
   if (ImpresionDocumento($bloques, $parametros, $orientacion, $pdf, $tplidx) == true) {
   
	//Inserto footer con firma solo para las Ordenes de Compra y reparacion
		/*
   		if( $cod_doc == ORDEN_COMPRA ){
			$imagen = $cc -> FirmaOrdenes();
			if ($imagen != 'N')
			{
				$pdf->SetXY(80,-65);
              	$pdf->SetFont('Helvetica','I',8);
				$pdf->Write (5, $pdf->Image('sings/'.$imagen.'' , $pdf->getX()+10 ,$pdf->getY()-25, 20, 23,'JPG', ''));
				$pdf->Write (5,'Coordinadora Pérdidas Parciales');
              	$pdf->SetX($pdf->getX()-32);
              	$pdf->Write (10,'Casa Matriz');
			}
		}
  		if( $cod_doc == ORDEN_REPARACION ){
			$imagen = $cc -> FirmaOrdenes();
			if ($imagen != 'N')
			{
				$pdf->SetXY(80,-55);
              	$pdf->SetFont('Helvetica','I',8);
				$pdf->Write (5, $pdf->Image('sings/'.$imagen.'' , $pdf->getX()+10 ,$pdf->getY()-25, 20, 23,'JPG', ''));
				$pdf->Write (5,'Coordinadora Pérdidas Parciales');
              	$pdf->SetX($pdf->getX()-32);
              	$pdf->Write (10,'Casa Matriz');
			}
		}
		*/
		$pdf->Output($ruta, $tipo_salida);
                
	}
    if($_REQUEST[acc] == 'G')
    {
        //$ruta = "temp/doc".rand(1000000000,9999999999).".pdf";
        //$tipo_salida = "F";                        
        echo $ruta;
    }
}
?>