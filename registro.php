<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 0);
include_once("data/config.php");
$errMsg = "";$registroCorrecto = false;

$psw1Val = ""; $psw2Val = ""; $nombreVal = ""; $mailVal = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $psw1Val = $_POST['psw1']; $psw2Val = $_POST['psw2']; $nombreVal = $_POST['nombre']; $mailVal = $_POST['mail'];
    
    $Usuario = UsuarioQuery::create()->filterBymail($_POST['mail'])->find()->count();
    if($Usuario == 0){
        if($_POST['psw1'] != $_POST['psw2']){
            $errMsg += "Las password deben ser iguales.
";
        }else if($_POST['nombre'] == ""){
            $errMsg += "Debe completar el campo nombre.
";
        }else if($_POST['psw1'] == ""){
            $errMsg += "Debe completar los campos password.
";
        }else if($_POST['mail'] == ""){
            $errMsg += "Debe completar el campo mail.
";
        }else{
            $usuario2 = new Usuario();
            $usuario2->setmail($_POST['mail']);
            $usuario2->setPassword($_POST['psw1']);
            $usuario2->setAdmin(0);
            $usuario2->setNombre($_POST['nombre']);
            $usuario2->save();
            $registroCorrecto = true;
        }
    }else{
        $errMsg = "Ya existe un usuario registrado con ese mail";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyecto Lectura</title>
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
            <a href="home.php"><img style="max-width:100%;" src="<?php echo PROJECT_REL_DIR;?>/imagen/logoPL.png" title="logo" height = 50 /></a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Ingrese sus datos</p>
            <form action="" method="post" id="form_registro">
                <?php if($errMsg != ""){ ?>
                    <div style="color: red;"><?=$errMsg;?></div>
                <?php } ?>
                <?php if($registroCorrecto){ ?>
                    <div style="color: green;">Usuario registrado correctamente, por favor dirijase al <a href="login.php">Login</a></div>
                <?php } ?>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nombre completo" name = "nombre" id = "nombre" value="<?=$nombreVal;?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Correo" name = "mail" id = "mail" value="<?=$mailVal;?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Contraseña" name = "psw1" id = "psw1" value="<?=$psw1Val;?>">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Repita su contraseña" name = "psw2" id = "psw2" value="">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
            </form>
            <div class="row">
                <div class="col-xs-4">
                    <button class="btn btn-primary btn-block btn-flat" onclick="validar_frm_registro();">Registrar</button>
                </div>
            </div>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo PROJECT_REL_DIR;?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo PROJECT_REL_DIR;?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo PROJECT_REL_DIR;?>/plugins/iCheck/icheck.min.js"></script>
    <script src="<?php echo PROJECT_REL_DIR;?>/js/registro.js"></script>
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
