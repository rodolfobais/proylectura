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
        $usuarioObj = UsuarioQuery::create()->findOneById($datos->id);
        //echo $usuarioObj->toArray();
        $usuarioObj->setNombre($datos->nombre);
        $usuarioObj->setMail($datos->mail);

        $usuarioObj->save();
        echo json_encode(array( 'error' => 0, 'msg' => "Usuario modificado correctamente"));
    break;
    
    case "d"://Delete
        $usuarioObj = UsuarioQuery::create()->findOneById($datos->id);
        //$objTerapia = TerapiasQuery::create()->findOneById($_GET["id"]);
        if($usuarioObj != null){
                $usuarioObj->delete();
        }
        echo json_encode(array( 'error' => 0, 'msg' => "Usuario borrado correctamente"));
    break;
    case "n"://New
        $usuarioObj = new Usuario();
        $usuarioObj->setNombre($datos->nombre);
        $usuarioObj->setMail($datos->mail);

        $usuarioObj->save();
        echo json_encode(array( 'error' => 0, 'msg' => "Usuario creado correctamente"));
    break;

}

?>