
<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//echo "<pre>"; print_r($_GET); echo "</pre>";

if(array_key_exists("id", $_GET)){
    $libros = LibroQuery::create()->findOneById($_GET['id']);
    $nombreLibro = $libros->getNombre();
    //echo "<pre>"; print_r($libros->getTexto()); echo "</pre>";die;
    $filename = SITE_PATH."/libros/libro_".$_GET['id'].".txt";
    if(file_exists($filename)){
        $texto = file_get_contents($filename);
        $texto = base64_decode($texto);
    }else{
        $texto = "";
    }
    $idlibro = $_GET['id'];
}else{
    $nombreLibro = "";
    $texto = "";
    $idlibro = "";
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <style>
            #etiquetaGuardado{
                color: green;
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="wrap">
            <div class="box box-info">
                <div class="box-header">
                    <input type="text" placeholder="Nombre del proyecto" class="form-control" value="<?=$nombreLibro?>" id="nombrelibro" style="width: 70%">
                    <div class="pull-right box-tools">
                        <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                    <form id="formeditor">
                        <input type="hidden" id="idlibro" value="<?=$idlibro?>"/>
                        <input type="hidden" id="ultimaaccion" value=""/>
                        <textarea id="editor1" name="editor1" rows="10" cols="80"><?=$texto?></textarea>
                    </form>
                    <button class="btn btn-default" onclick="verPdf()" style="width: 24%" >Ver PDF</button>
                    <button class="btn btn-default" onclick="vistaPrevia()" style="width: 24%" >Vista previa</button>
                    <button class="btn btn-default" onclick="guardarversion()" style="width: 51%" >Guardar&nbsp;<span id="etiquetaGuardado">(Guardado correctamente)</span></button>
                </div>
              </div>
            <div class="clear"> </div>
            <div id="vistaPrevia" style="padding: 15px;"></div>
        </div>
    </body>
</html>