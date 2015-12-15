<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//echo "<pre>";print_r(json_decode($_POST['json']));  echo "</pre>";
$datos = json_decode($_POST['json']);
//$libros = LibroQuery::create()->find();
//$usuarios = UsuarioQuery::create()->find();

switch ($datos->accion) {
    case "votar":
        $calificacion = new Calificacion();
        $calificacion->setPuntuacion($datos->puntos);
        $calificacion->setId_libro($datos->libro);
        $calificacion->setId_usuario($_SESSION['userid']);

        $calificacion->save();
        //obtengo la puntuación del libro
        $puntaje = 0;
        $calificacionLibro = CalificacionQuery::create()->filterById_libro($datos->libro)->find();
        foreach ($calificacionLibro as $reg) { 
             $puntaje += $reg->getPuntuacion();
        }
        $promedioPuntaje = round($puntaje / $calificacionLibro->count(), 1);
        
        $html = "<b>Puntaje actual: ".$promedioPuntaje." <a href='#' title='Puntaje actual ".$promedioPuntaje."'>&#9733;</a></b>";
        echo json_encode(array('html' => $html));
    break;
}

?>