<?php
session_start();    
require_once('pdfDocs.class.php');
require_once("dompdf/dompdf_config.inc.php");
require_once('../../STROS/classes/LiquidacionesCarga58.class.php');
require_once('../../PIRAMIDE/classes/abs.class.php');

$arrBloques = array();
$arrDocs = array();
$lc = new LiquidacionesCarga58();
$ab = new abs();

$bandeja = '65';

$TPLOrden = '
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
		<style type="text/css" >
			.header{
				font-family: sans-serif;
			}
			.campos{
				font: 10px sans-serif;
				color: #000000;
			}
			.celdasParesAIG{
				font-size: 8.0pt; 
				color: black; 
				font-weight: 400; 
				text-decoration: none; 
				text-underline-style: none; 
				font-family: sans-serif; 
				text-align: left; 
				font-style: normal; 
				vertical-align: bottom; 
				white-space: nowrap; 
				border-left: medium none; 
				border-right: medium none; 
				border-top: medium none; 
				border-bottom: .5pt solid #95B3D7; 
				padding: 0px; 
				background: #DBE5F1;
			}
			.celdasImparesAIG{
				font-size: 8.0pt; 
				color: black; 
				font-weight: 400; 
				text-decoration: none; 
				text-underline-style: none; 
				font-family: sans-serif; 
				text-align: left; 
				font-style: normal; 
				vertical-align: bottom; 
				white-space: nowrap; 
				border-left: medium none; 
				border-right: medium none; 
				border-top: medium none; 
				border-bottom: .5pt solid #95B3D7; 
				padding: 0px;
			}
			.celdasTitulosAIG2{
				height: 20px; 
				width: 59px; 
				font-size: 8.0pt; 
				color: white; 
				font-weight: 700; 
				text-decoration: none; 
				text-underline-style: none; 
				font-family: sans-serif; 
				text-align: left; 
				white-space: normal; 
				font-style: normal; 
				vertical-align: middle; 
				border-left: .5pt solid #95B3D7; 
				border-right: medium none; 
				border-top: .5pt solid #95B3D7; 
				border-bottom: .5pt solid #95B3D7; 
				padding: 5px; 
				background: #7f7f7f;
			}
		</style> 
	</HEAD>
<BODY>';
if ( isset($_REQUEST[m])){
	$nroliq  = base64_decode($_REQUEST[m]);
	$arr_nroliq = split(',',$nroliq);
	/*
	echo "<pre>";
	print_r($arr_nroliq);
	echo "</pre>";die;
	*/
}else{
	$arr_nroliq[0] = $_REQUEST[n];
}
$TPLOrden .= '<table BORDER = 0>';
for ($i = 0; $i<count($arr_nroliq); $i++){
	$nroliq  = $arr_nroliq[$i];
	//echo $nroliq."<br>";
	$query = "SELECT NROTRAMITE, SNT_NRO, SNT_ITEM, SNT_SSN, CONVERT(VARCHAR, GETDATE(), 103) + ' ' + CONVERT(VARCHAR, GETDATE(), 8) FROM SNTTRANP WHERE NROINTLIQ = '".$nroliq."'";
	$ab -> executeQueryXpdf($query, $_SESSION[IDSISTEMA],1);
	$tramite = $ab -> vlistR[0][0][0];
	$siniestro = $ab -> vlistR[0][0][1];
	$item = $ab -> vlistR[0][0][2];
	$subsiniestro = $ab -> vlistR[0][0][3];
	$fecha = $ab -> vlistR[0][0][4];
	$TPLOrden .= '
			<tr width="560">
				<td>
					<span class= "header"><b>Usuario: '.$_SESSION[userid].', Fecha Impresion: '.$fecha.' </b></span><br/>
					<img src='.getImgLocation().' border="0" width="610" /><br/>
					'.$lc -> formularioPdf($tramite, $siniestro, $item, $subsiniestro, $_SESSION[userid], base64_encode($nroliq), $bandeja, base64_encode($nroliq),'','SI')."
				</td>
			</tr>";
}
$TPLOrden .= '
			</tr>
		</table>
		<script type="text/php">
			 if ( isset($pdf) ) {
          		$font = Font_Metrics::get_font("sans-serif", "bold");
          		$pdf->page_text(525, 35, "Pag: {PAGE_NUM} / {PAGE_COUNT}", $font, 12, array(0,0,0));
	        }
		</script>
	</body>
</HTML>';

//echo htmlentities($TPLOrden) ;die;
//echo $TPLOrden ;die;
//$TPLOrden = 'HOLA!!!';
$dompdf = new DOMPDF();
$dompdf->load_html( $TPLOrden );
        
$dompdf->set_base_path( "pdfstyles.css" );
$dompdf->render(); 

$array_opciones = array(
	"afichero" => 1,
	"compress" => 1
); 

$dompdf->stream("orden_de_liquidacion.pdf",$array_opciones);

function getImgLocation(){
        
       $arrayDir = explode("\\",$_SERVER['SCRIPT_FILENAME']);
       $arrayDir[count($arrayDir)-1] = "";
       $arrayDir  = implode("\\",$arrayDir);
       $logoImage = $arrayDir."banner_venezuela.jpg";
       return $logoImage;
        
}
?>