<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 0);
    include_once("../../data/config.php");
    //$notificacion = NotificacionQuery::create()->filterById_receptor($_SESSION['userid'])->find();
    $notificacion = NotificacionQuery::create()->filterById_receptor($_SESSION['userid'])->filterByLeido("n")->find();
    $salida = //'<li class="header">Tenes 10 notificaciones</li>'
            '<li>'
            . '<ul class="menu">';
    $cont = 0;
    foreach ($notificacion as $reg) {
        $cont++;
        $salida .= '<li>
                        <a href="#" onclick="marcarnotificacionleida(\''.$reg->getId().'\')">
                            <i class="fa fa-users text-aqua"></i> '.$reg->getDescripcion().'
                        </a>
                    </li>';
    }
    $salida .= '</ul>
            </li>
            <li class="footer"><a href="#" onclick = "vertodaslasnotificaciones();">Ver todas las notificaciones</a></li>';
    echo json_encode(array( 'error' => 0, 'salida' => $salida, 'cantidad' => $cont));
?>
                    
                  