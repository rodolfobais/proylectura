<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

$libros = LibroQuery::create()->find();
//$libros = LibroQuery::create()->findOneById(1);
//$libros->getId();
//$libros->getNombre();
$listaLibros = '<option value = "">Seleccione un libro</option>';
foreach ($libros as $reg) {
    $listaLibros .= '<option value = "'.$reg->getId().'">'.$reg->getNombre().'</option>';                         
}
$clasificados = ClasificadosQuery::create()->find();
//$clasificados->getTexto_corto();
?>
<div class="section group" id="formulario_clasificados">
    <div class="box box-default box-solid collapsed-box"> <!--box box-warning-->
        <div class="box-header with-border">
            <h3 class="box-title" id="titulo_formulario">Nuevo clasificado (para que otros usuarios colaboren en su proyecto)</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body" >
            <input type="hidden" id="accion" value="n"/>
            <input type="hidden" id="id" value=""/>
            <div class="form-group">
                <label>Texto corto</label>
                <input type="text" class="form-control" placeholder="Texto corto" id="texto_corto">
            </div>
            <div class="form-group">
                <label>Texto largo</label>
                <textarea placeholder="Texto largo" rows="3" class="form-control" id = "texto_largo"></textarea>
            </div>
            <div class="form-group">
                <label>Libros</label>
                <select id="libro" class="form-control"> <?php echo $listaLibros; ?> </select>
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-default" onclick="enviar_form_clasificado()">Enviar</button>
            </div>
        </div>
    </div>
</div>

</br>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Clasificados publicados por mi</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Libro</th>
                    <th>Texto corto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($clasificados as $reg) {
                        //$listaLibros .= "<li>".$reg->getNombre()."</li>";
                        echo "<tr>"
                        . "<td>".$reg->getId()."</td>"
                        . "<td id = \"nick_".$reg->getId()."\">".$reg->getLibro()->getNombre()."</td>"
                        . "<td id = \"nombre_".$reg->getId()."\">".$reg->getTexto_corto()."</td>"
                        . "<td><a href = \"#\" onclick=\"editaregistro_clasificado('".$reg->getId()."')\"><span class=\"glyphicon glyphicon-pencil\"></span></a>&nbsp;&nbsp;&nbsp;"
                                . "<a href = \"#\" onclick=\"borrar_clasificado('".$reg->getId()."')\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>"
                        . "</tr>";
                    }
                ?>
        </table>
    </div><!-- /.box-body -->
</div>
<!--
<div class="box-body chat" id="listado_clasificados">      
    <div class="item">
        <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">
        <p class="message">
            Usuario: <a href="#" class="name"  style="display: inline">Cristian Ancutza</a> 
            Libro: <a href="#" class="name" style="display: inline">lalalala</a><br/>
            Estoy rearmando el manual para sacar el registro de transito. Necesitaria un experto que 
            me arma la parte las señales de trasporte pesado que no tengo idea..
        </p>
        <div class="pull-right">
            <button class="btn btn-primary btn-sm btn-flat">Enviar solicitud de Colaboracion</button>
        </div>
    </div>
    <div class="item">
        <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">
        <p class="message">
            <a href="#" class="name">
                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 15 Nov 2015</small>
                Rodolfo Bais
            </a>
            Soy un programador triunfador en busqueda alguien para escribir un libro
            sobre un cavernicola que fue al futuro y tiene que ir a la escuela.
        </p>
        <div class="pull-right">
            <button class="btn btn-primary btn-sm btn-flat">Enviar solicitud de Colaboracion</button>
        </div>
    </div>
    <div class="item">
        <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">
        <p class="message">
            <a href="#" class="name">
                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 11 Nov 2015</small>
                Jorge Miranda
            </a>
            Busco ayuda para terminar un articulo sobre el uso correcto del peine, quizas tengan alguna 
            idea de como usarlo. Como soy calvo, no tengo muy claro como aplicarlo en el dia a dia.
        </p>
        <div class="pull-right">
            <button class="btn btn-primary btn-sm btn-flat">Enviar solicitud de Colaboracion</button>
        </div>
    </div>
</div>
-->