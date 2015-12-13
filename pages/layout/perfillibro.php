<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//$libros = LibroQuery::create()->findOneById($_GET['id']);
//$usuarios = UsuarioQuery::create()->find();

$idusuario=$_SESSION['userid'];
$usuario=  UsuarioQuery::create()->findOneById($idusuario);

$audiolibros = AudiolibroQuery::create()->find();
$idLibro=$_GET['id'];
$libro=  LibroQuery::create()->findOneById($idLibro);
//echo $libro->getEs_editable();

//$options = "<option value = ''>Seleccione un libro</option> ";
$listaaudios = ""; 
//$arr=array();
foreach ($audiolibros as $reg) { 
    //if(!array_key_exists($reg->getId(), $arr)){
     //$arr[$reg->getId()] = "";
     $listaaudios .= "<li>".$reg->getNombre()."</li>";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     //}
 }
//echo $listaLibros;
//$listaLibros = "";
//$libros = LibroQuery::create()->find();
?>
    <div class="wrappers">
      <div class="content-wrappers">
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img style="width: 350px" class="profile-user-img img-responsive" src="portadas/<?php echo $idLibro; ?>.jpg" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $libro->getNombre(); ?></h3>
                  <p class="text-muted text-center"></p>

                  <ul class="list-group list-group-unbordered">
                   
                      <li class="list-group-item">
                          <b>Autor</b> <a class="pull-right"><?php echo $libro->getAutor(); ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Genero</b> <a class="pull-right"><?php echo $libro->getGenero()->getNombre(); ?></a>
                    </li>
                    <li class="list-group-item">
                    <b>Calificar: </b>
                    <div class="ec-stars-wrapper">
                            <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
                            <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
                            <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
                            <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
                            <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                    </div>
                    <noscript>Necesitas tener habilitado javascript para poder votar</noscript>
                    </li>
                  </ul>
                  <?php 
                    if($libro->getEs_editable()=='s'){
                       // echo "<td><a href="#" target="_blank"class="btn btn-primary btn-block"><b>Enviar solicitud colaboracion</b></a>";
                       echo "<a href=\"#\" target=\"_blank\" class=\"btn btn-primary btn-block\"><b>Enviar solicitud Colaboracion</b></a>";
                    }
                  ?>
                  <a href="pdf/<?php echo $idLibro; ?>.pdf" target="_blank"class="btn btn-primary btn-block"><b>Descargar libro</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i> Sinopsis </strong>
                  <p class="text-muted">
                    <?php echo $libro->getSinopsis(); ?>
                  </p>
                  <a href="#" class="btn btn-block btn-info btn-xs"><b>Recomendar</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <div class='form-group margin-bottom-none'>
                  <?php 
                    if(!$_SESSION['userid']==''){
                       // echo "<td><a href="#" target="_blank"class="btn btn-primary btn-block"><b>Enviar solicitud colaboracion</b></a>";
                       echo "<button  href=\"#\" class=\"btn btn-block btn-danger btn-sm\">Denunciar</button>";
                    }
                  ?>
              </div>
            </div><!-- /.col -->
            <!--Fin Perfil general con imagen -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Libreria</a></li>
                  <li><a href="#timeline" data-toggle="tab">Audios relacionados</a></li>
                  <?php 
                    if($libro->getEs_editable()=='s'){
                       // echo "<td><a href="#" target="_blank"class="btn btn-primary btn-block"><b>Enviar solicitud colaboracion</b></a>";
                       echo "<li>"."<a href=\"#colaboracion\" data-toggle=\"tab\">Solicitudes de colaboracion</a>"."</li>";
                    }
                  ?>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div>
                        <h3>Comentarios</h3>
                    </div>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="http://localhost/proylectura/dist/img/user1-128x128.jpg" alt="user image">
                        
                      </div><!-- /.user-block -->
                      <p>
                        Por generaciones existe un debate sobre el origen del termino "naraja" ¿fue primero un color o una fruta?.
                        Eso no fue resuelto hoy dia.
                        Expertos en su intencion de acercarse a la respuesta decidieron llevalo a un esquema mas practico.
                        Estamos hablando de la ciencia prescisa de "como comer una naranja"
                      </p>
                      <ul class="list-inline">
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Compartir</a></li>
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Dejar punto</a></li>
                        <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comentarios (5)</a></li>
                      </ul>

                      <input class="form-control input-sm" type="text" placeholder="Escriba un comentario">
                    </div><!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class='user-block'>
                        <img class='img-circle img-bordered-sm' src='http://localhost/proylectura/dist/img/user7-128x128.jpg' alt='user image'>
                        <span class='username'>
                          <a href="#">Tecnicas de programacion para el sabado a la noche</a>
                          <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                        </span>
                        <span class='description'>Publicado - 8:37 PM Jueves</span>
                      </div><!-- /.user-block -->
                      <p>
                        Como si fuera poco, la programacion se extiende los sabados a la noche.
                        Ahora uno puede disfrutar del codigo antes de ir a bailar.
                        Disfruten!!
                      </p>

                      <form class='form-horizontal'>
                        <div class='form-group margin-bottom-none'>
                          <div class='col-sm-9'>
                            <input class="form-control input-sm" placeholder="Response">
                          </div>                          
                          <div class='col-sm-3'>
                            <button class='btn btn-danger pull-right btn-block btn-sm'>Send</button>
                          </div>                          
                        </div>                        
                      </form>
                    </div><!-- /.post -->
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                            <table>
                            <thead>
                                <tr>
                                    <th>Audio</th>
                                    <th><a href="#" onclick="playlistxml('','<?php echo $idLibro; ?>')"><span class="fa fa-fw fa-forward">ALL</span></a></th>
                                </tr>
                            </thead>
                                <?php
                                    foreach ($audiolibros as $reg) {
                                        //$listaLibros .= "<li>".$reg->getNombre()."</li>";
                                        echo "<tr>"
                                        . "<td id = \"nombreaudio_".$reg->getId()."\">".$reg->getNombre()."</td>"
                                        . "<td><a href = \"#\" onclick=\"playlistxml('".$reg->getId()."','')\"><span class=\"glyphicon glyphicon-play-circle\"></span></a>&nbsp;&nbsp;&nbsp;"
                                        . "</tr>";
                                    }
                                ?>
                            </table>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="colaboracion">
                            
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

