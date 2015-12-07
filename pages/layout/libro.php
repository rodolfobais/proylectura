<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//$libros = LibroQuery::create()->find();
//$usuarios = UsuarioQuery::create()->find();
$audiolibros = AudiolibroQuery::create()->find();
$idLibro=28;

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
echo $listaLibros;
//$listaLibros = "";
//$libros = LibroQuery::create()->find();
?>

<meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="http://localhost/proylectura/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="http://localhost/proylectura/css/perfil.css">
    <link rel="stylesheet" href="http://localhost/proylectura/dist/css/skins/_all-skins.min.css">    
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <div class="wrappers">
      <!-- Content Wrappers. Contains page content -->
      <div class="content-wrappers">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Perfil de Usuario
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive" src="http://localhost/proylectura/imagen/a33.jpg" alt="User profile picture">
                  <h3 class="profile-username text-center">Perdido en la jungla</h3>
                  <p class="text-muted text-center"></p>

                  <ul class="list-group list-group-unbordered">
                   
                      <li class="list-group-item">
                      <b>Autor</b> <a class="pull-right">Chuck Norris</a>
                    </li>
                    <li class="list-group-item">
                      <b>Año</b> <a class="pull-right">1986</a>
                    </li>
                    <li class="list-group-item">
                      <b>Genero</b> <a class="pull-right">Accion</a>
                    </li>
                  </ul>

                  <a href="#" class="btn btn-primary btn-block"><b>Descargar libro</b></a>
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
                    Novela de accion basada en la historia de un soldado norteamericano veterano de vietnam
                    que recuerda su incursion en la jungla combatiendo al viet cong.
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <!--Fin Perfil general con imagen -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Libreria</a></li>
                  <li><a href="#timeline" data-toggle="tab">Audios relacionados</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="http://localhost/proylectura/dist/img/user1-128x128.jpg" alt="user image">
                        <span class='username'>
                          <a href="#">Como comer una naranja(avanzado)</a>
                          <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                        </span>
                        <span class='description'>Publicado - 8:30 PM Jueves</span>
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
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrappers -->
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
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

