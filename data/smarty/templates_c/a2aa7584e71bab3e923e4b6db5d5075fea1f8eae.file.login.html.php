<?php /* Smarty version Smarty-3.1.19, created on 2015-09-13 00:21:16
         compiled from "/var/www/contraluz/cirer/data/smarty/templates/login.html" */ ?>
<?php /*%%SmartyHeaderCode:135168350455f4ebac3847b6-46301476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2aa7584e71bab3e923e4b6db5d5075fea1f8eae' => 
    array (
      0 => '/var/www/contraluz/cirer/data/smarty/templates/login.html',
      1 => 1442100107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135168350455f4ebac3847b6-46301476',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorlogin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55f4ebac3a5f12_13857895',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f4ebac3a5f12_13857895')) {function content_55f4ebac3a5f12_13857895($_smarty_tpl) {?><!DOCTYPE html>
<html>	
<head>
<title>..::C.I.R.E.R.::..</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Flat Dark Web Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />
<link href="css/loginstyle.css" rel='stylesheet' type='text/css' />
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic|Oswald:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>

<script>
$(document).ready(function(c) 
		{
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
	<div class="close"> </div>
		<div class="head-info">
			<label class="lbl-1"> </label>
			<label class="lbl-2"> </label>
			<label class="lbl-3"> </label>
		</div>
			<div class="clear"> </div>
	<div class="avtar">
		<img src="images/avatar2.png" />
	</div>
	<form id="login" name="login" target="_self" action="data/veriflogin.php" method="post">
			
			<input type="text" name="usuario" id="usuario" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" />
			<div class="key">
				<input id="clave" name="clave" type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" />
			</div>
	</form>
	<div class="signin">
		<input type="submit" value="Login" onclick="javascript:document.getElementById('login').submit();" >
	</div>
</div>
 
</body>
</html>
<?php }} ?>
