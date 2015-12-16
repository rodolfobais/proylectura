<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//include("perfilpublico");
//include("perfilprivado");

//refreshDivs('cuerpocentro','pages/layout/perfilsesion.php', 'id=".$reg->getId()."')\
$idusuario=$_SESSION['userid'];
//$libros = LibroQuery::create()->find();
//$usuarios = UsuarioQuery::create()->find();
//$audiolibros = AudiolibroQuery::create()->find();
$libros = LibroQuery::create()->filterById_usuario($idusuario)->find();
//$libros=  LibroQuery::create()->findOneById($idLibro);

$usuario=  UsuarioQuery::create()->findOneById($idusuario);
$user = UsuarioQuery::create()->find(); // ES PARA LLAMAR TODOS LOS USUARIOS
//$options = "<option value = ''>Seleccione un libro</option> ";
//$arr=array();

 
?>
    <div class="wrappers">
      <!-- Content Wrappers. Contains page content -->
      <div class="content-wrappers">
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Perfil general con imagen -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="http://localhost/proylectura/dist/img/user4-128x128.jpg" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $usuario->getNombre(); ?></h3>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Amigos</b> <a class="pull-right">13</a>
                    </li>
                  </ul>
                  <a href="#" class="btn btn-primary btn-block"><b>Abrir casilla de mensajes</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Acerca de Mi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Educacion</strong>
                  <p class="text-muted">
                    Estudiante Tecnicatura Universitaria en Desarrllo Web
                  </p>
                  <hr>
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Lugar</strong>
                  <p class="text-muted">San Justo, La Matanza</p>

                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Perfil Lectura</strong>
                  <p>
                    <span class="label label-danger">Programacion</span>
                    <span class="label label-success">Ciencia Ficcion</span>
                    <span class="label label-info">Formacion Educativa</span>
                    <span class="label label-warning">Matematica</span>
                    <span class="label label-primary">Fisica</span>
                  </p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notas</strong>
                  <p>Me gustaria ayudar en proyectos de formacion academicas.</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <!--Fin Perfil general con imagen -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Libreria</a></li>
                  <li><a href="#timeline" data-toggle="tab">Editar mis datos</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <div class="post">
                    <?php
                        foreach ($libros as $reg) {
                            //$listaLibros .= "<li>".$reg->getNombre()."</li>";
                            echo "<tr>"
                            . "<div class='user-block' >"
                            . "<img class='img-circle img-bordered-sm' src='portadas/".$reg->getImage().".jpg' alt='user image'/>"
                            . "<span onclick=\"refreshDivs('cuerpocentro','pages/layout/perfillibro.php', 'id=".$reg->getId()."')\"  class='username'><a id = \"nombre_".$reg->getId()."\">".$reg->getNombre()."</a></span>"
                            . "</div>"
                            . "<p id = \"nombre_".$reg->getId()."\">".$reg->getSinopsis()."</p>"
                            . "</tr>";
                        }
                    ?>
                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                      <div class="content">
                            <div class="section group" >
                                    <div class="box-body" >
                                        <form id="formfoto">
                                        <input type="hidden" id="accion" value="e"/>
                                        <div class="form-group">
                                            <label>Subir imagen de perfil</label>
                                            <input type="file" id="imagenperfil" value="" name="imagenperfil"  /> 
                                        </div>  
                                        <div class="form-group">
                                            <label>Id</label>
                                            <input type="text" class="form-control" placeholder="ID" disabled id="">
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" placeholder="nombre" value="<?php echo $usuario->getNombre(); ?>" id="">
                                        </div>
                                        <div class="form-group">
                                            <label>E-Mail</label>
                                            <input type="email" class="form-control" placeholder="E-Mail" value="<?php echo $usuario->getMail(); ?>" id="">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password" value="<?php echo $usuario->getPassword(); ?>" id="" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label>Educacion</label>
                                            <input type="text" class="form-control" placeholder="edu" value="<?php echo $usuario->getEducacion(); ?>" id="">
                                        </div>
                                        <div class="form-group">
                                            <label>Intereses</label>
                                            <input type="text" class="form-control" placeholder="interes" value="<?php echo $usuario->getLugar(); ?>" id="">
                                        </div>
                                        <div class="form-group">
                                            <label>Nota de perfil</label>
                                            <input type="text" class="form-control" placeholder="nota" value="<?php echo $usuario->getNota(); ?>" id="">
                                        </div>
                                        </form>
                                        <div class="form-group">
                                            <button class="btn btn-block btn-default" onclick="editaperfilfoto()">Confirmar modificacion</button>
                                        </div>
                                    </div>
                            </div>	
                            <!--Tabla -->
                      </div>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrappers -->

      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrappers -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>  