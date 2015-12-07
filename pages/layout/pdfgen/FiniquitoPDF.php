<?php
session_start();    
require_once('pdfDocs.class.php');
require_once("dompdf/dompdf_config.inc.php");
//require_once('../../STROS/classes/LiquidacionesCarga58.class.php');
require_once('../../PIRAMIDE/classes/abs.class.php');

$arrBloques = array();
$arrDocs = array();
//$lc = new LiquidacionesCarga58();
$ab = new abs();

$nroliq  = base64_decode($_REQUEST[n]);
//echo $nroliq."<br>";
$query = "	SELECT LTRIM(RTRIM(H.IDPROFIT)) , CONVERT(VARCHAR, GETDATE(), 103) + ' ' + CONVERT(VARCHAR, GETDATE(), 8)
			FROM SNTTRANP P (NOLOCK)
			INNER JOIN SNTTRANH H (NOLOCK)
			ON P.NROTRAMITE = H.NROTRAMITE AND P.SNT_NRO = H.SINIESTRO AND P.SNT_ITEM = H.ITEM AND P.SNT_SSN = H.SUBSINIESTRO
			WHERE P.NROINTLIQ = '".$nroliq."'";
$ab -> executeQueryXpdf($query, $_SESSION[IDSISTEMA],1);
$idprofit = $ab -> vlistR[0][0][0];
$fecha = $ab -> vlistR[0][0][1];
//<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><HTML xmlns="http://www.w3.org/1999/xhtml">
$TPLOrden = '
</html>
	
	<head>
		<style type="text/css" >
			.Grilla{
				font: 11px sans-serif;
			}
			.FecHor{
				font: 10px sans-serif;
			}
			.Subtitulos{
				vertical-align: middle;
				text-align: center;
				font-weight: 1400;
			}
			.header{
				font-family: sans-serif;
			}
			.cabecera{
				font: 6px sans-serif;
			}
			.campos{
				font: 10px sans-serif;
				color: #000000;
			}
			.espacioIzq{
				width:100px;
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
	</head>
	<body>
		'.getDocument($idprofit,$nroliq).'
	</body>
</html>';

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

$dompdf->stream("Documento_Finiquito.pdf",$array_opciones);

function getImgLocation(){
        
       $arrayDir = explode("\\",$_SERVER['SCRIPT_FILENAME']);
       $arrayDir[count($arrayDir)-1] = "";
       $arrayDir  = implode("\\",$arrayDir);
       $logoImage = $arrayDir."banner_venezuela.jpg";
       return $logoImage;
}
function getLogoLocation(){
        
       $arrayDir = explode("\\",$_SERVER['SCRIPT_FILENAME']);
       $arrayDir[count($arrayDir)-1] = "";
       $arrayDir  = implode("\\",$arrayDir);
       $logoImage = $arrayDir."EncabezadoOrdenes.jpg";
       return $logoImage;
}
function getDocument($idprofit,$nroliq){
	$salida = "Verificar los datos de el tramite";
	switch( $idprofit ){
		case 1:
			$salida = "Documento Finiquito patrimoniales (1)";
		break;
		case 2:
			$salida = FiniquitoAutomovil($nroliq);
		break;
		case 3:
			$salida = "Documento Finiquito personas (3)";
		break;
	}
	return $salida;
}
function FiniquitoAutomovil($nroliq){
	$ab = new abs();
	$salida =  '';
	$separador = '----------------------------------------------------------------------------------------------------------------------------------------------------------------------';
	$espacioIzq = '20';
	$query = "
		SELECT DISTINCT
			CONVERT(VARCHAR, GETDATE(), 103) AS FECHA				--$Fecha			0
			,CONVERT(VARCHAR, GETDATE(), 8)	AS HORA					--$Hora				1
			,CONVERT(VARCHAR, GETDATE(), 106) AS FECHA2				--$Fecha2			2
			,CAST(YEAR(H.FECHAOCUR) AS VARCHAR) + '-'+ H.IDSECCION +'-' + CAST(H.SINIESTRO AS VARCHAR) AS SINIESTRO								--$Siniestro		3
			,H.IDSECCION + ' ' + SC.DESCRP AS RAMO					--$Ramo				4
			,PG.POLIZA AS POLIZA									--$Poliza			5
			,H.CERTIFICADO AS CERTIFICADO							--$Certificado		6
			,PG.NOMBREASEG AS ASEGURADO								--$Asegurado		7
			,'' AS DenomComerc										--$DenomComerc		8
			,'' AS AGENTE											--$Agente			9
			,CONVERT(VARCHAR, H.FECHAOCUR, 103)	AS FechaOcur		--$FechaOcur		10
			,CONVERT(VARCHAR, H.FECHAAVIS, 103)	AS FechaAviso		--$FechaAviso		11
			,H.CAUSASIN + ' ' + CS.DESCRP AS CausaSin				--$CausaSin			12
			,H.TIPO_PERDIDA + ' ' + TP.DESCRP AS TipoPerdida		--$TipoPerdida		13
			,H.SINDESC AS DescrpSiniestro							--$DescrpSiniestro	14
			,PA.TIPOVEH + ' ' + TV.DESCRP AS TipoVeh				--$TipoVeh			15
			,PA.ANIOVEH AS ANIO										--$Anio				16
			,PA.MODELO AS MODELO									--$Modelo			17
			,PA.PLACAPAT AS PLACA									--$Placa			18
			,PA.COLORDESC AS COLOR									--$Color			19
			,H.COBAFEC AS IDCOBER									--$IdCober			20
			,CO.DESCRP AS CoberDesc									--$CoberDesc		21
			,PC.SUMAASEG AS SumaAseg								--$SumaAseg			22
			,'' AS TOTAL											--$Total			23
		FROM SNTTRANP P (NOLOCK) 
		INNER JOIN SNTTRANH H (NOLOCK) ON P.NROTRAMITE = H.NROTRAMITE AND P.SNT_NRO = H.SINIESTRO AND P.SNT_ITEM = H.ITEM AND P.SNT_SSN = H.SUBSINIESTRO
		INNER JOIN Zurich_PTCore..COREPRFSEC SC (NOLOCK) ON H.IDSECCION = SC.IDSECCION AND H.IDPROFIT = SC.IDPROFIT AND SC.DEBAJA = 'N'
		INNER JOIN POLDATGEN PG (NOLOCK) ON H.NROPOLIZA = PG.NROPOLIZA AND H.CERTIFICADO = PG.ENDOSO  AND PG.DEBAJA = 'N'
		INNER JOIN SNTCAUSASIN CS (NOLOCK) ON H.IDSECCION = CS.IDSECCION AND H.CAUSASIN = CS.IDCAUSASIN AND CS.DEBAJA = 'N'
		INNER JOIN SNTTIPPERD TP (NOLOCK) ON H.IDSECCION = TP.IDSECCION AND H.TIPO_PERDIDA = TP.IDTIPPERD AND TP.DEBAJA = 'N'
		INNER JOIN POLRGOAUT PA (NOLOCK) ON H.NROPOLIZA = PA.NROPOLIZA AND H.CERTIFICADO = PA.ENDOSO  AND PA.DEBAJA = 'N'
		LEFT JOIN SNTTIPVEH TV (NOLOCK) ON PA.TIPOVEH = TV.IDTIPVEH AND TV.DEBAJA = 'N'
		INNER JOIN SNTCOBERT CO (NOLOCK) ON H.IDSECCION = CO.IDSECCION AND H.BIEN = CO.BIEN AND H.COBAFEC = CO.IDCOBER AND H.RAMO = CO.RAMO AND H.SUBRAMO = CO.SUBRAMO AND CO.DEBAJA = 'N'
		INNER JOIN POLCOBAFE PC (NOLOCK) ON H.NROPOLIZA = PC.NROPOLIZA AND H.CERTIFICADO = PC.ENDOSO AND H.COBAFEC = PC.COBERTURA AND H.BIEN = PC.BIEN AND H.RAMO = PC.RAMO AND H.NUMASE = PC.NUMASEG AND PC.DEBAJA = 'N'
		WHERE NROINTLIQ = '".$nroliq."'";
	$ab -> executeQueryXpdf($query, $_SESSION[IDSISTEMA],1);
	$Fecha 				= $ab -> vlistR[0][0][0];
	$Hora 				= $ab -> vlistR[0][0][1];
	$Fecha2 			= $ab -> vlistR[0][0][2];
	$Siniestro 			= $ab -> vlistR[0][0][3];
	$Ramo 				= $ab -> vlistR[0][0][4];
	$Poliza 			= $ab -> vlistR[0][0][5];
	$Certificado 		= $ab -> vlistR[0][0][6];
	$Asegurado 			= $ab -> vlistR[0][0][7];
	$DenomComerc 		= $ab -> vlistR[0][0][8];
	$Agente 			= $ab -> vlistR[0][0][9];
	$FechaOcur 			= $ab -> vlistR[0][0][10];
	$FechaAviso			= $ab -> vlistR[0][0][11];
	$CausaSin 			= $ab -> vlistR[0][0][12];
	$TipoPerdida 		= $ab -> vlistR[0][0][13];
	$DescrpSiniestro 	= $ab -> vlistR[0][0][14];
	$TipoVeh 			= $ab -> vlistR[0][0][15];
	$Anio 				= $ab -> vlistR[0][0][16];
	$Modelo 			= $ab -> vlistR[0][0][17];
	$Placa 				= $ab -> vlistR[0][0][18];
	$Color 				= $ab -> vlistR[0][0][19];
	$IdCober 			= $ab -> vlistR[0][0][20];
	$CoberDesc 			= $ab -> vlistR[0][0][21];
	$SumaAseg 			= $ab -> vlistR[0][0][22];
	$Total				= $ab -> vlistR[0][0][23];
	
	$salida .=  '
		<table border = 0 width="550" class= "Grilla">
			<tr width="550">
				<td colspan = 4 width="550">&nbsp;<img src='.getLogoLocation().' border="0"  width="600" /></td>
			</tr>
			<tr>
				<td colspan = 4>
					<table border = 0 width=550>
						<tr>
							<td width=450 align = right class = "FecHor"><b>
								Fecha: '.$Fecha.'<br/>
								Hora: '.$Hora.'<br/></b>
							</td>
							<td>&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				
				<td colspan = 4 class = "Subtitulos">** RECIBO DE INDEMNIZACION**</td>
			</tr>
			<tr>
				
				<td colspan = 2>Nro. SINIESTRO: '.$Siniestro.'</td>
				<td colspan = 2>RAMO: '.$Ramo.'</td>
			</tr>
			<tr>
				
				<td colspan = 2>Nro. POLIZA: '.$Poliza.'</td>
				<td colspan = 2>Nro. CERTIFICADO: '.$Certificado.'</td>
			</tr>
			<tr>
				
				<td colspan = 4>ASEGURADO: '.$Asegurado.'</td>
			</tr>
			<tr>
				
				<td colspan = 4>DENOMINACIONES COMERCIALES: '.$DenomComerc.'</td>
			</tr>
			<tr>
				
				<td colspan = 4>AGENTE: '.$Agente.'</td>
			</tr>
			<tr>
				
				<td colspan = 4>'.$separador.'</td>
			</tr>
			
			<tr>
				
				<td colspan = 4 class = "Subtitulos">**CARACTERISTICAS DEL SINIESTRO**</td>
			</tr>
			<tr>
				
				<td colspan = 2>FECHA DE OCURRENCIA: '.$FechaOcur.'</td>
				<td colspan = 2>FECHA DE AVISO: '.$FechaAviso.'</td>
			</tr>
			<tr>
				
				<td colspan = 2>CAUSA: '.$CausaSin.'</td>
				<td colspan = 2>EFECTO: '.$TipoPerdida.'</td>
			</tr>
			<tr>
				
				<td colspan = 4>OBSERVACIONES: '.$DescrpSiniestro.'</td>
			</tr>
			<tr>
				
				<td colspan = 4>'.$separador.'</td>
			</tr>
			<tr>
				
				<td colspan = 4 class = "Subtitulos">** CARACTERISTICAS DEL VEHICULO**</td>
			</tr>
			<tr>
				
				<td colspan = 2>TIPO: '.$TipoVeh.'</td>
				<td>AÑO: '.$Anio.'</td>
				<td>MODELO: '.$Modelo.'</td>
			</tr>
			<tr>
				
				<td colspan = 2>PLACA: '.$Placa.'</td>
				<td colspan = 2>COLOR: '.$Color.'</td>
			</tr>
			<tr>
				
				<td colspan = 4>'.$separador.'</td>
			</tr>
			<tr>
				
				<td colspan = 4>La indemnización recibida en este acto ha sido establecida de acuerdo a lo siguiente:</td>
			</tr>
			<tr>
				
				<td colspan = 4>'.$separador.'</td>
			</tr>
			<tr>
				
				<td>'.$IdCober.'</td>
				<td colspan = 2>'.$CoberDesc.'</td>
				<td>MONTO '.$SumaAseg.' </td>
			</tr>
			<tr>
				
				<td colspan = 4>'.$separador.'</td>
			</tr>
			<tr>
				
				
				<td colspan = 2>TOTAL Bs. F '.$Total.'</td>
			</tr>
			<tr>
				
				<td colspan = 4>'.$separador.'</td>
			</tr>
			<tr>
				
				<td colspan = 4>
					He (mos) recibido de ZURICH SEGUROS, S.A. la cantidad de: Bs. F<br/>
					Monto en letras<br/>
					En concepto de indemnización total y definitiva de los daños y perjuicios sufridos.
				</td>
			</tr>
			<tr>
				
				<td colspan = 4>'.$separador.'</td>
			</tr>
			<tr>
				
				<td colspan = 4>
					Con el recibo de la expresada cantidad declaro (declaramos), liberada a ZURICH SEGUROS S.A., de toda responsabilidad por lo que respecta todas las consecuencias directa ó indirectamente relacionadas con el siniestro arriba mencionada, por virtud de lo cual otorgo (amos) en su favor el más amplio, total y definitivo finiquito.	Hago (hacemos) igualmente formal subrogación a favor de ZURICH SEGUROS S.A., de todos los derechos y acciones que me (nos) corresponden ó pudieran corresponderme (nos) contra terceras personas en razón de la pérdida y daños materia de la presente indemnización.
				</td>
			</tr>
			<tr>
				
				<td colspan = 2 align = right>
					<br/>
					Caracas, Fecha '.$Fecha2.'
				</td>
				<td colspan = 2>&nbsp;</td>
			</tr>
			<tr>
				
				<td colspan = 4>
					Recibi (mos) conforme, '.$Asegurado.'
				</td>
			</tr>
			<tr>
				
				<td colspan = 4>------------------------------------------------------------</td>
			</tr>
			<tr>
				
				<td colspan = 4>FIRMA DEL ASEGURADO O BENEFICIARIO</td>
			</tr>
			<tr>
				
				<td colspan = 2>
					Nro. Cédula: ________________________
				</td>
				<td colspan = 2 align = right>
					Devolver Firmado
				</td>
			</tr>
			<tr>
				
				<td colspan = 4>'.$separador.'</td>
			</tr>
		</table>
	<script type="text/php">
		if ( isset($pdf) ) {
	    	$font = Font_Metrics::get_font("sans-serif", "bold");
	    	$pdf->page_text(525, 20, "Pagina: {PAGE_NUM}", $font, 10, array(0,0,0));
		}
	</script>
		';
	//$salida = '<span class= "header"><b>Usuario: '.$_SESSION[userid].', Fecha Impresion: '.$fecha.' </b></span>';
	
	return $salida;
}
?>