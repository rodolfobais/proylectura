<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//echo "<pre>";print_r(json_decode($_POST['json']));  echo "</pre>";
$datos = json_decode($_POST['json']);
//$libros = LibroQuery::create()->find();
//$usuarios = UsuarioQuery::create()->find();

switch ($datos->accion) {
    
    case "n"://New
        $mensajeObj = new Mensaje();
        
        $mensajeObj->setId_usuario_destinatario($datos->id_usuario_destinatario);
        $mensajeObj->setId_usuario_remitente($datos->id_usuario_remitente);
        $mensajeObj->setMensaje($datos->mensaje);
        $mensajeObj->setLeido($datos->leido);
        
        $mensajeObj->save();
        echo json_encode(array( 'error' => 0, 'msg' => "Mensaje enviado"));
    break;

}

?>