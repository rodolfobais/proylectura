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
    case "d"://LO USAREMOS PARA TERMINAR LA AMISTAD
        $clasificadosObj = ClasificadosQuery::create()->findOneById($datos->id);
        
        if($clasificadosObj != null){
                $clasificadosObj->delete();
        }
        echo json_encode(array( 'error' => 0, 'msg' => "Clasificado borrado correctamente"));
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
    case "solicitarcolaborar":
        $clasificadosObj = ClasificadosQuery::create()->findOneById($datos->id);  
        $solicitud = new Solicitud();
        $solicitud->setId_libro($clasificadosObj->getId_libro());
        $solicitud->setId_usuario_solicitante($_SESSION['userid']);
        $solicitud->setId_estado("1");
        $solicitud->setFecha_solic(date('Y-m-d'));
        $solicitud->setHora_solic(date('H:i:s'));
        
        $solicitud->save();
        
        //echo $clasificadosObj->toArray();
        echo json_encode(array( 
            'msg' => "Solicitud enviada correctamente"
        ));
    break;
}

?>