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
        $libroObj = LibroQuery::create()->findOneById($datos->id);
        //echo $usuarioObj->toArray();
        
        $libroObj->setNombre($datos->nombre);
        $libroObj->setFecha($datos->fecha);
        $libroObj->setSinopsis($datos->sinopsis);
        

        $libroObj->save();
        echo json_encode(array( 'error' => 0, 'msg' => "Libro modificado correctamente"));
    break;
    
    case "d"://Delete
        $libroObj = LibroQuery::create()->findOneById($datos->id);
        //$objTerapia = TerapiasQuery::create()->findOneById($_GET["id"]);
        if($libroObj != null){
                $libroObj->delete();
        }
        echo json_encode(array( 'error' => 0, 'msg' => "Libro borrado correctamente"));
    break;
    case "n"://New
        $libroObj = new Libro();
        
        $libroObj->setNombre($datos->nombre);
        $libroObj->setFecha($datos->fecha);
        $libroObj->setSinopsis($datos->sinopsis);

        $libroObj->save();
        echo json_encode(array( 'error' => 0, 'msg' => "Libro creado correctamente"));
    break;

}

?>