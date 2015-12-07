<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//echo "<pre>";print_r(($_POST));  echo "</pre>";

//echo "<pre>";print_r(($_FILES));  echo "</pre>";
//die;
//$datosaudio = json_decode($_POST['json']);
//$libros = LibroQuery::create()->find();
//$usuarios = UsuarioQuery::create()->find();

switch ($_POST["accion"]) {
    case "e"://Edit
        $audiolibroObj = AudiolibroQuery::create()->findOneBy($_POST["id"]);
        //$usuarioObj = UsuarioQuery::create()->findOneById($datos->id);
        //echo $usuarioObj->toArray();
        $audiolibroObj->setNombre($_POST["nombreaudio"]);
        //$audiolibroObj->setHash($datosaudio->hasharchivo);
        $audiolibroObj->save();
        echo json_encode(array( 'error' => 0, 'msg' => "Audiolibro modificado correctamente"));
    break;
    
    case "d"://Delete
        $audiolibroObj = AudiolibroQuery::create()->findOneBy($_POST["id"]);
        //$objTerapia = TerapiasQuery::create()->findOneById($_GET["id"]);
        if($audiolibroObj != null){
                $audiolibroObj->delete();
        }
        echo json_encode(array( 'error' => 0, 'msg' => "Audiolibro borrado correctamente"));
    break;
    case "n"://New
        $audiolibroObj = new Audiolibro();
        $audiolibroObj->setNombre($_POST["nombreaudio"]);
        $audiolibroObj->setIdlibro($_POST["vinculolibro"]);
        $audiolibroObj->save();
        $idLibro = $audiolibroObj->getId();
        // obtenemos los datos del archivo
        $tamano = $_FILES["mp3"]['size'];
        $tipo = $_FILES["mp3"]['type'];
        $archivo = $_FILES["mp3"]['name'];
        //$prefijo = substr(md5(uniqid(rand())),0,6);
	//echo $_FILES['mp3']['tmp_name'];       
       //VER!!!
        if ($archivo != "") {
            //$nom=date('Y-m-d H:i:s');
            //$hasharchivo = hash('md5',$nom); 
           // $audiolibroObj->setHash($datosaudio->hasharchivo);
            //echo $hasharchivo;   
            // guardamos el archivo a la carpeta files
            $destino =  "../../uploads/".$idLibro.'.mp3';
          if (copy($_FILES['mp3']['tmp_name'],$destino)) {
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