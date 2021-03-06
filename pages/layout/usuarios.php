
<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//$libros = LibroQuery::create()->find();
$usuarios = UsuarioQuery::create()->find();

//$listaLibros = "";

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
                <div class="section group" id="formulario_usuarios">
                    <div class="box box-default box-solid collapsed-box"> <!--box box-warning-->
                        <div class="box-header with-border">
                            <h3 class="box-title" id="titulo_formulario">Nuevo usuario</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" >
                            <input type="hidden" id="accion" value="n"/>
                            <div class="form-group">
                                <label>Id</label>
                                <input type="text" class="form-control" placeholder="ID" disabled id="id">
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="nombre" id="nombre">
                            </div>
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="email" class="form-control" placeholder="E-Mail" id="mail">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-default" onclick="enviar_form_usuarios()">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>	
                
                <!--Tabla -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Usuarios</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>E-Mail</th>
                                    <th>Password</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($usuarios as $reg) {
                                        //$listaLibros .= "<li>".$reg->getNombre()."</li>";
                                        echo "<tr>"
                                        . "<td>".$reg->getId()."</td>"
                                        . "<td id = \"nombre_".$reg->getId()."\">".$reg->getNombre()."</td>"
                                        . "<td id = \"mail_".$reg->getId()."\">".$reg->getMail()."</td>"
                                        . "<td id = \"passw_".$reg->getId()."\">".$reg->getPassword()."</td>"
                                        . "<td><a href = \"#\" onclick=\"editaregistro('".$reg->getId()."')\"><span class=\"glyphicon glyphicon-pencil\"></span></a>&nbsp;&nbsp;&nbsp;"
                                                . "<a href = \"#\" onclick=\"borrar_usuario('".$reg->getId()."')\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>"
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