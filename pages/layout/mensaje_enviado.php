<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");
$datos = json_decode($_POST['json']);
//$mensaje = MensajeQuery::create()->find();
 
/*    
switch($datos->accion){
    
    case "d"://borrar mensajes
          
        $mensajeObj = MensajeQuery::create()->findOneById($datos->id);
         
        //$objTerapia = TerapiasQuery::create()->findOneById($_GET["id"]);
        if($mensajeObj != null){
                $mensajeObj->delete();
        }
        echo json_encode(array( 'error' => 0, 'msg' => "Mensajes eliminados"));
    break;

    case "s": //mostrar panel lectura mensajes
*/
 /*'<div id="div_mensaje" class="col-md-3">'
 
              .'<div class="box box-primary" id="formulario_mensajes">'
              .' <div class="box-header with-border">'
              .'<h3 class="box-title">Mensaje</h3>'
              .'</div><!-- /.box-header -->'
                .'<div class="box-body" >'
  */

$mensaje = MensajeQuery::create()->findOneById($datos->id);               
$texto = $mensaje->getMensaje();
$destinatario = $mensaje->getUsuarioRelatedById_usuario_destinatario()->getNombre();
        
        
$salida .=       '<div class="form-group">
                   <input type="hidden" id="leido" value="s"/>
                   De: <span id="id_usuario_destinatario"> '.$destinatario.'</span>
                  </div>

                  <div class="form-group">
                    <textarea id="mensaje" class="form-control" style="height: 300px">'.$texto.'</textarea>
                  </div>
                </div><!-- /.box-body -->';
                
//echo json_encode(array( 'error' => 0, 'html' => $salida));
/*
.'<div class="box-footer">'
                  .'<div class="pull-right">'
                    
                    .'<button onclick="enviar_mensaje()" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>'
                
                  .'</div>'
                
                .'</div><!-- /.box-footer -->'
              .'</div><!-- /. box -->'
            .'</div><!-- /.col -->';
        
  
}*/
echo json_encode(array( 'error' => 0, 'html' => $salida));
?>
                    
              