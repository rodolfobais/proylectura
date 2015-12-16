<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//echo "<pre>";print_r(json_decode($_POST['json']));  echo "</pre>";die;
$datos = json_decode($_POST['json']);

switch ($datos->acc) {
    case "guardar":
        if($datos->idlibro == ""){
            $libroObj = new Libro();
            $libroObj->setNombre($datos->nombrelibro);
            $libroObj->setEs_editable("s");
            $libroObj->save();

            file_put_contents(SITE_PATH."/libros/libro_".$libroObj->getId().".txt", $datos->texto);

            echo json_encode(array('msg' => "Libro guardado correctamente", 'idlibro' => $libroObj->getId()));
        }else{
            $libroObj = LibroQuery::create()->findOneById($datos->idlibro);
            $libroObj->setNombre($datos->nombrelibro);
            //$libroObj->setTexto($datos->texto);

            $libroObj->save();

            file_put_contents(SITE_PATH."/libros/libro_".$datos->idlibro.".txt", $datos->texto);

            echo json_encode(array('msg' => "Libro guardado correctamente", 'idlibro' => $datos->idlibro));
        }

    break;
    case "version":
        //diff -y  -T --suppress-common-lines -a --strip-trailing-cr indexold.php index.php  
        if($datos->idlibro == ""){
            $libroObj = new Libro();
            $libroObj->setNombre($datos->nombrelibro);
            $libroObj->save();            
            $idLibro = $libroObj->getId();
        }else{
            $idLibro = $datos->idlibro;
        }
        $libroVersion = new Libro_version();
        $libroVersion->setIdlibro($idLibro);
        $libroVersion->setFecha(date("Y-m-d"));
        $libroVersion->setHora(date("H:i:s"));
        $libroVersion->setIdusuario($_SESSION['userid']);
        $libroVersion->save();
        
        file_put_contents(SITE_PATH."/libros_version/libro_".$idLibro."_".$libroVersion->getId().".txt",  base64_decode($datos->texto));
        echo json_encode(array('msg' => "Libro guardado correctamente", 'idlibro' => $idLibro));
    break;
    case "marcarActividad":
        $fecha = date("Y-m-d");
        $hora = date("h:i:s");
        
        $libroObj = LibroQuery::create()->findOneById($datos->idlibro);
        $libroObj->setFecha_ult_acc($fecha);
        $libroObj->setHora_ult_acc($hora);
        $libroObj->setUsuario_ult_acc($_SESSION['userid']);
        $libroObj->save();
        
        echo json_encode(array( 'fecha' => $fecha." ".$hora));
    break;
    case "VerificarActividad":
        $fechaActual = date("Y-m-d");
        $horaActual = date("h:i:s");
        $libroObj = LibroQuery::create()->findOneById($datos->idlibro);
        $usuario = $libroObj->getUsuario()->getNombre();
        //diferencia
        $desde = $libroObj->getFecha_ult_acc()." ".$libroObj->getHora_ult_acc();
        $hasta = $fechaActual." ".$horaActual;
        $segundos=strtotime($hasta) - strtotime($desde);
        $diferencia_minutos=intval($segundos/60);
        
        echo json_encode(array( 
            'diferencia_minutos' => $diferencia_minutos, 
            'usuario_bloqueador' => $libroObj->getUsuario()->getNombre()
        ));
    break;
    case "vistaPrevia":
        $texto = file_get_contents(SITE_PATH."/libros/libro_".$datos->idlibro.".txt");
        $html = base64_decode($texto);
        echo json_encode(array( 
            'html' => $html
        ));
    break;
}


?>