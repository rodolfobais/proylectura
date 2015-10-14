<?php
error_reporting(E_ALL);
//error_reporting(1);
//echo "<pre>"; print_r(json_decode($_POST['json'])); echo "</pre>";die;
$datos = json_decode($_POST['json']);
$error = 0; $msg = "";
$asunto = "Contacto desde pagina web";
$contenido = "";

$tipoconsulta = $datos->tipoconsulta;
$nombre = $datos->nombre;
$apellido = $datos->apellido;
$mail = $datos->mail;
$celular = $datos->celular;
$consulta = $datos->consulta;

switch ($tipoconsulta) {
	case 1:
		$tipoconsultaTxt = "Pedido de asesoramiento";
	break;
	case 2:
		$tipoconsultaTxt = "Pedido de apertura";
	break;
	case 3:
		$tipoconsultaTxt = "Sugerencia / Oportunidad de mejora";
	break;
}
$contenido .= "Tipo de consulta: ".$tipoconsultaTxt."<br/>";
$contenido .= "Nombre: ".$nombre."<br/>";
$contenido .= "Apellido: ".$apellido."<br/>";
$contenido .= "E-Mail: ".$mail."<br/>";
$contenido .= "Celular: ".$celular."<br/>";
$contenido .= "Consulta: ".$consulta."<br/>";




$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf8' . "\r\n";
$headers .= "From: ".$nombre."<".$mail.">" . "\r\n";

$to = "osvaldo.sevilla@outboxfactory.com";
$error = "";
if(!mail( $to, $asunto, $contenido, $headers ))
{
	$error = "Error al enviar el email";
	
}
echo json_encode((object)array( 'error' => $error, 'msg' => "", 'html' => ""));
?>