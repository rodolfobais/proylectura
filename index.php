<?php 
//error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("data/config.php");
//if(!isset($_SESSION["login"])){
 //   header("Location:login.php");
 //   die();
//}

require 'data/smarty/libs/Smarty.class.php';

$smarty = new Smarty;

$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$plantillaPrin = "maestro.html";

$subPlantilla = "asistencias.html";
$smarty->assign("titulo_pagina", "..::Proyecto lectura::.."); //Título debajo del gráfico
$smarty->assign("titulo", "Asistencia"); //Título en la barra del explorador
$smarty->assign("menu", "asistencias"); //indentificador de menú

if(isset($_GET["accion"])){
    //formularios para edición y nuevo
    if($_GET["accion"] == "e"){
        $plantillaPrin = "maestro.html";
        $subPlantilla = "asistencias.html";       

        $id = $_GET["id"];
        $objTurno = TurnosQuery::create()->findOneById($id);

        $asistencia = $_GET["as"];
            
        $metodo = $_POST["metodo"];

        $objTurno->setAsistencia($asistencia);
            
        $objTurno->save();
        $nombreSubpagina = "Edición de Asistencias";
        $smarty->assign("nombreSubpagina", $nombreSubpagina);
            
        $smarty->assign("metodo", $metodo);
        $objTurno = null;
        //echo "<pre>";print_r($_GET); echo "</pre>";        
        //cargarValores($smarty);
        header("location:asistencias.php");
    }
}else{ 
    cargarValores($smarty);
}
function cargarValores($smarty){
    return;
    //$objTurnos = TurnosQuery::create()->find();
    $objTurnos = TurnosQuery::create()->findByAsistencia("");
    $terapias = cargarValoresTerapias("", true);
    $consultorios = cargarValoresConsultorios("", true);
    $profesionales = cargarValoresProfesionales("", true);
    //echo "<pre>";    print_r($objTurnos); echo "</pre>";
    foreach ($objTurnos as $pf){
        //echo "Fecha: ".$pf->getFecha("d/m/y")."<br/>";
        //$fechaArr = explode("/", $pf->getFecha());
        //$fecha = $fechaArr[1]."/".$fechaArr[0]."/".$fechaArr[2];
        $turnos[] = array(
            'id'=>$pf->getId(),
            'terapia'=>$terapias[$pf->getIdTerapia()],
            'consultorio'=>$consultorios[$pf->getIdConsultorio()],
            'profesional'=>$profesionales[$pf->getIdProfesional()],
            'fecha'=>$pf->getFecha("d/m/y"),
            'hora'=>$pf->getHora(),
            'asistencia'=>$pf->getAsistencia()                
        );		
    }
    $smarty->assign("turnos", $turnos); //array de datos	
}
function cargarValoresTerapias($smarty,$ret = false){
    $objTerapias = TerapiasQuery::create()->find();
    $terapias[""] = "";
    foreach ($objTerapias as $pf){ $terapias[$pf->getId()] = $pf->getNombre(); }
    
    if(!$ret){ $smarty->assign("terapias", $terapias);}
    else{ return $terapias;}
}
function cargarValoresConsultorios($smarty,$ret = false){
    $objConsultorios = ConsultoriosQuery::create()->find();
    $consultorios[""] = "";
    foreach ($objConsultorios as $pf){ $consultorios[$pf->getId()] = $pf->getDescripcion(); }
    
    if(!$ret){ $smarty->assign("consultorios", $consultorios);}
    else {return $consultorios;}
}
function cargarValoresProfesionales($smarty,$ret = false){
    $objProfesionales = ProfesionalesQuery::create()->find();
    $profesionales[""] = "";
    foreach ($objProfesionales as $pf){ $profesionales[$pf->getId()] = $pf->getNombre(); }
    
    if(!$ret){ $smarty->assign("profesionales", $profesionales);}
    else {return $profesionales;}
}



$smarty->assign("subPlantilla", $subPlantilla); 
$smarty->display($rutaPlantillas.$plantillaPrin);
?>