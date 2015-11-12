
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
        <!-- Bootstrap 3.3.5 
        <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">-->
        <!-- Font Awesome 
        <link rel="stylesheet" href="../../../css/font-awesome.min.css">-->
        <!-- Ionicons 
        <link rel="stylesheet" href="../../../css/ionicons.min.css">-->
        <!-- Theme style 
        <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">-->
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. 
        <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
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
                <div class="section group">
                    <div >
                        <div class="box box-default box-solid collapsed-box"> <!--box box-warning-->
                            <div class="box-header with-border">
                                <h3 class="box-title">Nuevo usuario</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <!--
                                id
                                nick
                                nombre
                                mail
                                passw
                                admin
                                -->
                                <div class="form-group">
                                    <label>Id</label>
                                    <input type="text" class="form-control" placeholder="ID" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Nick</label>
                                    <input type="text" class="form-control" placeholder="Nick">
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" placeholder="Nick">
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" class="form-control" placeholder="E-Mail">
                                </div>
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
                                    <th>Nick</th>
                                    <th>Nombre</th>
                                    <th>E-Mail</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($usuarios as $reg) {
                                        //$listaLibros .= "<li>".$reg->getNombre()."</li>";
                                        echo "<tr>"
                                        . "<td>".$reg->getId()."</td>"
                                        . "<td>".$reg->getNick()."</td>"
                                        . "<td>".$reg->getNombre()."</td>"
                                        . "<td>".$reg->getMail()."</td>"
                                        . "<td>".$reg->getPassword()."</td>"
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