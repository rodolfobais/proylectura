<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");
$datos = json_decode($_POST['json']);
//$mensaje = MensajeQuery::create()->find();
 
    
switch($datos->accion){
    
    case "d"://borrar mensajes
          
        $mensajeObj = MensajeQuery::create()->findOneById($datos->id);
         
        //$objTerapia = TerapiasQuery::create()->findOneById($_GET["id"]);
        if($mensajeObj != null){
                $mensajeObj->delete();
        }
        echo json_encode(array( 'error' => 0, 'msg' => "Mensajes eliminados"));
    break;
    
    case "l"://leer mensajes

    $mensaje = MensajeQuery::create()->findOneById($datos->id);               
    $texto = $mensaje->getMensaje();
    $remitente = $mensaje->getUsuarioRelatedById_usuario_remitente()->getNombre();


    $salida .=       '<div class="form-group">
                       <input type="hidden" id="leido" value="s"/>
                       De: <span id="id_usuario_destinatario"> '.$remitente.'</span>
                      </div>

                      <div class="form-group">
                        <textarea id="mensaje" class="form-control" style="height: 300px">'.$texto.'</textarea>
                      </div>
                </div><!-- /.box-body -->';
                

        echo json_encode(array( 'error' => 0, 'html' => $salida));

        break;

    case "r"://responder mensajes
        
    $mensaje = MensajeQuery::create()->findOneById($datos->id);               
    //$texto = $mensaje->getMensaje();
        
        //en la respuesta el remitente es el destinatario
    $remitente = $mensaje->getUsuarioRelatedById_usuario_remitente()->getNombre();
    
    //en remitente deberia enviar el id en lugar del nombre
    
    $salida .=       '<div id="respuesta" class="form-group">
                       <input type="hidden" id="leido" value="n"/>
                       <input type="hidden" disabled id="id">
                       <input type="hidden" id="id_usuario_remitente" value="'.$_SESSION["userid"].'"/>
                       <input type="hidden" id="id_usuario_destinatario" value="'.$mensaje->getId_usuario_remitente().'"/>
                        Para: <span > '.$remitente.'</span>
                      </div>

                      <div id="respuesta" class="form-group">
                        <textarea id="mensaje" class="form-control" style="height: 300px"></textarea>
                      </div>
                </div><!-- /.box-body -->
                <div class="pull-right">
                    
                    <button onclick="enviar_respuesta()" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
                
                  </div>
                ';
                

        echo json_encode(array( 'error' => 0, 'html' => $salida));

        break;
        
        case "n"://Enviar respuesta
            
        $mensajeObj = new Mensaje();
        
        $mensajeObj->setId_usuario_destinatario($datos->id_usuario_destinatario);
        $mensajeObj->setId_usuario_remitente($datos->id_usuario_remitente);
        $mensajeObj->setMensaje($datos->mensaje);
        $mensajeObj->setLeido($datos->leido);
        
        $mensajeObj->save();
        echo json_encode(array( 'error' => 0, 'msg' => "Respuesta enviada"));

        break;
}
    ?>
                    
              