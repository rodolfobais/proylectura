<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

$mensaje = MensajeQuery::create()->find();
//'<li class="header">You have 5 messages</li>'
$salida = '<li>'
        . '<ul class="menu">';
$cont =0;
foreach ($mensaje as $reg) {
    //$listaLibros .= "<li>".$reg->getNombre()."</li>";
    $cont++;
    $salida .= '<li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>';
    /*echo "<tr>"
    . "<td>".$reg->getId()."</td>"
    . "<td id = \"descripcion_".$reg->getId()."\">".$reg->getDescripcion()."</td>"

    . "</tr>";*/
}



$salida .= '</ul>
    </li>
<li class="footer"><a href="#">See All Messages</a></li>';

echo json_encode(array( 'error' => 0, 'salida' => $salida, 'cantidad' => $cantidad)); //muestra el array concatenado
?>
                    
                  