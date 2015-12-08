<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//echo "<pre>";print_r(json_decode($_POST['json']));  echo "</pre>";
$datos = json_decode($_POST['json']);
//$libros = LibroQuery::create()->find();
//$usuarios = UsuarioQuery::create()->find();
//echo "accion:".$datos->accion;
switch ($datos->accion) {
    case "e"://Edit
        
        $clasificadosObj = ClasificadosQuery::create()->findOneById($datos->id);
        $clasificadosObj->setTexto_corto($datos->texto_corto);
        $clasificadosObj->setTexto_largo($datos->texto_largo);
        $clasificadosObj->setId_libro($datos->libro);

        $clasificadosObj->save();
        echo json_encode(array( 'error' => 0, 'msg' => "Clasificado modificado correctamente"));
    break;
    case "d"://Delete
        $clasificadosObj = ClasificadosQuery::create()->findOneById($datos->id);
        
        if($clasificadosObj != null){
                $clasificadosObj->delete();
        }
        echo json_encode(array( 'error' => 0, 'msg' => "Clasificado borrado correctamente"));
    break;
    case "n"://New
        $clasificadosObj = new Clasificados();
        $clasificadosObj->setTexto_corto($datos->texto_corto);
        $clasificadosObj->setTexto_largo($datos->texto_largo);
        $clasificadosObj->setId_libro($datos->libro);

        $clasificadosObj->save();
        echo json_encode(array( 'error' => 0, 'msg' => "Clasificado creado correctamente"));
    break;
    case "obtener_datos":
        $clasificadosObj = ClasificadosQuery::create()->findOneById($datos->id);      
        
        //echo $clasificadosObj->toArray();
        echo json_encode(array( 
            'texto_corto' => $clasificadosObj->getTexto_corto(), 
            'texto_largo' => $clasificadosObj->getTexto_largo(),
            'libro' => $clasificadosObj->getId_libro()
        ));
    break;
}

?>