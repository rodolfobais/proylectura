
<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//->filterByIdusuario($_SESSION['userid'])
$versiones = Libro_versionQuery::create()->orderByIdlibro()->orderById()->find();

$options = "<option value = ''>Seleccione un libro</option> ";
$arr=array();
foreach ($versiones as $reg) {
    if(!array_key_exists($reg->getIdlibro(), $arr)){
        $arr[$reg->getIdlibro()] = "";
        $options .= "<option value = '".$reg->getIdlibro()."'>".$reg->getLibro()->getNombre()."</option> ";
    }
}

//$versiones = Libro_versionQuery::create()->findOneById(1);
//$versiones->getLibro()->getNombre();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Proyecto lectura</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>
        <div class="wrap">
            <div class="content">
                <div class="section group" id="formulario_usuarios">
                    <div class="form-group">
                        <label>Libro</label>
                        <select class="form-control" id="libroFil" onchange="filtrarversiones(this.value)"><?=$options ?></select>
                    </div>                        
                </div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Versiones</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width = 20><button class="btn btn-success btn-flat" onclick="comparar()">Comparar</button></th>
                                    <th>#Version</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Usuario</th>
                                </tr>
                            </thead>
                            <tbody id="listado">
                                <?php
                                    /*
                                    foreach ($versiones as $reg) {
                                        //$listaLibros .= "<li>".$reg->getNombre()."</li>";
                                        echo "<tr>"
                                            . "<td>".$reg->getId()."</td>"
                                            . "<td>".$reg->getFecha()."</td>"
                                            . "<td>".$reg->getHora()."</td>"
                                            . "<td>".$reg->getUsuario()->getNombre()."</td>"
                                           . "</tr>";
                                    }
                                    */
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <span id="comparacion"></span>
            </div>	
        </div>
        <div class="clear"> </div>
    </body>
</html>