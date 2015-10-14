<?php
include_once("../data/config.php");
$usuario = "";
$clave = "";
if(isset($_POST["usuario"]))
{
	$usuario = $_POST["usuario"];
}

if(isset($_POST["clave"]))
{
	$clave = $_POST["clave"];
}

if($clave != "Cirer 123" && $usuario != "osvaldo" )
{
	header("Location:../login.php?e=0");
}
else
{
	$arrayLogin = array(
	"usuario"=>$usuario
	,"id"=>1
	);
	$_SESSION["login"] = $arrayLogin;
	header("Location:../index.php");
}
?>