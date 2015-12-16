<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 0);
include_once("data/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Usuario = UsuarioQuery::create()->filterBymail($_POST['mail'])->filterByPassword($_POST['psw'])->count();
    if($Usuario == 0){
        $errLogin = true;
    }else{
        $Usuario2 = UsuarioQuery::create()->findOneBymail($_POST['mail']);
        $_SESSION['userid'] = $Usuario2->getId();
        $_SESSION['mail'] = $_POST['mail'];
        
        header('location: index.php');
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyecto Lectura</title>
    <link rel="icon"  href="<?php echo PROJECT_REL_DIR;?>/images/favicon.ico" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo PROJECT_REL_DIR;?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo PROJECT_REL_DIR;?>/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo PROJECT_REL_DIR;?>/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo PROJECT_REL_DIR;?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo PROJECT_REL_DIR;?>/plugins/iCheck/square/blue.css">
    <script src="<?php echo PROJECT_REL_DIR;?>/js/jquery.min.js"></script>
    <link href="<?php echo PROJECT_REL_DIR;?>/css/styleheader.css" rel="stylesheet" type="text/css"  media="all" />
    <link href='<?php echo PROJECT_REL_DIR;?>/css/font-Ropa+Sans.css' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <img style="max-width:100%;" src="<?php echo PROJECT_REL_DIR;?>/imagen/logoPL.png" title="logo" height = 50 />
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Ingrese sus datos para iniciar sesion</p>
        <form action="" method="post">
            <?php if($errLogin){ ?>
                <div style="color: red;">Usuario o Contraseña incorrectos.</div>
            <?php } ?>
          <div class="form-group has-feedback">
              <input type="email" class="form-control" placeholder="Correo" name = "mail">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Contraseña" name = "psw">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Recordarme
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
            </div><!-- /.col -->
          </div>
        </form>
<!--
        <div class="social-auth-links text-center">
          <p>- O -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>Iniciar usando Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>Iniciar usando Google+</a>
        </div> /.social-auth-links -->

        <a href="#">¿No recuerda su contraseña?</a><br>
        <a href="registro.php" class="text-center">Registar como Nuevo Miembro</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo PROJECT_REL_DIR;?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo PROJECT_REL_DIR;?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo PROJECT_REL_DIR;?>/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
