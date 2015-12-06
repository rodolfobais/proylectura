<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

$solicitud = SolicitudQuery::create()->find();
                

$salida = //'<li class="header">Tenes 10 solicitudes</li>'
        
         '<li>'
        . '<ul class="menu">';
$cont= 0;
foreach ($solicitud as $reg) {
    //$listaLibros .= "<li>".$reg->getNombre()."</li>";
    $cont ++;
    $salida .= ' <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> Jorge te envio una solicitud de amistad
                        </a>
                      </li>';
    /*echo "<tr>"
    . "<td>".$reg->getId()."</td>"
    . "<td id = \"descripcion_".$reg->getId()."\">".$reg->getDescripcion()."</td>"

    . "</tr>";*/
}



$salida .= '</ul>
    </li>
<li class="footer"><a href="#">Ver todas las solicitudes</a></li>';

echo json_encode(array( 'error' => 0, 'salida' => $salida, 'cantidad' => $cantidad)); //muestra el array concatenado
?>
                    
                  