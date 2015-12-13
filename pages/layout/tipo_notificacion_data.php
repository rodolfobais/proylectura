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
    
    case "1"://Guardar version
        $generoObj = Tipo_notificacionQuery::create()->findOneById($datos->id);     
        $generoObj->setNombre($datos->nombre);
        $generoObj->save();
        
        echo json_encode(array( 'error' => 0, 'msg' => "Se ha guardado una nueva version en un libro tuyo"));
    break;
    
    case "2"://Comentario de libro
        $generoObj = Tipo_notificacionQuery::create()->findOneById($datos->id);
        $generoObj->setNombre($datos->nombre);
        $generoObj->save();
        
        echo json_encode(array( 'error' => 0, 'msg' => "Un usuario ha comentado un libro tuyo"));
    break;

    case "3"://Postulacion en clasificados
        $generoObj = Tipo_notificacionQuery::create()->findOneById($datos->id);     
        $generoObj->setNombre($datos->nombre);
        $generoObj->save();
        
        echo json_encode(array( 'error' => 0, 'msg' => "Un usuario se ha postulado para un clasificado tuyo"));
    break;

    case "4"://Publicacion de un libro
        $generoObj = Tipo_notificacionQuery::create()->findOneById($datos->id);
        $generoObj->setNombre($datos->nombre);
        $generoObj->save();
        
        echo json_encode(array( 'error' => 0, 'msg' => ""));
    break;

    case "5"://Aceptacion de amistad
        $generoObj = Tipo_notificacionQuery::create()->findOneById($datos->id);     
        $generoObj->setNombre($datos->nombre);
        $generoObj->save();
        
        echo json_encode(array( 'error' => 0, 'msg' => "Te han aceptado una solicitud de amistad"));
    break;

    case "6"://Subir un PDF
        $generoObj = Tipo_notificacionQuery::create()->findOneById($datos->id);         
        $generoObj->setNombre($datos->nombre);
        $generoObj->save();
        
        echo json_encode(array( 'error' => 0, 'msg' => "Se ha subido un archivo PDF"));
    break;

    case "7"://denuncia
        $generoObj = Tipo_notificacionQuery::create()->findOneById($datos->id);     
        $generoObj->setNombre($datos->nombre);
        $generoObj->save();
        
        echo json_encode(array( 'error' => 0, 'msg' => "Se ha denunciado una publicacion"));
    break;

    case "8"://Recomendacion de libro
        $generoObj = Tipo_notificacionQuery::create()->findOneById($datos->id);     
        $generoObj->setNombre($datos->nombre);
        $generoObj->save();
        
        echo json_encode(array( 'error' => 0, 'msg' => "Se ha recomendado un libro tuyo"));
    break;
}
?>