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
    
    case "d"://Delete
        $solicitudObj = Solicitud_amistadQuery::create()->findOneById($datos->id);
         
        //$objTerapia = TerapiasQuery::create()->findOneById($_GET["id"]);
        if($solicitudObj != null){
                $solicitudObj->delete();
        }
        echo json_encode(array( 'error' => 0, 'msg' => "solicitud rechazada"));
    break;
    
    case "n"://New
        $solicitudObj = new AmistadQuery();
        $solicitudObj->setid_usuario_solicitado($datos->id_usuario_solicitado);
        $solicitudObj->setid_usuario_solicitante($datos->id_usuario_solicitante);
        $solicitudObj->setestado($datos->estado);
        
        $solicitudObj->save();
        echo json_encode(array( 'error' => 0, 'msg' => "solicitud aceptada"));
    break;

}

?>