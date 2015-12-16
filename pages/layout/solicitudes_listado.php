<?php 
//echo "sarasa1";die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

$solicitudes = Solicitud_amistadQuery::create()->filterById_usuario_solicitado($_SESSION['userid'])->find();

//$solicitudes = Solicitud_amistadQuery::create()->findOneById(1);
////if ($_GET['verleid'] == "n") {
//    $notificaciones = NotificacionQuery::create()->filterByLeido("n")->filterById_receptor($_SESSION['userid'])->find();
//}else{
//    $checked = "checked";
//    $notificaciones = NotificacionQuery::create()->filterById_receptor($_SESSION['userid'])->find();
//}
//print_r($notificaciones->toArray());die;
?>

<div class="box">
    <div class="box-header"><h3 class="box-title">Solicitudes</h3></div>
    <div class="box-body">
        <!--<input <?=$checked;?> type="checkbox" id="listado_notificaciones_ver_leidos" value="s" > Ver solicitudes leidas-->
        <table id="lista_solicitudes" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Emisor</th>
                    <th>Descripcion</th>
                    <!--<th>Leido</th>-->
                </tr>
            </thead>
            <tbody id="tabla_listado_notificaciones">
                <?php
                    //if($notificaciones->count() != 0){
                        foreach ($solicitudes as $reg) {
                          //  $leido = ($reg->getLeido() == "s" ? "Si" : "No");
                            echo "  <tr>".
                                        "<td><a href='#'>".$reg->getUsuarioRelatedById_usuario_solicitante()->getNombre()."</a></td>".
                                        "<td>Te ha enviado una solicitud de amistad</td>".
                                        '<td><button class="btn btn-default btn-sm" onclick="aceptar_solicitud('.$reg->getId_usuario_solicitante().');rechazar_solicitud('.$reg->getId().')"> Aceptar</button><button class="btn btn-default btn-sm" onclick="rechazar_solicitud('.$reg->getId().')"> Rechazar</button></td>'.
                                         //"<td>".$leido."</td>".
                                    "</tr>";
                        }
                   //}
               
                 ?>
            </tbody>
            <tfoot>
                <tr>
                    <!--<th>Emisor</th>-->
                    <!--<th>Descripcion</th>-->
                    <!--<th>Leido</th>-->
                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div>