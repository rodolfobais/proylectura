
<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

$libros = LibroQuery::create()->find();
//$usuarios = UsuarioQuery::create()->find();
$audiolibros = AudiolibroQuery::create()->find();

$options = "<option value = ''>Seleccione un libro</option> ";
//$listaLibros = ""; 
$arr=array();
foreach ($libros as $reg) { 
    if(!array_key_exists($reg->getId(), $arr)){
     $arr[$reg->getId()] = "";
     //$listaLibros .= "<li>".$reg->getNombre()."</li>";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     $options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     }
 }
//echo $listaLibros;
//$listaLibros = "";
//$libros = LibroQuery::create()->find();
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
        <!--start-image-slider---->
        <div class="wrap">
            <!--End-image-slider---->
            <!---start-content---->
            <div class="content">
                <div class="section group" id="formulario_audiolibros">
                    <!--<div class="box box-default box-solid collapsed-box"> box box-warning-->
                        <div class="box-header with-border">
                            <h3 class="box-title" id="titulo_formulario">Nuevo Audiolibro</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <!--<form name="formmp3" method="POST" action="http://localhost/proylectura/pages/layout/mp3.php" enctype="multipart/form-data">-->
                        <div class="box-body" >
                            <form id="formmp3">
                                <input type="hidden" id="accion" value="n" name="accion"/>

                                <input type="file" id="mp3" value="" name="mp3"  /> 
                                <div class="form-group">
                                    <label>Id</label>
                                    <input type="text" class="form-control" placeholder="ID" disabled id="id" name="id">
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" placeholder="Nombre" id="nombreaudio" name="nombreaudio">
                                </div>
                                <div class="form-group">
                                    <label>Vincular a Libro</label>
                                    <select class="form-control" id="vinculolibro" name="vinculolibro"><?= $options; ?></select>
                                </div>
                            </form>
                            <div class="form-group">
                                <button class="btn btn-block btn-default" onclick="enviar_form_audiolibros()">Generar</button>
                            </div>
                        </div>
                    <!--</div>-->
                </div>	
                <!--Tabla -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Audiolibros</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($audiolibros as $reg) {
                                        //$listaLibros .= "<li>".$reg->getNombre()."</li>";
                                        echo "<tr>"
                                        . "<td>".$reg->getId()."</td>"
                                        . "<td id = \"nombreaudio_".$reg->getId()."\">".$reg->getNombre()."</td>"
                                        . "<td><a href = \"#\" onclick=\"editaregistroaudio('".$reg->getId()."')\"><span class=\"glyphicon glyphicon-pencil\"></span></a>&nbsp;&nbsp;&nbsp;"
                                                . "<a href = \"#\" onclick=\"borrar_audiolibro('".$reg->getId()."')\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>"
                                        . "</tr>";
                                    }
                                ?>
                        </table>
                    </div><!-- /.box-body -->
                </div>
            </div>
            <!---End-content---->
            <div class="clear"> </div>
        </div>
    </body>
</html>