<?php

//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");
include ("Audiolibro.php");
//echo "<pre>";print_r(json_decode($_POST['json']));  echo "</pre>";
//$datosaudiolista = json_decode($_POST['json']);
//$libros = LibroQuery::create()->find();
//$usuarios = UsuarioQuery::create()->find();

switch($_GET['op']){
    case 'bu':
        
                $Audiolibro = new Audiolibro();
		echo($Audiolibro->traerAudiolibros($_POST['busqueda']));
                /*function traerAudiolibros($busqueda){
                    $Audiolibro = new Audiolibro();
                    $Audiolibro->setNombre($_POST["nombreaudio"]);
                    echo($Audiolibro->traerAudiolibros($_POST['busqueda']));
                }*/
                
                /*class audiolibro {
                function traerAudiolibros($busqueda){
                    /*$Audiolibro = AudiolibroQuery::create()->findOneBy($busqueda->id);
                    $Audiolibro = AudiolibroQuery::create()->findOneBy($_GET->id);
                    $audiolibro->getNombre($datosaudio->nombreaudio);*/
                    //$audiolibro = AudiolibroQuery::create()->find();
                    //echo '<div style="float:left;clear:both;width:400px;"><span style="float:left;margin-left:12px;cursor:pointer;" onclick="sumarAudiolibro('.$row['id'].');">'.$row['nombre'].'</span></div>';
                    //}
                //}
                //$Audiolibro = AudiolibroQuery::create()->filterById($datosaudiolista->nombreaudio)->find();
                
                //echo json_encode(array( 'error' => 0, 'msg' => "Audiolibro creado correctamente"));
                
                
	break;
	
	case 'agaudiolibro':
		$Audiolibro = new Audiolibro();
		echo($Audiolibro->sumarAudiolibro($_POST['audiolibros'],$_POST['ultimoagregado']));
	break;
	
	case 'aglista':
		$Audiolibro = new Audiolibro();
		echo($Audiolibro->crearLista($_POST['audiolibros'],$_POST['iduser'],$_POST['nombrelista'],$_POST['generolista'],$_POST['privacidadlista'],$_POST['compartircon']));
	break;
	
	case 'reproduccion':
		$Audiolibro = new Audiolibro();
		echo($Audiolibro->agregarReproduccion($_POST['idlista'],$_POST['iduser']));
	break;
	
	
}
?>