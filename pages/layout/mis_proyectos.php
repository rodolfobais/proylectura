
<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

$libros = LibroQuery::create()->filterById_usuario($_SESSION['userid'])->filterByEs_editable("s")->find();
//$usuarios = UsuarioQuery::create()->find();
$misproyectos = Libro_colaboradorQuery::create()->filterByIdusuario($_SESSION['userid'])->find();//filterByIdusuario($_SESSION['userid']);

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
                <!--Tabla -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Mis proyectos</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Libro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($libros as $reg) {
                                        echo "<tr>"
                                            . "<td>".$reg->getNombre()."</td>"
                                            . "<td>"
                                                . "<a href = \"#\" onclick=\"refreshDivs('cuerpocentro','pages/layout/editor.php','id=".$reg->getId()."');habilitareditor();\"><span class=\"glyphicon glyphicon-pencil\"></span></a>&nbsp;&nbsp;&nbsp;"
                                            . "</td>"
                                        . "</tr>";
                                    }//refreshDivs('cuerpocentro','pages/layout/mis_proyectos.php','".$reg->getId()."')
                                ?>
                                <?php
                                    foreach ($misproyectos as $reg) {
                                        echo "<tr>"
                                            . "<td>".$reg->getLibro()->getNombre()."</td>"
                                            . "<td>"
                                                . "<a href = \"#\" onclick=\"refreshDivs('cuerpocentro','pages/layout/editor.php','id=".$reg->getLibro()->getId()."');habilitareditor();\"><span class=\"glyphicon glyphicon-pencil\"></span></a>&nbsp;&nbsp;&nbsp;"
                                            . "</td>"
                                        . "</tr>";
                                    }//refreshDivs('cuerpocentro','pages/layout/mis_proyectos.php','".$reg->getId()."')
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