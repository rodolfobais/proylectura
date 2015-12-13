<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//$libros = LibroQuery::create()->findOneById($_GET['id']);
//$usuarios = UsuarioQuery::create()->find();

$idusuario=$_SESSION['userid'];
$usuario=  UsuarioQuery::create()->findOneById($idusuario);

$audiolibros = AudiolibroQuery::create()->find();
$idLibro=$_GET['id'];
$libro=  LibroQuery::create()->findOneById($idLibro);
//echo $libro->getEs_editable();

//$options = "<option value = ''>Seleccione un libro</option> ";
$listaaudios = ""; 
//$arr=array();
foreach ($audiolibros as $reg) { 
    //if(!array_key_exists($reg->getId(), $arr)){
     //$arr[$reg->getId()] = "";
     $listaaudios .= "<li>".$reg->getNombre()."</li>";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     //}
 }
//echo $listaLibros;
//$listaLibros = "";
//$libros = LibroQuery::create()->find();
?>
<table>
   <tr>
   <?php
        foreach ($libro as $reg) { 
    //if(!array_key_exists($reg->getId(), $arr)){
     //$arr[$reg->getId()] = "";
     $listaimagen .= "<li>".$reg->get()."</li>";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     //$options .= "<option value = '".$reg->getId()."'>".$reg->getNombre()."</option> ";
     //}
    }
echo $listaimagen;
    
   ?>
</table>