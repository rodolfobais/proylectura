<?php /* Smarty version Smarty-3.1.19, created on 2015-10-12 13:54:17
         compiled from "/var/www/contraluz-cirer/data/smarty/templates/login.html" */ ?>
<?php /*%%SmartyHeaderCode:224547900561be5b9d9f062-93279941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e69a56405a188d2f3da346d4147504cdf547de93' => 
    array (
      0 => '/var/www/contraluz-cirer/data/smarty/templates/login.html',
      1 => 1443226371,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '224547900561be5b9d9f062-93279941',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorlogin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_561be5ba3c4c98_61387011',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561be5ba3c4c98_61387011')) {function content_561be5ba3c4c98_61387011($_smarty_tpl) {?><!DOCTYPE html>
<html>	
    <head>
        <title>..::C.I.R.E.R.::..</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="css/loginstyle.css" rel='stylesheet' type='text/css' />
        <!--webfonts-->
        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic|Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
        <!--//webfonts-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </head>
    <body>
        
            <script>
                $(document).ready(function(c){
                    /*
                            $('.close').on('click', function(c){
                            $('.login-form').fadeOut('slow', function(c){
                                    $('.login-form').remove();
                            });

                    });
                    */
                    var insideIframe = window.top !== window.self;

                    if(insideIframe){
                            window.top.location.href = "/index.php";
                            parent.jQuery.colorbox.close();
                    }
                });
            </script>
        
    <!--SIGN UP-->
        <?php if ($_smarty_tpl->tpl_vars['errorlogin']->value!='') {?>
            <h1><?php echo $_smarty_tpl->tpl_vars['errorlogin']->value;?>
</h1>
        <?php }?>
        <div class="login-form">
            
            <div class="clear"> </div>
            <div class="avtar">
                <img src="images/logo-cirer-transparente.png" />
            </div>
            <form id="login" name="login" target="_self" action="data/veriflogin.php" method="post">	
                <input type="text" name="usuario" id="usuario" class="text" value="" placeholder ="Usuario" />
                <div class="key">
                    <input id="clave" name="clave" type="password" value="" placeholder ="Password" />
                </div>
            </form>
            <div class="signin">
                <input type="submit" value="Login" onclick="javascript:document.getElementById('login').submit();" >
            </div>
        </div>
    </body>
</html><?php }} ?>
