<?php 
//@session_star();
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("data/config.php");

if(!isset($_SESSION["userid"])){
    header("Location:home.php");
    //die();
}

require 'data/smarty/libs/Smarty.class.php';

$smarty = new Smarty;

$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$plantillaPrin = "maestro.php";

$subPlantilla = "asistencias.html";
$smarty->assign("titulo_pagina", "..::Proyecto lectura::.."); //Título debajo del gráfico
$smarty->assign("titulo", "Asistencia"); //Título en la barra del explorador
$smarty->assign("menu", "asistencias"); //indentificador de menú
$smarty->assign("PROJECT_REL_DIR", PROJECT_REL_DIR); //indentificador de menú
$smarty->assign("user_name", $_SESSION["mail"]);
/*
$objAutor = AutorQuery::create()->findOneById(1);
echo $objAutor->getNombre();die;
$objAutor->setNombre("nuevo nombre");
$objAutor->save();
die;
*/
//echo "Autor:".$objAutor->setNombre("nuevo nombre");

//die;

$smarty->assign("subPlantilla", $subPlantilla); 
$smarty->display($rutaPlantillas.$plantillaPrin);
?>