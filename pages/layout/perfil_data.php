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
    case "e"://Edit
        $idUsuario = $usuarioObj->getId();
        // obtenemos los datos del archivo
        $tamano = $_FILES["jpg"]['size'];
        $tipo = $_FILES["jpg"]['type'];
        $archivo = $_FILES["jpg"]['name'];
        //$prefijo = substr(md5(uniqid(rand())),0,6);
	echo $_FILES['jpg']['tmp_name'];       
       //VER!!!
        if ($archivo != "") {
            //$nom=date('Y-m-d H:i:s');
            //$hasharchivo = hash('md5',$nom); 
           // $audiolibroObj->setHash($datosaudio->hasharchivo);
            //echo $hasharchivo;   
            // guardamos el archivo a la carpeta files
            $destino =  "../../foto/".$idUsuario.'.jpg';
          if (copy($_FILES['jpg']['tmp_name'],$destino)) {
                $status = "Archivo subido: ".$archivo."";
				//header('Location: subirmp3.php?upload=1');
            } else {
                $status = "Error al subir el archivo";
            }
        } else {
            $status = "Error al subir archivo";
        }
        echo  $status;
    break;
}

?>
