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
        $solicitudObj = SolicitudQuery::create()->findOneById($datos->id);
        //$objTerapia = TerapiasQuery::create()->findOneById($_GET["id"]);
        if($solicitudObj != null){
                $solicitudObj->delete();
        }
        echo json_encode(array( 'error' => 0, 'msg' => "solicitud rechazada"));
    break;
    
    case "n"://New
        $solicitudObj = new Amistad();
        $solicitudObj->setid_usuario($datos->idusuario);
        $solicitudObj->setid_usuarioamigo($datos->id_usuarioamigo);
        $setestado = $solicitudObj->setestado($datos->estado =1);
        
        $solicitudObj->save();
        echo json_encode(array( 'error' => 0, 'msg' => "solicitud aceptada"));
    break;

}

?>