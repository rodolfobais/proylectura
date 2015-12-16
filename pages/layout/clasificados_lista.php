<?php 
error_reporting(E_ALL);
ini_set("display_errors", 0);
include_once("../../data/config.php");

$clasificados = ClasificadosQuery::create()->find();
//var_dump($clasificados->toArray());
//$clasificados = ClasificadosQuery::create()->findOneById(1);
//$clasificados->getId_libro()
?>
<div class="box">
    <div class="box-header"><h3 class="box-title">Clasificados</h3></div>
    <div class="box-body">
        <table id="lista_clasif" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Libro</th>
                <th>Texto corto</th>
                <th>Texto largo</th>
                <th>Postularse</th>
            </tr>
        </thead>
        <tbody>
<?php
if($clasificados != null){
    foreach ($clasificados as $reg) {//
        if(SolicitudQuery::create()->filterById_usuario_solicitante($_SESSION['userid'])->filterById_libro($reg->getId_libro)->find()->count() == 0){
            echo "<tr>
                    <td>".$reg->getLibro()->getUsuarioRelatedById_usuario()->getNombre()."</td>
                    <td>".$reg->getLibro()->getNombre()."</td>
                    <td>".$reg->getTexto_corto()."</td>
                    <td>".$reg->getTexto_largo()."</td>
                    <td><a onclick = 'solicitarcolaborar(\"".$reg->getId()."\");'><i class='fa fa-fw fa-user-plus'></i></a></td>
              </tr>";
        }
    }
}/*else{
    echo "<tr>
                <td>No se encontraron registros</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
          </tr>";
}*/
?>            
        </tbody>
        <tfoot>
          <tr>
            <th>Usuario</th>
            <th>Libro</th>
            <th>Texto corto</th>
            <th>Texto largo</th>
            <th>Postularse</th>
          </tr>
        </tfoot>
      </table>
    </div><!-- /.box-body -->
  </div>