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
    case "e"://Edit
        $generoObj = GeneroQuery::create()->findOneById($datos->id);
        //echo $generosObj->toArray();
        
        $generoObj->setNombre($datos->nombre);
        

        $generoObj->save();
        echo json_encode(array( 'error' => 0, 'msg' => "Genero modificado correctamente"));
    break;
    
    case "d"://Delete
        $generoObj = GeneroQuery::create()->findOneById($datos->id);
        //$objTerapia = TerapiasQuery::create()->findOneById($_GET["id"]);
        if($generoObj != null){
                $generoObj->delete();
        }
        echo json_encode(array( 'error' => 0, 'msg' => "genero borrado correctamente"));
    break;
    case "n"://New
        $generoObj = new Genero();
        
        $generoObj->setNombre($datos->nombre);
        

        $generoObj->save();
        echo json_encode(array( 'error' => 0, 'msg' => "Genero creado correctamente"));
    break;

}

?>