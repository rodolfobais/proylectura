<?php
header('Content-Type: application/json');
include_once("../data/config.php");
include_once("json.php");
$jsonx = new Services_JSON();
$valida = "";
$entro="";
if(isset($_REQUEST["json"]))
{
	
	$req_json=stripcslashes($_REQUEST["json"]);
	
	$req_json = $jsonx->decode($req_json);

	$proceso = $req_json->proceso;
	$entro = "ok"; 

	switch( $proceso )
	{
		case "tmpEditarHorario":
			include_once("../data/clinica/modules/clinica/horarios.php");
			$idusuario = $req_json->idu;
			$dia = $req_json->dia;
			$desde = $req_json->desde;
			$hasta = $req_json->hasta;
			$item = $req_json->itemx;
			//hace update de un horario temporal
			$respuesta = updateTmpHorario($idusuario,$dia,$desde,$hasta,$item);
			
			if($respuesta=="")
			{
				$data = array(
						"html" => "OK"
				);
				$valor_salida = $jsonx->encode($data);
			}
			else
			{
				echo '{"html":"","otroerror" : "true", "otroerrormessage" : "'.addslashes($respuesta).'"}';
				die();
			}		
			break;
		
		case "tmpHorarios":
			include_once("../data/clinica/modules/clinica/horarios.php");
			$idusuario = $req_json->idu;
			$dia = $req_json->dia;
			$desde = $req_json->desde;
			$hasta = $req_json->hasta;
			$respuesta = guardarHorariosTemp($idusuario,$dia,$desde,$hasta);
			if($respuesta=="")
			{
				$data = array(
						"html" => "OK"
				);
				$valor_salida = $jsonx->encode($data);
			}
			else
			{
				echo '{"html":"","otroerror" : "true", "otroerrormessage" : "'.addslashes($respuesta).'"}';
				die();
			}		
			break;
		case "getTmpHorario":
			include_once("../data/clinica/modules/clinica/horarios.php");
			$item = $req_json->Item;
			$arrayRespuesta = cargarUnSoloHorario($item);
			$respuesta = $arrayRespuesta["respuesta"]; 
			if($respuesta=="")
			{
				$data = array(
						"html" => "OK"
						,"dia" => $arrayRespuesta["dia"]
						,"desde" => $arrayRespuesta["desde"]
						,"hasta" => $arrayRespuesta["hasta"]
				);
				$valor_salida = $jsonx->encode($data);
			}
			else
			{
				echo '{"html":"","otroerror" : "true", "otroerrormessage" : "'.addslashes($respuesta).'"}';
				die();
			}
			break;	
		case "tmpCargarGrilla":
			include_once("../data/clinica/modules/clinica/horarios.php");
			$idusuario = $req_json->idu;
			$arrayRespuesta = cargarHorariosTemp($idusuario);
			$respuesta = $arrayRespuesta["respuesta"]; 
			if($respuesta=="")
			{
				$data = array(
						"html" => "OK"
						,"grilla" => $arrayRespuesta["grilla"]
				);
				$valor_salida = $jsonx->encode($data);
			}
			else
			{
				echo '{"html":"","otroerror" : "true", "otroerrormessage" : "'.addslashes($respuesta).'"}';
				die();
			}		
			break;
		case "delTmpHorario":
			include_once("../data/clinica/modules/clinica/horarios.php");
			$item = $req_json->Item;
			//hace update de un horario temporal
			$respuesta = deleteTmpHorario($item);
			
			if($respuesta=="")
			{
				$data = array(
						"html" => "OK"
				);
				$valor_salida = $jsonx->encode($data);
			}
			else
			{
				echo '{"html":"","otroerror" : "true", "otroerrormessage" : "'.addslashes($respuesta).'"}';
				die();
			}		
			break;
		default :
			echo '{"html":"","otroerror" : "true", "otroerrormessage" : "Proceso inexistente"}';
			die();
		break;
	}
	echo $valor_salida;
}
else
{
	print_r($_POST);die();
}
?>