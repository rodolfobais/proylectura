<?php /* Smarty version Smarty-3.1.19, created on 2015-11-11 19:07:52
         compiled from "/var/www/proylectura/data/smarty/templates/maestro.php" */ ?>
<?php /*%%SmartyHeaderCode:11346795385643bc381dc8f9-65558289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b73060a2f54cc2117193af1e873463a8bac2ae46' => 
    array (
      0 => '/var/www/proylectura/data/smarty/templates/maestro.php',
      1 => 1447277983,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11346795385643bc381dc8f9-65558289',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'titulo_pagina' => 0,
    'PROJECT_REL_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5643bc38272941_97231556',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5643bc38272941_97231556')) {function content_5643bc38272941_97231556($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['titulo_pagina']->value;?>
</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/js/jquery-1.4.2.min.js"></script>
        <!--  <script src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/js/ajax.js"></script>
        
        <link href="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/css/base.css" type="text/css"  rel="stylesheet"/>
        <link href="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/css/cuerpo.css" type="text/css"  rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/js/jquery-1.9.0.min.js"></script>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/css/font-awesome.min.css">
        
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/dist/css/skins/_all-skins.min.css">
        <link href="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/css/crearlista.css" type="text/css"  rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php echo $_smarty_tpl->getSubTemplate ("plantillaHeader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate ("plantillaMenuLateral.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

            <div class="content-wrapper" id="cuerpocentro">
                
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate ("menuDerecha.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>
   
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/dist/js/app.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/plugins/chartjs/Chart.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes)
        <script src="dist/js/pages/dashboard2.js"></script> -->
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['PROJECT_REL_DIR']->value;?>
/dist/js/demo.js"></script>
        <script type="text/javascript">
            $( document ).ready(function() {
                refreshDivs('cuerpocentro','data/smarty/templates/home.php');
            });
            
        </script>
    </body>
</html>	
<?php }} ?>
