<?php 
//echo "sarasa1";die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

$mensajes= MensajeQuery::create()->filterById_usuario_destinatario($_SESSION['userid'])->find();
//$mensajes = MensajeQuery::create()->findOneById(1);
////if ($_GET['verleid'] == "n") {
//    $notificaciones = NotificacionQuery::create()->filterByLeido("n")->filterById_receptor($_SESSION['userid'])->find();
//}else{
 //   $checked = "checked";
//    $notificaciones = NotificacionQuery::create()->filterById_receptor($_SESSION['userid'])->find();
//}
//print_r($notificaciones->toArray());die;
?>

<div class="box">
    <div class="box-header"><h3 class="box-title">Mensajes</h3></div>
    <div class="box-body">
       <!--<input <?=$checked;?> type="checkbox" id="listado_mensajes_ver_leidos" value="s"> Ver Mensajes leidos-->
        <table id="lista_notificaciones" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>De:</th>
                    <th>Asunto:</th>
                    <th>Leido</th>
                </tr>
            </thead>
            <tbody id="tabla_listado_mensajes">
                <?php
                    //if($notificaciones->count() != 0){
                        foreach ($mensajes as $reg) {
                            //$leido = ($reg->getLeido() == "s" ? "Si" : "No");
                            echo "  <tr>".
                                        "<td>".$reg->getUsuarioRelatedById_usuario_remitente()->getNombre()."</td>".
                                        "<td><a href='#' onclick='marcarMensajeLeido(".$reg->getId().")'>".$reg->getMensaje()."</a></td>".
                                        "<td>".$reg->getLeido()."</td>".
                                    "</tr>";
                        }
                   //}
                ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div>