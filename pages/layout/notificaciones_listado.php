<?php 
//echo "sarasa1";die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

$notificaciones = NotificacionQuery::create()->filterById_receptor($_SESSION['userid'])->find();
if ($_GET['verleid'] == "n") {
    $notificaciones = NotificacionQuery::create()->filterByLeido("n")->filterById_receptor($_SESSION['userid'])->find();
}else{
    $checked = "checked";
    $notificaciones = NotificacionQuery::create()->filterById_receptor($_SESSION['userid'])->find();
}
//print_r($notificaciones->toArray());die;
?>

<div class="box">
    <div class="box-header"><h3 class="box-title">Notificaciones</h3></div>
    <div class="box-body">
        <input <?=$checked;?> type="checkbox" id="listado_notificaciones_ver_leidos" value="s" onclick="listadonotificacionesverleidos()"> Ver notificaciones leidas
        <table id="lista_notificaciones" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>Emisor</th>
                    <th>Leido</th>
                </tr>
            </thead>
            <tbody id="tabla_listado_notificaciones">
                <?php
                    //if($notificaciones->count() != 0){
                        foreach ($notificaciones as $reg) {
                            $leido = ($reg->getLeido() == "s" ? "Si" : "No");
                            echo "  <tr>".
                                        "<td><a href='#' onclick=\"marcarnotificacionleida('".$reg->getId()."')\">".$reg->getDescripcion()."</a></td>".
                                        "<td>".$reg->getUsuarioRelatedById_emisor()->getNombre()."</td>".
                                        "<td>".$leido."</td>".
                                    "</tr>";
                        }
                   //}
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Descripcion</th>
                    <th>Emisor</th>
                    <th>Leido</th>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div>