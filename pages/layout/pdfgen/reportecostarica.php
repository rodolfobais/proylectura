<?php
//error_reporting(E_ALL);
error_reporting(E_ERROR);
ini_set('display_errors', 0);
function formateoNumeros ($num) {
	$redondeado = round($num,2);
	
	$redondeadoArr = explode(".", $redondeado);
	
	$decimales = substr($redondeadoArr[1]."00", 0, 2);
	$formateado = $redondeadoArr[0].".".$decimales;
	return $formateado;
}
function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}
require_once('pdfDocs.class.php');
require_once("dompdf/dompdf_config.inc.php");
require_once ("../include/IFXConnection.php");
spl_autoload_register('DOMPDF_autoload');
global $conn;


$sql = "SELECT 
	*
	FROM resmesa,
	OUTER mesajuego
	WHERE
		resme_mesa = mesaj_mesajuego
		and mesaj_mesajuego <> 0
 	order by mesaj_tipojuego ASC
";

$sqlSlots = "SELECT 
	*
	FROM resmesa
	WHERE
		mesaj_mesajuego = 0
";

$fechahoy = getdate();

$fechahoy['mon'] = substr("0".$fechahoy['mon'], -2);
$fechahoy['mday'] = substr("0".$fechahoy['mday'], -2);
//$fechahoy['mday'] = substr("0".$fechahoy['mday'], -2);
//$fechahoy['mday'] = "19";
//echo "<pre>"; print_r($fechahoy);echo "</pre>";
$hoy = $fechahoy['year'].$fechahoy['mon'].$fechahoy['mday'];
$mes = $fechahoy['year']."".$fechahoy['mon'];
$anio = $fechahoy['year'];
$fechaCompleta = $fechahoy['year'].$fechahoy['mon'].$fechahoy['mday'].$fechahoy['hours'].$fechahoy['minutes'].$fechahoy['seconds'];
//echo $hoy;die;
/*
$sql = "SELECT 
			*
		FROM resmesa 
		WHERE resme_mesa = 0
 	
";
*/
/*
$datos[$i]['mesaid'] = "";
$datos[$i]['mesadescrp'] = "";

$datos[$i]['drop_dia'] = "";
$datos[$i]['res_dia'] = "";
$datos[$i]['hold_dia'] = "";

$datos[$i]['drop_mes'] = "";
$datos[$i]['res_mes'] = "";
$datos[$i]['hold_mes'] = "";

$datos[$i]['drop_anio'] = "";
$datos[$i]['res_anio'] = "";
$datos[$i]['hold_anio'] = "";

$datos[$i]['drop_tot'] = "";
$datos[$i]['res_tot'] = "";
$datos[$i]['hold_tot'] = "";
*/
$datos = array(); $totales = array(); $totGgr = array(); 
$arr = $conn -> QueryFetchArray($sql);
//$arrSlots = $conn -> QueryFetchArray($sqlSlots);
//echo "<pre>"; print_r($arr);echo "</pre>";die;
foreach ($arr as $key => $value) {
	$i = "mesa_".$value['mesaj_mesajuego'];
	$j = "juego_".$value['mesaj_tipojuego'];
	
	$hoyBase = substr($value['resme_fecha'], 0, 4).substr($value['resme_fecha'], 4, 2).substr($value['resme_fecha'], 6, 2);
	$mesBase = substr($value['resme_fecha'], 0, 4).substr($value['resme_fecha'], 4, 2);
	$anioBase = substr($value['resme_fecha'], 0, 4);
	
	$datos[$i]['mesaid'] = $value['mesaj_mesajuego'];
	$datos[$i]['tipojuego'] = $value['mesaj_tipojuego'];
	//$datos[$i]['mesadescrp'] = "Mesa ".$value['mesaj_mesajuego']." (".$value['mesaj_desc_tipoj'].")";
	$datos[$i]['mesadescrp'] = $value['mesaj_desc_tipoj']." ".$value['mesaj_mesajuego'];
	
	$totales[$j]['juegoid'] = $value['mesaj_tipojuego'];
	$totales[$j]['juegodescrp'] = "Tot ".$value['mesaj_desc_tipoj'];
	
	$datos[$i]['drop_tot'] += $value['resme_drop'];
	$datos[$i]['res_tot'] += $value['resme_resultado'];
	$datos[$i]['hold_tot'] = 0;
	
	$totales[$j]['drop_tot'] += $value['resme_drop'];
	$totales[$j]['res_tot'] += $value['resme_resultado'];
	$totales[$j]['hold_tot'] = 0;
	
	$totGgr['total'] += $value['resme_resultado'];
	
	//echo "hoy: ".$hoy." hoybase:".$hoyBase."<br/>";
	if ($hoy == $hoyBase) {
		$datos[$i]['drop_dia'] += $value['resme_drop'];
		$datos[$i]['res_dia'] += $value['resme_resultado'];
		$datos[$i]['hold_dia'] += 0;
		
		$totales[$j]['drop_dia'] += $value['resme_drop'];
		$totales[$j]['res_dia'] += $value['resme_resultado'];
		$totales[$j]['hold_dia'] += 0;
		
		$totGgr['dia'] += $value['resme_resultado'];
	}else{
		$datos[$i]['drop_dia'] += 0;
		$datos[$i]['res_dia'] += 0;
		$datos[$i]['hold_dia'] += 0;
		
		$totales[$j]['drop_dia'] += 0;
		$totales[$j]['res_dia'] += 0;
		$totales[$j]['hold_dia'] += 0;
		
		$totGgr['dia'] += 0;
	}
	if ($mes == $mesBase) {	
		$datos[$i]['drop_mes'] += $value['resme_drop'];
		$datos[$i]['res_mes'] += $value['resme_resultado'];
		$datos[$i]['hold_mes'] += 0;
		
		$totales[$j]['drop_mes'] += $value['resme_drop'];
		$totales[$j]['res_mes'] += $value['resme_resultado'];
		$totales[$j]['hold_mes'] += 0;
		
		$totGgr['mes'] += $value['resme_resultado'];
	}else{
		$datos[$i]['drop_mes'] += 0;
		$datos[$i]['res_mes'] += 0;
		$datos[$i]['hold_mes'] += 0;
		
		$totales[$j]['drop_mes'] += 0;
		$totales[$j]['res_mes'] += 0;
		$totales[$j]['hold_mes'] += 0;
		
		$totGgr['mes'] += 0;
	}
	if ($anio == $anioBase) {	
		$datos[$i]['drop_anio'] += $value['resme_drop'];
		$datos[$i]['res_anio'] += $value['resme_resultado'];
		$datos[$i]['hold_anio'] += 0;
		
		$totales[$j]['drop_anio'] += $value['resme_drop'];
		$totales[$j]['res_anio'] += $value['resme_resultado'];
		$totales[$j]['hold_anio'] = 0;
		
		$totGgr['anio'] += $value['resme_resultado'];
	}else{
		$datos[$i]['drop_anio'] += 0;
		$datos[$i]['res_anio'] += 0;
		$datos[$i]['hold_anio'] += 0;
		
		$totales[$j]['drop_anio'] += $value['resme_drop'];
		$totales[$j]['res_anio'] += $value['resme_resultado'];
		$totales[$j]['hold_anio'] += 0;
		
		$totGgr['anio'] += 0;
	}
	
	

}
$arrSlots = array();
foreach ($arrSlots as $key => $value) {
	$i = "mesa_".$value['mesaj_mesajuego'];
	$j = "juego_".$value['mesaj_tipojuego'];
	
	$hoyBase = substr($value['resme_fecha'], 0, 4).substr($value['resme_fecha'], 4, 2).substr($value['resme_fecha'], 6, 2);
	$mesBase = substr($value['resme_fecha'], 0, 4).substr($value['resme_fecha'], 4, 2);
	$anioBase = substr($value['resme_fecha'], 0, 4);
	
	$datos[$i]['mesaid'] = $value['mesaj_mesajuego'];
	$datos[$i]['tipojuego'] = $value['mesaj_tipojuego'];
	//$datos[$i]['mesadescrp'] = "Mesa ".$value['mesaj_mesajuego']." (".$value['mesaj_desc_tipoj'].")";
	$datos[$i]['mesadescrp'] = $value['mesaj_desc_tipoj']." ".$value['mesaj_mesajuego'];
	
	$totales[$j]['juegoid'] = $value['mesaj_tipojuego'];
	$totales[$j]['juegodescrp'] = "Tot ".$value['mesaj_desc_tipoj'];
	
	$datos[$i]['drop_tot'] += $value['resme_drop'];
	$datos[$i]['res_tot'] += $value['resme_resultado'];
	$datos[$i]['hold_tot'] = 0;
	
	$totales[$j]['drop_tot'] += $value['resme_drop'];
	$totales[$j]['res_tot'] += $value['resme_resultado'];
	$totales[$j]['hold_tot'] = 0;
	
	//echo "hoy: ".$hoy." hoybase:".$hoyBase."<br/>";
	if ($hoy == $hoyBase) {
		$datos[$i]['drop_dia'] += $value['resme_drop'];
		$datos[$i]['res_dia'] += $value['resme_resultado'];
		$datos[$i]['hold_dia'] += 0;
		
		$totales[$j]['drop_dia'] += $value['resme_drop'];
		$totales[$j]['res_dia'] += $value['resme_resultado'];
		$totales[$j]['hold_dia'] += 0;
	}else{
		$datos[$i]['drop_dia'] += 0;
		$datos[$i]['res_dia'] += 0;
		$datos[$i]['hold_dia'] += 0;
		
		$totales[$j]['drop_dia'] += 0;
		$totales[$j]['res_dia'] += 0;
		$totales[$j]['hold_dia'] += 0;
	}
	if ($mes == $mesBase) {	
		$datos[$i]['drop_mes'] += $value['resme_drop'];
		$datos[$i]['res_mes'] += $value['resme_resultado'];
		$datos[$i]['hold_mes'] += 0;
		
		$totales[$j]['drop_mes'] += $value['resme_drop'];
		$totales[$j]['res_mes'] += $value['resme_resultado'];
		$totales[$j]['hold_mes'] += 0;
	}else{
		$datos[$i]['drop_mes'] += 0;
		$datos[$i]['res_mes'] += 0;
		$datos[$i]['hold_mes'] += 0;
		
		$totales[$j]['drop_mes'] += 0;
		$totales[$j]['res_mes'] += 0;
		$totales[$j]['hold_mes'] += 0;
	}
	if ($anio == $anioBase) {	
		$datos[$i]['drop_anio'] += $value['resme_drop'];
		$datos[$i]['res_anio'] += $value['resme_resultado'];
		$datos[$i]['hold_anio'] += 0;
		
		$totales[$j]['drop_anio'] += $value['resme_drop'];
		$totales[$j]['res_anio'] += $value['resme_resultado'];
		$totales[$j]['hold_anio'] = 0;
	}else{
		$datos[$i]['drop_anio'] += 0;
		$datos[$i]['res_anio'] += 0;
		$datos[$i]['hold_anio'] += 0;
		
		$totales[$j]['drop_anio'] += $value['resme_drop'];
		$totales[$j]['res_anio'] += $value['resme_resultado'];
		$totales[$j]['hold_anio'] += 0;
	}
	
	

}
$anchoTablas = "700";
//<div style='page-break-after: always;'></div>
//echo "<pre>"; print_r($totales);echo "</pre>";die;
//$hoy = $fechahoy['year'].$fechahoy['mon'].$fechahoy['mday'];
$salida = "<html>
		<head>
			<style type='text/css'>
				.celdasBordeada{
					border: 2px solid;
				}
				body{
					font-size: 8;
				}
				.celdaSombreada{
					background-color: #808080;
				}
			</style>
		</head>
		<body>
			<table  style = 'border-collapse: collapse; border-spacing:  0px;' width = ".$anchoTablas.">
				<tr>
					<td style = 'border: 2px solid;text-align: center;'>".$fechahoy['mday']."/".$fechahoy['mon']."/".$fechahoy['year']."</td>
					<td style = 'text-align: center;'>GAMING REPORT</td>
					<td style = 'text-align: right;font-size: 10;vertical-align: bottom;'>GRAND CASINO ESCAZU</td>
				</tr>
			</table>
			<br><br>
			<table border = 0 style = 'border-collapse: collapse; border-spacing:  0px; border-bottom: 2px solid;'  width = ".$anchoTablas.">
				<tr>
					<td>&nbsp;</td>
					
					<td colspan = 3 style = 'border: 2px solid; text-align: center;'>DAILY/DIARIO</td>
					
					<td colspan = 3 style = 'border: 2px solid; text-align: center;'>MONTH/MES ACC</td>
					
					<td colspan = 3 style = 'border: 2px solid; text-align: center;'>YEARLY/ANUAL</td>
					
					<td colspan = 3 style = 'border: 2px solid; text-align: center;'>OTD/DESDE APERTURA</td>
				</tr>
				<tr>
					<td style = 'border: 2px solid; text-align: center;'>Mesas</td>
					
					<td style = 'border: 2px solid; text-align: center;'>Drop</td>
					<td style = 'border: 2px solid; text-align: center;'>Resultado</td>
					<td style = 'border: 2px solid; text-align: center;'>%Hold</td>
					
					<td style = 'border: 2px solid; text-align: center;'>Drop</td>
					<td style = 'border: 2px solid; text-align: center;'>Resultado</td>
					<td style = 'border: 2px solid; text-align: center;'>%Hold</td>
					
					<td style = 'border: 2px solid; text-align: center;'>Drop</td>
					<td style = 'border: 2px solid; text-align: center;'>Resultado</td>
					<td style = 'border: 2px solid; text-align: center;'>%Hold</td>
					
					<td style = 'border: 2px solid; text-align: center;'>Drop</td>
					<td style = 'border: 2px solid; text-align: center;'>Resultado</td>
					<td style = 'border: 2px solid; text-align: center;'>%Hold</td>
				</tr>";

$juegoactual = -1;
foreach ($datos as $key => $value) {
	
	if ($juegoactual == -1) {
		$juegoactual = $value['tipojuego'];
	}else{
		if ($juegoactual != $value['tipojuego']) {
			
			//$totales["juego_".$juegoactual]
			if ($totales["juego_".$juegoactual]['drop_dia'] != 0) { $totales["juego_".$juegoactual]['hold_dia'] = ($totales["juego_".$juegoactual]['res_dia'] * 100) / $totales["juego_".$juegoactual]['drop_dia'];	}
			if ($totales["juego_".$juegoactual]['drop_mes'] != 0) { $totales["juego_".$juegoactual]['hold_mes'] = ($totales["juego_".$juegoactual]['res_mes'] * 100) / $totales["juego_".$juegoactual]['drop_mes']; }
			if ($totales["juego_".$juegoactual]['drop_anio'] != 0) { $totales["juego_".$juegoactual]['hold_anio'] = ($totales["juego_".$juegoactual]['res_anio'] * 100) / $totales["juego_".$juegoactual]['drop_anio']; }
			if ($totales["juego_".$juegoactual]['drop_tot'] != 0) { $totales["juego_".$juegoactual]['hold_tot'] = ($totales["juego_".$juegoactual]['res_tot'] * 100) / $totales["juego_".$juegoactual]['drop_tot']; }
			
			$salida .= "
				<tr style='background-color:grey;'  class = 'celdaSombreada'>
					<td style = 'border-left: 2px solid;border-right: 2px solid;'  class = 'celdaSombreada'>".$totales["juego_".$juegoactual]['juegodescrp']."</td>
					
					<td style = 'text-align: right; padding-left: 10px;'  class = 'celdaSombreada'>".formateoNumeros($totales["juego_".$juegoactual]['drop_dia'])."</td>
					<td style = 'text-align: right; padding-left: 10px;'  class = 'celdaSombreada'>".formateoNumeros($totales["juego_".$juegoactual]['res_dia'])."</td>
					<td style = 'border-right: 2px solid;text-align: right; padding-left: 10px;'  class = 'celdaSombreada'>".round($totales["juego_".$juegoactual]['hold_dia'])."%</td>
					
					<td style = 'text-align: right; padding-left: 10px;'  class = 'celdaSombreada'>".formateoNumeros($totales["juego_".$juegoactual]['drop_mes'])."</td>
					<td style = 'text-align: right; padding-left: 10px;'  class = 'celdaSombreada'>".formateoNumeros($totales["juego_".$juegoactual]['res_mes'])."</td>
					<td style = 'border-right: 2px solid; text-align: right; padding-left: 10px;'  class = 'celdaSombreada'>".round($totales["juego_".$juegoactual]['hold_mes'])."%</td>
					
					<td  class = 'celdaSombreada' style = 'text-align: right; padding-left: 10px;'>".formateoNumeros($totales["juego_".$juegoactual]['drop_anio'])."</td>
					<td class = 'celdaSombreada' style = 'text-align: right; padding-left: 10px;'>".formateoNumeros($totales["juego_".$juegoactual]['res_anio'])."</td>
					<td class = 'celdaSombreada' style = 'border-right: 2px solid;text-align: right; padding-left: 10px;'>".round($totales["juego_".$juegoactual]['hold_anio'])."%</td>
					
					<td class = 'celdaSombreada' style = 'text-align: right; padding-left: 10px;'>".formateoNumeros($totales["juego_".$juegoactual]['drop_tot'])."</td>
					<td class = 'celdaSombreada' style = 'text-align: right; padding-left: 10px;'>".formateoNumeros($totales["juego_".$juegoactual]['res_tot'])."</td>
					<td class = 'celdaSombreada' style = 'border-right: 2px solid;text-align: right; padding-left: 10px;'>".round($totales["juego_".$juegoactual]['hold_tot'])."%</td>
				</tr>";
			$juegoactual = $value['tipojuego'];
		}
	}
	
	if ($value['drop_dia'] != 0) { $value['hold_dia'] = ($value['res_dia'] * 100) / $value['drop_dia'];	}
	if ($value['drop_mes'] != 0) { $value['hold_mes'] = ($value['res_mes'] * 100) / $value['drop_mes']; }
	if ($value['drop_anio'] != 0) { $value['hold_anio'] = ($value['res_anio'] * 100) / $value['drop_anio']; }
	if ($value['drop_tot'] != 0) { $value['hold_tot'] = ($value['res_tot'] * 100) / $value['drop_tot']; }
	$salida .= "
				<tr >
					<td  style = 'border-left: 2px solid;border-right: 2px solid;'>".$value['mesadescrp']."</td>
					
					<td style = 'text-align: right;'>".formateoNumeros($value['drop_dia'])."</td>
					<td style = 'text-align: right;'>".formateoNumeros($value['res_dia'])."</td>
					<td style = 'border-right: 2px solid;text-align: right;'>".round($value['hold_dia'])."%</td>
					
					<td style = 'text-align: right;'>".formateoNumeros($value['drop_mes'])."</td>
					<td style = 'text-align: right;'>".formateoNumeros($value['res_mes'])."</td>
					<td style = 'border-right: 2px solid;text-align: right;'>".round($value['hold_mes'])."%</td>
					
					<td style = 'text-align: right;'>".formateoNumeros($value['drop_anio'])."</td>
					<td style = 'text-align: right;'>".formateoNumeros($value['res_anio'])."</td>
					<td style = 'border-right: 2px solid;text-align: right;'>".round($value['hold_anio'])."%</td>
					
					<td style = 'text-align: right;'>".formateoNumeros($value['drop_tot'])."</td>
					<td style = 'text-align: right;'>".formateoNumeros($value['res_tot'])."</td>
					<td style = 'border-right: 2px solid;text-align: right;'>".round($value['hold_tot'])."%</td>
				</tr>";
	
	
}



if ($totales["juego_".$juegoactual]['drop_dia'] != 0) { $totales["juego_".$juegoactual]['hold_dia'] = ($totales["juego_".$juegoactual]['res_dia'] * 100) / $totales["juego_".$juegoactual]['drop_dia'];	}
if ($totales["juego_".$juegoactual]['drop_mes'] != 0) { $totales["juego_".$juegoactual]['hold_mes'] = ($totales["juego_".$juegoactual]['res_mes'] * 100) / $totales["juego_".$juegoactual]['drop_mes']; }
if ($totales["juego_".$juegoactual]['drop_anio'] != 0) { $totales["juego_".$juegoactual]['hold_anio'] = ($totales["juego_".$juegoactual]['res_anio'] * 100) / $totales["juego_".$juegoactual]['drop_anio']; }
if ($totales["juego_".$juegoactual]['drop_tot'] != 0) { $totales["juego_".$juegoactual]['hold_tot'] = ($totales["juego_".$juegoactual]['res_tot'] * 100) / $totales["juego_".$juegoactual]['drop_tot']; }

$salida .= "
				<tr style='background-color:grey' class = 'celdaSombreada'>
					<td class = 'celdaSombreada' style = 'border-left: 2px solid;border-right: 2px solid;'>".$totales["juego_".$juegoactual]['juegodescrp']."</td>
					
					<td class = 'celdaSombreada' style = 'text-align: right;'>".formateoNumeros($totales["juego_".$juegoactual]['drop_dia'])."</td>
					<td class = 'celdaSombreada' style = 'text-align: right;'>".formateoNumeros($totales["juego_".$juegoactual]['res_dia'])."</td>
					<td class = 'celdaSombreada' style = 'border-right: 2px solid;text-align: right;'>".round($totales["juego_".$juegoactual]['hold_dia'])."%</td>
					
					<td class = 'celdaSombreada' style = 'text-align: right;'>".formateoNumeros($totales["juego_".$juegoactual]['drop_mes'])."</td>
					<td class = 'celdaSombreada' style = 'text-align: right;'>".formateoNumeros($totales["juego_".$juegoactual]['res_mes'])."</td>
					<td class = 'celdaSombreada' style = 'border-right: 2px solid;text-align: right;'>".round($totales["juego_".$juegoactual]['hold_mes'])."%</td>
					
					<td class = 'celdaSombreada' style = 'text-align: right;'>".formateoNumeros($totales["juego_".$juegoactual]['drop_anio'])."</td>
					<td class = 'celdaSombreada' style = 'text-align: right;'>".formateoNumeros($totales["juego_".$juegoactual]['res_anio'])."</td>
					<td class = 'celdaSombreada' style = 'border-right: 2px solid;text-align: right;'>".round($totales["juego_".$juegoactual]['hold_anio'])."%</td>
					
					<td class = 'celdaSombreada' style = 'text-align: right;'>".formateoNumeros($totales["juego_".$juegoactual]['drop_tot'])."</td>
					<td class = 'celdaSombreada' style = 'text-align: right;'>".formateoNumeros($totales["juego_".$juegoactual]['res_tot'])."</td>
					<td class = 'celdaSombreada' style = 'border-right: 2px solid;text-align: right;'>".round($totales["juego_".$juegoactual]['hold_tot'])."%</td>
				</tr>";


//Agregar totales

//Tot GGR
$salida .= "
				<tr 'border-bottom: 2px solid;'>
					<td style = 'border-left: 2px solid;border-right: 2px solid; border-bottom: 2px solid;'>TOT. GGR</td>
					
					<td style = 'border-left: 2px solid;text-align: center; border-bottom: 2px solid;' colspan = 3>".formateoNumeros($totGgr['dia'])."</td>
					
					<td style = 'border-left: 2px solid;text-align: center; border-bottom: 2px solid;' colspan = 3>".formateoNumeros($totGgr['mes'])."</td>
					
					<td style = 'border-left: 2px solid;text-align: center; border-bottom: 2px solid;' colspan = 3>".formateoNumeros($totGgr['anio'])."</td>
					
					<td style = 'border-left: 2px solid;border-right: 2px solid;text-align: center; border-bottom: 2px solid;' colspan = 3>".formateoNumeros($totGgr['total'])."</td>
				</tr>";
//Segunda grilla
/*ingr_fecha           integer                                 yes
ingr_cantidad        integer                                 yes
ingr_fecha_alfa      char(8)  */
$sqlIngreso = "SELECT 
	*
	FROM ingreso
	order by ingr_fecha asc
";
$arrIngreso = $conn -> QueryFetchArray($sqlIngreso);
//echo "<pre>"; print_r($arrIngreso);echo "</pre>";die;
$salida .= "</table>
			<br><br>
			<table width = ".$anchoTablas."   style = 'border-collapse: collapse; border-spacing:  0px;'>
				";
$salida .= "
				<tr>
					<td>&nbsp;</td>
					
					<td style = 'text-align: center;' class = 'celdasBordeada'>DAILY/DIARIO</td>
					
					<td style = 'text-align: center;' class = 'celdasBordeada'>MONTH/MES ACC</td>
					
					<td style = 'text-align: center;' class = 'celdasBordeada'>YEARLY/ANUAL</td>
					
					<td style = 'text-align: center;' class = 'celdasBordeada'>OTD/DESDE APERTURA</td>
				</tr>
				";

/**
 * Guests
**/
$valores = array();


$guestDia = 0; $guestMes = 0; $guestAnio = 0; $guestTotal = 0; 
foreach ($arrIngreso as $key => $value) {
	$hoyBase = substr($value['ingr_fecha'], 0, 4).substr($value['ingr_fecha'], 4, 2).substr($value['ingr_fecha'], 6, 2);
	$mesBase = substr($value['ingr_fecha'], 0, 4).substr($value['ingr_fecha'], 4, 2);
	$anioBase = substr($value['ingr_fecha'], 0, 4);
	
	if ($hoy == $hoyBase) {
		$guestDia += $value['ingr_cantidad'];
	}
	if ($mes == $mesBase) {	
		$guestMes += $value['ingr_cantidad'];
	}
	if ($anio == $anioBase) {	
		$guestAnio += $value['ingr_cantidad'];
	}
	$guestTotal += $value['ingr_cantidad'];
}
$fila = 0;
$valores[$fila][] = "Guests";
$valores[$fila][] = $guestDia;
$valores[$fila][] = $guestMes;
$valores[$fila][] = $guestAnio;
$valores[$fila][] = $guestTotal;

/**
 * AVERAGE GUEST
**/

//$hoy = $fechahoy['year'].$fechahoy['mon'].$fechahoy['mday'];
$AvgGuestMes = round($guestMes/(int)$fechahoy['mon']);

$diasDelAnio = dias_transcurridos($fechahoy['year'].'-01-01',$fechahoy['year'].'-'.$fechahoy['mon'].'-'.$fechahoy['mday']);
if ($diasDelAnio == 0) {
	$diasDelAnio = 1;
}
$AvgGuestAnio = round($guestAnio/$diasDelAnio);

$diasTotal = dias_transcurridos(substr($arrIngreso[0]['ingr_fecha'], 0, 4).'-'.substr($arrIngreso[0]['ingr_fecha'], 4, 2).'-'.substr($arrIngreso[0]['ingr_fecha'], 6, 2),$fechahoy['year'].'-'.$fechahoy['mon'].'-'.$fechahoy['mday']);
if ($diasTotal == 0) {
	$diasTotal = 1;
}
$AvgGuestTotal = round($guestTotal/$diasTotal);
$fila++;
$valores[$fila][] = "Average guests/day";
$valores[$fila][] = $guestDia;
$valores[$fila][] = $AvgGuestMes;
$valores[$fila][] = $AvgGuestAnio;
$valores[$fila][] = $AvgGuestTotal;

/**
 * GGR/GUEST
**/
$GgrGuestDia = $totGgr['dia']/$guestDia;
$GgrGuestMes = $totGgr['mes']/$guestMes;
$GgrGuestAnio = $totGgr['anio']/$guestAnio;
$GgrGuestTotal = $totGgr['total']/$guestTotal;

$fila++;
$valores[$fila][] = "GGR/Guest";
$valores[$fila][] = round($GgrGuestDia);
$valores[$fila][] = round($GgrGuestMes);
$valores[$fila][] = round($GgrGuestAnio);
$valores[$fila][] = round($GgrGuestTotal);


/**
 * Win/slot/day
**/
$fila++;
$valores[$fila][] = "Win/slot/day";
$valores[$fila][] = "&nbsp;";
$valores[$fila][] = "&nbsp;";
$valores[$fila][] = "&nbsp;";
$valores[$fila][] = "&nbsp;";



/**
 * GGR/Day
**/
$GgrMes = $totGgr['mes']/(int)$fechahoy['mon'];
$GgrAnio = $totGgr['anio']/$diasDelAnio;
$GgrTotal = $totGgr['total']/$diasTotal;

$fila++;
$valores[$fila][] = "GGR/Day";
$valores[$fila][] = $totGgr['dia'];
$valores[$fila][] = round($GgrMes);
$valores[$fila][] = round($GgrAnio);
$valores[$fila][] = round($GgrTotal);

foreach ($valores as $value1) {
	$salida .= "
				<tr >";
	$pos = 0;
	foreach ($value1 as $value2) {
		$colspan = "";
		if ($pos > 0) {
			//$colspan = "colspan = 3";
		}
		$salida .= "
					<td ".$colspan."  class = 'celdasBordeada'>".$value2."</td>";
		$pos++;
	}
	$salida .= "
				</tr>";
}


$salida .= "</table>
		</body>
	</html>";
//echo $salida;die;
//$salida = "a";//utf8_decode('HOLA');
$dompdf = new DOMPDF();
$dompdf->load_html( $salida );

$dompdf->set_base_path( "pdfstyles.css" );
$dompdf->set_paper("","landscape");
$dompdf->render(); 

$array_opciones = array(
	"afichero" => 1,
	"compress" => 1,
	"p" => "landscape"
);
//echo "<pre>"; print_r($dompdf);echo "</pre>";die;
$dompdf->stream("GamingReport(".$fechaCompleta.").pdf",$array_opciones);
$file_to_save = "/tmp/GamingReport(".$fechaCompleta.").pdf";
//save the pdf file on the server
file_put_contents($file_to_save, $dompdf->output()); 
//$dompdf->stream("GamingReport(".$fechaCompleta.").pdf");
//echo $salida;die;

?>