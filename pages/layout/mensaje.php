<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

$mensaje = MensajeQuery::create()->filterById_usuario_destinatario($_SESSION['userid'])->find();

//$mensaje = MensajeQuery::create() ->findOneById(0);

//$mensaje->getUsuarioRelatedById_usuario_remitente()->getNick();


//'<li class="header">You have 5 messages</li>'

$salida = '<li>'
        . '<ul class="menu">';
$cont =0;
foreach ($mensaje as $reg) {
    //$listaLibros .= "<li>".$reg->getNombre()."</li>";
    if($reg->getleido() != "s")
    {
    $cont++;
    $salida .= '<li><!-- start message -->
                        <a href="#" onclick="vermensajeseleccionado('.$reg->getId().');">
                          <div class="pull-left">
                            '.
                                //<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          '</div>
                            <h4><span>
                            Mensaje de 
                             '.$reg->getUsuarioRelatedById_usuario_remitente()->getNombre()                    
                                .'
                            
                            </span>'.
                                //<small><i class="fa fa-clock-o"></i> 5 mins</small>
                          '</h4><p><span id="mensaje">'.$reg->getmensaje().'</span></p>'.
                         
//<p>Why not buy a new awesome theme?</p>
                        '</a>
                      </li>';
    
    }
        
    /*echo "<tr>"
    . "<td>".$reg->getId()."</td>"
    . "<td id = \"descripcion_".$reg->getId()."\">".$reg->getDescripcion()."</td>"

    . "</tr>";*/
}



$salida .= '</ul>
    </li>
<li class="footer"><a href="#" onclick="vertodoslosmensajes();">Ver todos los mensajes</a></li>';

echo json_encode(array( 'error' => 0, 'salida' => $salida, 'cantidad' => $cont)); //muestra el array concatenado
?>
                    
                  