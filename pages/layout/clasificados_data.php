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
    case "solicitarcolaborar":
        $clasificadosObj = ClasificadosQuery::create()->findOneById($datos->id);  
        $solicitud = new Solicitud();
        /*<column name="id"    phpName="Id"   type="INTEGER" required="true" sqlType="INT(10)" primaryKey= "true" autoIncrement="true" />
        <column name="id_libro"    phpName="Id_libro"   type="INTEGER" required="true" sqlType="INT(10)" />
        <column name="id_usuario_solicitante"   phpName="Id_usuario_solicitante"  type="INTEGER" required="true" sqlType="INT(10)" />
        <column name="id_estado"   phpName="Id_estado"  type="INTEGER"  required="true" sqlType="INT(10)" />
        <column name="fecha_solic"  phpName="Fecha_solic" type="DATE" required="false"/>
        <column name="hora_solic"   phpName="Hora_solic"    size="8"     required="false" type="CHAR" />
        <column name="fecha_aprob"  phpName="Fecha_aprob" type="DATE" required="false"/>
        <column name="hora_aprob"   phpName="Hora_aprob"    size="8"     required="false" type="CHAR" />*/
        //$nom=date('Y-m-d H:i:s');
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