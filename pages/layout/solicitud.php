<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//$solicitud = Solicitud_amistadQuery::create()->find(); 
//   $solicitud_amistad = Solicitud_amistadQuery::create()->find();   
//$solicitud_amistad = SolicitudQuery::create()->find
// $reg->
//tengo un quilombo no puedo traer campos de la base solicitud_amistad por que me tome los de la tabla solicitud

$salida = //'<li class="header">Tenes 10 solicitudes</li>'
        
         '<li>'
        . '<ul class="menu">';
$cont= 0;
foreach ($solicitud as $reg) {
    //$listaLibros .= "<li>".$reg->getNombre()."</li>";
    $cont ++;
    $salida .= ' <li style:"width: 3px;">
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i>'. $reg->getUsuarioRelatedById_usuario_solicitante()->getNombre() .'</a> te envio una solicitud de amistad
                        <button class="btn btn-default btn-sm" onclick="aceptar_solicitud('.$reg->getId_usuario_solicitante().')"> Aceptar</button><button class="btn btn-default btn-sm" onclick="rechazar_solicitud('.$reg->getId().')"> Rechazar</button>
                      </li>';
    /*echo "<tr>"//,'. $reg->getId_usuario_solicitado().'
    . "<td>".$reg->getId()."</td>"
    . "<td id = \"descripcion_".$reg->getId()."\">".$reg->getDescripcion()."</td>"

    . "</tr>";*/
}



$salida .= '</ul>
    </li>
<li class="footer"><a href="pages/layout/solicitudes.php">Ver todas las solicitudes</a></li>';

echo json_encode(array( 'error' => 0, 'salida' => $salida, 'cantidad' => $cont)); //muestra el array concatenado
?>
                    
                  