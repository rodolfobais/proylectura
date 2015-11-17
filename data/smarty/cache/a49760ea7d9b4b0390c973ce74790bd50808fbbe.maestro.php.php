<?php /*%%SmartyHeaderCode:2575756499eae72ea93-64332151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a49760ea7d9b4b0390c973ce74790bd50808fbbe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proylectura\\data\\smarty\\templates\\maestro.php',
      1 => 1447631368,
      2 => 'file',
    ),
    '283fd1115bd6cd8cee26d5115d7a3de5f24114ee' => 
    array (
      0 => '.\\\\data\\smarty\\templates\\plantillaHeader.html',
      1 => 1447463111,
      2 => 'file',
    ),
    '804930d73873055802de3abb762dce8bfd0646ce' => 
    array (
      0 => '.\\\\data\\smarty\\templates\\plantillaMenuLateral.html',
      1 => 1447635210,
      2 => 'file',
    ),
    '3144f9c262b25caa89a776a00a1c6245d22ee3fb' => 
    array (
      0 => '.\\\\data\\smarty\\templates\\footer.html',
      1 => 1446766910,
      2 => 'file',
    ),
    '6038acba3dd5995eb4ee3a13c4fb08cad473bc63' => 
    array (
      0 => '.\\\\data\\smarty\\templates\\menuDerecha.html',
      1 => 1445558842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2575756499eae72ea93-64332151',
  'variables' => 
  array (
    'titulo_pagina' => 0,
    'PROJECT_REL_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56499eae93e670_62028495',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56499eae93e670_62028495')) {function content_56499eae93e670_62028495($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>..::Proyecto lectura::..</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <script type="text/javascript" src="/proylectura/js/jquery-1.4.2.min.js"></script>
        <!--  <script src="/proylectura/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
        <script type="text/javascript" src="/proylectura/js/ajax.js"></script>
        
        <link href="/proylectura/css/base.css" type="text/css"  rel="stylesheet"/>
        <link href="/proylectura/css/cuerpo.css" type="text/css"  rel="stylesheet"/>
        <script type="text/javascript" src="/proylectura/js/jquery-1.9.0.min.js"></script>
        <link rel="stylesheet" href="/proylectura/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/proylectura/css/font-awesome.min.css">
        
        <!-- Ionicons -->
        <link rel="stylesheet" href="/proylectura/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="/proylectura/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/proylectura/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="/proylectura/dist/css/skins/_all-skins.min.css">
        <link href="/proylectura/css/crearlista.css" type="text/css"  rel="stylesheet"/>
        
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">

        <!-- Logo -->
        <a onclick="refreshDivs('cuerpocentro','data/smarty/templates/home.php')" class="logo">
            
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src = "imagen/logoPLMini.png" width = 100<?php echo '%>'; ?>
</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src = "imagen/logoPL.png" width = 100<?php echo '%>'; ?>
</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">admin@admin.com</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      
      </header>
            <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>admin@admin.com</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">PRINCIPAL</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Biblioteca</span>
                <!--<span class="label label-primary pull-right">4</span>-->
              </a>
                <ul class="treeview-menu">
                    <li><a onclick="refreshDivs('cuerpocentro','pages/layout/pdf.php')"><i class="fa fa-circle-o"></i> Subir PDF</a></li>
                    <li><a onclick="refreshDivs('cuerpocentro','pages/layout/biblioteca.php')"><i class="fa fa-circle-o"></i> Listado</a></li>
                </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Centro de Redaccion</span>
                
              </a>
                <ul class="treeview-menu">
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Redactor</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Mis proyectos</a></li>
                </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Clasificados</span>
                
              </a>
                <ul class="treeview-menu">
                    <li><a onclick="refreshDivs('cuerpocentro','pages/layout/clasificados.php')"><i class="fa fa-circle-o"></i> Clasificados</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Listado</a></li>
                </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-music"></i>
                <span>Audiolibros</span>
                
              </a>
                <ul class="treeview-menu">
                    <li><a onclick="refreshDivs('cuerpocentro','pages/layout/mp3.php')"><i class="fa fa-circle-o"></i> Subir Audiolibro</a></li>
                    <li><a onclick="refreshDivs('cuerpocentro','pages/layout/audiolista.php')"><i class="fa fa-circle-o"></i> Crear Lista de Audiolibros</a></li>
                </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Social</span>
                
              </a>
              <ul class="treeview-menu">
                <li><a onclick="refreshDivs('cuerpocentro','pages/layout/buscaamigos.php')"><i class="fa fa-circle-o"></i> Buscar amigos</a></li>
                <li><a onclick="refreshDivs('cuerpocentro','pages/layout/amigos.php')"><i class="fa fa-circle-o"></i> Lectores Amigos</a></li>
                <li><a onclick="refreshDivs('cuerpocentro','pages/layout/perfil.php')"><i class="fa fa-circle-o"></i> perfil </a></li>
                <li><a onclick="refreshDivs('cuerpocentro','pages/layout/perfilvisita.php')"><i class="fa fa-circle-o"></i> perfil Visita</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Administrador</span>
                
              </a>
                <ul class="treeview-menu">
                    <li><a onclick="refreshDivs('cuerpocentro','pages/layout/usuarios.php')"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                    <li><a onclick="refreshDivs('cuerpocentro','pages/layout/libros.php')"><i class="fa fa-circle-o"></i> Libros</a></li>
                    <li><a onclick="refreshDivs('cuerpocentro','pages/layout/generos.php')"><i class="fa fa-circle-o"></i> Generos</a></li>
                </ul>
            </li>  
            <div class="reproductor" id="contenedorReproductor">
                <embed src="reproductor/dewplayer-playlist.swf" height="200" width="240" wmode="transparent" flashvars="xml=listas/<?php echo '<?php'; ?>
 echo $ultimaCreada; <?php echo '?>'; ?>
.xml&autoplay=0&autoreplay=1&randomplay=0&volume=100"></embed>
            </div>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
<div class="control-sidebar-bg"></div>
            <div class="content-wrapper" id="cuerpocentro">
                
            </div>
            <footer class="main-footer">
              <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.0
              </div>
              <strong>Copyright &copy; 2014-2015 <a href="">La pandilla</a>.</strong> All rights reserved.
            </footer>
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
      </aside>   
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="/proylectura/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="/proylectura/bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="/proylectura/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/proylectura/dist/js/app.min.js"></script>
        <!-- Sparkline -->
        <script src="/proylectura/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="/proylectura/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/proylectura/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="/proylectura/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="/proylectura/plugins/chartjs/Chart.min.js"></script>
        <script type="text/javascript" src="/proylectura/js/jquery.json.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes)
        <script src="dist/js/pages/dashboard2.js"></script> -->
        <!-- AdminLTE for demo purposes -->
        <script src="/proylectura/dist/js/demo.js"></script>
        <script src="/proylectura/js/usuarios.js"></script>
        <script type="text/javascript">
            $( document ).ready(function() {
                refreshDivs('cuerpocentro','data/smarty/templates/home.php');
            });
            
        </script>
    </body>
</html>	
<?php }} ?>
