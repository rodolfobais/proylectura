<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//echo "<pre>";print_r(json_decode($_POST['json']));  echo "</pre>";
$datos = json_decode($_POST['json']);
//$libros = LibroQuery::create()->find();
//$usuarios = UsuarioQuery::create()->find();

switch ($datos->accion) {
    case "marcar_leida"://Edit
        $notificacion = NotificacionQuery::create()->findOneById($datos->id);
        $notificacion->setLeido("s");
        $notificacion->save();
    break;
}

function guardarNotificacion($idReceptor, $descripcion, $idTipoNotif){
    $notificacion = new Notificacion();
    
    $notificacion->setId_emisor($_SESSION['userid']);
    $notificacion->setId_receptor($idReceptor);
    $notificacion->setDescripcion($descripcion);
    $notificacion->setId_tipo_notificacion($idTipoNotif);
    $notificacion->setLeido("n");   
    
    $notificacion->save();
    
    //echo json_encode(array( 'error' => 0, 'respuesta' => "Notificacion guardada correctamente"));
    return true;
}

?>