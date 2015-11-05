<?php /* Smarty version Smarty-3.1.19, created on 2015-11-06 00:20:33
         compiled from ".\\data\smarty\templates\plantillaMenuLateral.html" */ ?>
<?php /*%%SmartyHeaderCode:2359563be4413abd92-87533535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '804930d73873055802de3abb762dce8bfd0646ce' => 
    array (
      0 => '.\\\\data\\smarty\\templates\\plantillaMenuLateral.html',
      1 => 1446765474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2359563be4413abd92-87533535',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563be4413b5493_95886994',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563be4413b5493_95886994')) {function content_563be4413b5493_95886994($_smarty_tpl) {?><aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
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
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Subir PDF</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Listado</a></li>
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
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Nuevo Anuncio</a></li>
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
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Administrador</span>
                
              </a>
                <ul class="treeview-menu">
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Libros</a></li>
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Generos</a></li>
                </ul>
            </li>  
            <div class="reproductor" id="contenedorReproductor">
                <embed src="reproductor/dewplayer-playlist.swf" height="200" width="240" wmode="transparent" flashvars="xml=listas/<<?php ?>?php echo $ultimaCreada; ?<?php ?>>.xml&autoplay=0&autoreplay=1&randomplay=0&volume=100"></embed>
    </div>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
<div class="control-sidebar-bg"></div><?php }} ?>
