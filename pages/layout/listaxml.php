<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");
$parametros = json_decode($_POST['json']);

//$libros = LibroQuery::create()->find();
//$usuarios = UsuarioQuery::create()->find();
$audiolibros = AudiolibroQuery::create()->find();
if($parametros ->idlibro !="" ){
    //$audiolibros->filterByIdlibro($parametros->idlibro);
}

if($parametros->id !=""){
    //$audiolibros->filterById($parametros->id);    
}

//$audiolibros->find();

//$options = "<option value = ''>Seleccione un libro</option> ";
$listaaudios = "";

    $xmlconcatenado = '';
    $xmlconcatenado.='<?xml version="1.0" encoding="UTF-8"?>';
    $xmlconcatenado.='<playlist version="1" xmlns="http://xspf.org/ns/0/">';
    $xmlconcatenado.='<title></title>';
    $xmlconcatenado.='<creator></creator>';
    $xmlconcatenado.='<link></link>';
    $xmlconcatenado.='<info></info>';
    $xmlconcatenado.='<image></image>';    	
    $xmlconcatenado.='<trackList>';

foreach ($audiolibros as $reg) { 
    //$listaaudios .= "<li>".$reg->getNombre()."</li>";
     
    $xmlconcatenado.='<track>';
    $xmlconcatenado.='<location>uploads/'.$reg->getId().'.mp3</location>';
    $xmlconcatenado.='<creator></creator>';
    $xmlconcatenado.='<album></album>';
    $xmlconcatenado.='<title>'.$reg->getNombre().'</title>';
    $xmlconcatenado.='<annotation></annotation>';
    $xmlconcatenado.='<duration></duration>';
    $xmlconcatenado.='<image></image>';
    $xmlconcatenado.='<info></info>';
    $xmlconcatenado.='<link></link>';
    $xmlconcatenado.='</track>';
     
 }
    $xmlconcatenado.='</trackList>';
    $xmlconcatenado.='</playlist>';
//echo $xmlconcatenado;
//die;
    //$xmlconcatenado = "zars";
    //$nombrearchivo= SITE_PATH."/uploads/". rand(0, 9999).".xml";
    //file_put_contents($xmlconcatenado, $nombrearchivo);
    $filename = rand(0,99999).".xml";
    
    $ruta = SITE_PATH."/listas/".$filename;
    //$ruta = SITE_PATH."/listas/3.xml";
		$fp = fopen($ruta,"a+");
		fwrite($fp, $xmlconcatenado);
		fclose($fp);
    $ruta2 = "listas/".$filename;            
    
    echo json_encode(array( 'nombrearchivo' => $ruta2));



















