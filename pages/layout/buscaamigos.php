<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

$usuariosamigo = UsuarioQuery::create()->find();
//var_dump($clasificados->toArray());
//$clasificados = ClasificadosQuery::create()->findOneById(1);
//$clasificados->getId_libro()
?>
<div class="box">
    <div class="box-header"><h3 class="box-title">Usuarios de sitio</h3></div>
<div class="box-body">
                        <table id="lista_clasif" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($usuariosamigo != null){
                                        foreach ($usuariosamigo as $reg) {
                                        echo "<tr>
                                                    <td>".$reg->getNombre()."</td>
                                                    <td><a onclick = 'solicitaramistad(\"".$reg->getId()."\");'><i class='fa fa-fw fa-user-plus'></i></a></td>
                                              </tr>";
                                        }
                                    }
                                ?> 
                        </table>
                    </div>
  </div>