<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

$idusuario=$_SESSION['userid'];
$usuario=  UsuarioQuery::create()->findOneById($idusuario);

//$libros = LibroQuery::create()->find();
$libros = LibroQuery::create()->filterByDebaja(NULL)->find();
//$libros = LibroQuery::create()->findOneById(1);
//$usuarios = UsuarioQuery::create()->find();
$generos = GeneroQuery::create()->find();
        
$options = "<option value = ''>Seleccione un genero</option> ";
//$listaLibros = ""; 
foreach ($generos as $reg) { 
     //$listaGeneros .= "<li>".$reg->getNombre()."</li>";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     $options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     
 }
 
 $privacidad = PrivacidadQuery::create()->orderById("DESC")->find();
 foreach ($privacidad as $reg) { 
     //$listaGeneros .= "<li>".$reg->getNombre()."</li>";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     $privacidadopcion .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     
 }
 
 //echo $listaGeneros;
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
        <!---start-wrap---->			
        <!---end-header---->
        <!--start-image-slider---->
        <div class="wrap">
            <!--End-image-slider---->
            <!---start-content---->
            <div class="content">
                <div class="section group" id="formulario_libros">
                    <div class="box box-default box-solid collapsed-box"> <!--box box-warning-->
                        <div class="box-header with-border">
                            <h3 class="box-title" id="titulo_formulario">Nuevo libro</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" >
                            <form id="formpdf">
                                <input type="hidden" id="accion" value="n" name="accion"/>
                                <div class="form-group" hidden="Id">
                                    <label>Id</label>
                                    <input type="text" class="form-control" placeholder="ID" id="id" name="id">
                                </div>
                                <div class="form-group" id="campo_imagen">
                                    <label>Imagen de portada</label>
                                    <input type="file" id="image" value="" name="image"  /> 
                                </div>  
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" placeholder="Nombre" id="nombrelibro" name="nombrelibro">
                                </div>
                                <div class="form-group">
                                    <label>Asignar Genero</label>
                                    <select class="form-control" id="vinculogenero" name="vinculogenero"><?= $options; ?></select>
                                </div>
                                <div class="form-group">
                                    <label>Autor</label>
                                    <input type="text" class="form-control" placeholder="Autor o Autores" id="autor" name="autor">
                                </div>  
                                <div class="form-group">
                                    <label>Sinopsis</label>
                                    <input type="text" class="form-control" placeholder="Sinopsis" id="sinopsis" name="sinopsis">
                                </div>
                                <div class="form-group">
                                    <label>Seleccione la Privacidad </label>
                                    <select class="form-control" id="privacidad" name="privacidad"><?= $privacidadopcion; ?></select>
                                </div>
                                <div class="form-group" id="campo_pdf">
                                    <label>Pdf</label>
                                    <input type="file" id="pdf" value="" name="pdf"  /> 
                                </div>
                            </form>
                            <div class="form-group">
                                <button class="btn btn-block btn-default" value="<?php echo $usuario; ?>" onclick="enviar_form_libro()">Subir</button>
                            </div>
                        </div>
                    </div>
                </div>	
                
                <!--Tabla -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Libros</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Autor</th>
                                    <th>Sinopsis</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($libros as $reg) {
                                        //$listaLibros .= "<li>".$reg->getNombre()."</li>";
                                        echo 
                                        "<tr>"
                                            . "<td>".$reg->getId()."</td>"

                                            . "<td><a href='#' onclick=\"refreshDivs('cuerpocentro','pages/layout/perfillibro.php','id=".$reg->getId()."')\">".$reg->getNombre()."</a></td>"
                                            . "<td>".$reg->getAutor()."</td>"
                                            . "<td>".$reg->getSinopsis()."</td>"
                                            . "<td>"
                                                . "<a href = \"#\" title = 'Editar libro' onclick=\"editaregistro_libro('".$reg->getId()."')\"><span class=\"glyphicon glyphicon-pencil\"></span></a>&nbsp;&nbsp;&nbsp;"
                                                . "<a href = \"#\" title = 'Borrar libro' onclick=\"borrar_libro('".$reg->getId()."')\"><span class=\"glyphicon glyphicon-remove\"></span></a>&nbsp;&nbsp;&nbsp;";
                                        if($reg->getEs_editable() == "s"){
                                            echo "<a href = \"#\" title = 'Publicar libro' onclick=\"publicar_libro('".$reg->getId()."')\"><span class=\"glyphicon glyphicon-send\"></span></a>";
                                        }
                                        echo "</td>"
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