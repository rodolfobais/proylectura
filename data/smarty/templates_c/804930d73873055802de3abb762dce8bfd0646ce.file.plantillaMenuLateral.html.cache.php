<?php /* Smarty version Smarty-3.1.19, created on 2015-11-16 10:15:26
         compiled from ".\\data\smarty\templates\plantillaMenuLateral.html" */ ?>
<?php /*%%SmartyHeaderCode:1968356499eae87a8c2-47023278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '804930d73873055802de3abb762dce8bfd0646ce' => 
    array (
      0 => '.\\\\data\\smarty\\templates\\plantillaMenuLateral.html',
      1 => 1447635210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1968356499eae87a8c2-47023278',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56499eae8863f7_42251595',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56499eae8863f7_42251595')) {function content_56499eae8863f7_42251595($_smarty_tpl) {?>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</p>
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
                <embed src="reproductor/dewplayer-playlist.swf" height="200" width="240" wmode="transparent" flashvars="xml=listas/<<?php ?>?php echo $ultimaCreada; ?<?php ?>>.xml&autoplay=0&autoreplay=1&randomplay=0&volume=100"></embed>
            </div>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
<div class="control-sidebar-bg"></div><?php }} ?>
