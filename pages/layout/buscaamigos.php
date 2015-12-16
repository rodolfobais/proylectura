<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//$libros = LibroQuery::create()->findOneById($_GET['id']);
//$usuarios = UsuarioQuery::create()->find();

$idusuario=$_SESSION['userid'];
$usuario=  UsuarioQuery::create()->find();

//$clasificados = ClasificadosQuery::create()->find();
//echo $libro->getEs_editable();
?>
<div class="wrappers">

      <!-- Content Wrappers. Contains page content -->
    <div class="content-wrappers">

        <div class="box">
                <div class="box-header"><h3 class="box-title">Usuarios del sitio</h3></div>
                <div class="box-body">
                    <table id="lista_perfil" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
 
            <div class="post">
            <?php
            if($usuario != null){
                foreach ($usuario as $reg1) {
                echo "<tr>
                            <td><span href='#' onclick=\"refreshDivs('cuerpocentro','pages/layout/perfilvisita.php', 'id=".$reg1->getId()."')\"  class='username'><a id = \"nombre_".$reg1->getId()."\">".$reg1->getNombre()."</a></span></td>
                            <td><a onclick = 'solicitaramistad(\"".$reg1->getId()."\");'><i class='fa fa-fw fa-user-plus'></i></a></td>
                      </tr>";
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
            </div>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
  </div>

    </div>

</div>