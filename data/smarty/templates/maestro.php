<!DOCTYPE html>
<html>
    <head>
        <title>{$titulo_pagina}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <script type="text/javascript" src="{$PROJECT_REL_DIR}/js/jquery-1.4.2.min.js"></script>
        <!--  <script src="{$PROJECT_REL_DIR}/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
        <script type="text/javascript" src="{$PROJECT_REL_DIR}/js/ajax.js"></script>
        
        <link href="{$PROJECT_REL_DIR}/css/base.css" type="text/css"  rel="stylesheet"/>
        <link href="{$PROJECT_REL_DIR}/css/cuerpo.css" type="text/css"  rel="stylesheet"/>
        <script type="text/javascript" src="{$PROJECT_REL_DIR}/js/jquery-1.9.0.min.js"></script>
        <link rel="stylesheet" href="{$PROJECT_REL_DIR}/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{$PROJECT_REL_DIR}/css/font-awesome.min.css">
        
        <!-- Ionicons -->
        <link rel="stylesheet" href="{$PROJECT_REL_DIR}/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{$PROJECT_REL_DIR}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{$PROJECT_REL_DIR}/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{$PROJECT_REL_DIR}/dist/css/skins/_all-skins.min.css">
        <link href="{$PROJECT_REL_DIR}/css/crearlista.css" type="text/css"  rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            {include file="plantillaHeader.html"}
            {include file="plantillaMenuLateral.html"}
            <div class="content-wrapper" id="cuerpocentro">
                
            </div>
            {include file="footer.html"}
            {include file="menuDerecha.html"}   
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="{$PROJECT_REL_DIR}/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="{$PROJECT_REL_DIR}/bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="{$PROJECT_REL_DIR}/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{$PROJECT_REL_DIR}/dist/js/app.min.js"></script>
        <!-- Sparkline -->
        <script src="{$PROJECT_REL_DIR}/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="{$PROJECT_REL_DIR}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="{$PROJECT_REL_DIR}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="{$PROJECT_REL_DIR}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="{$PROJECT_REL_DIR}/plugins/chartjs/Chart.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes)
        <script src="dist/js/pages/dashboard2.js"></script> -->
        <!-- AdminLTE for demo purposes -->
        <script src="{$PROJECT_REL_DIR}/dist/js/demo.js"></script>
        <script type="text/javascript">
            $( document ).ready(function() {
                refreshDivs('cuerpocentro','data/smarty/templates/home.php');
            });
            
        </script>
    </body>
</html>	
