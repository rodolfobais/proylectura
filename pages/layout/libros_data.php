<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

//echo "<pre>";print_r(json_decode($_POST['json']));  echo "</pre>";
//$datos = json_decode($_POST['json']);
//$libros = LibroQuery::create()->find();
//$usuarios = UsuarioQuery::create()->find();

switch ($_POST["accion"]) {
    case "e"://Edit
        $libroObj = LibroQuery::create()->findOneById($_POST["id"]);
        $libroObj->setNombre($_POST["nombrelibro"]);
        $libroObj->setId_genero($_POST["vinculogenero"]);
        $libroObj->setFecha(date('Y-m-d'));
        $libroObj->setAutor($_POST["autor"]);
        //$libroObj->setEs_editable("n");
        $libroObj->setSinopsis($_POST["sinopsis"]);
        $libroObj->setId_privacidad($_POST["privacidad"]);
        $libroObj->save();
         
        $status = "Libro actualizado correctamente";
        echo  $status;
    break;
    
    case "d"://Delete
        $libroObj = LibroQuery::create()->findOneById($_POST["id"]);
        $libroObj->setDebaja("s");
        $libroObj->save();
        echo "Libro borrado correctamente";
    break;
    case "n"://New
        $libroObj = new Libro();
        //$libroObj->setNombre($datos->nombre);
        $libroObj->setNombre($_POST["nombrelibro"]);
        $libroObj->setId_genero($_POST["vinculogenero"]);
        $libroObj->setFecha(date('Y-m-d'));
        $libroObj->setAutor($_POST["autor"]);
        $libroObj->setEs_editable("n");
        $libroObj->setSinopsis($_POST["sinopsis"]);
        $libroObj->setId_privacidad($_POST["privacidad"]);
        $libroObj->save();
        
        $idImage = $libroObj->getId();
        // obtenemos los datos del archivo
        $tamano = $_FILES["image"]['size'];
        $tipo = $_FILES["image"]['type'];
        $archivo = $_FILES["image"]['name'];
        //$prefijo = substr(md5(uniqid(rand())),0,6);
	//echo $_FILES['image']['tmp_name'];       
       //VER!!!
        if ($archivo != "") {
            //$nom=date('Y-m-d H:i:s');
            //$hasharchivo = hash('md5',$nom); 
           // $audiolibroObj->setHash($datosaudio->hasharchivo);
            //echo $hasharchivo;   
            // guardamos el archivo a la carpeta files
            $destino =  "../../portadas/".$idImage.'.jpg';
          if (copy($_FILES['image']['tmp_name'],$destino)) {
                $status = "Archivo subido: ".$archivo."";
                $libroObj->setImage($idImage);
                $libroObj->save();
				//header('Location: subirmp3.php?upload=1');
            } else {
                $status = "Error al subir la portada";
            }
        } else {
            $status = "Error al subir la portada";
        }
        echo  $status;
        
        $idPdf = $libroObj->getId();
        // obtenemos los datos del archivo
        $tamano = $_FILES["pdf"]['size'];
        $tipo = $_FILES["pdf"]['type'];
        $archivo = $_FILES["pdf"]['name'];
        //$prefijo = substr(md5(uniqid(rand())),0,6);
	//echo $_FILES['image']['tmp_name'];       
       //VER!!!
        if ($archivo != "") {
            //$nom=date('Y-m-d H:i:s');
            //$hasharchivo = hash('md5',$nom); 
           // $audiolibroObj->setHash($datosaudio->hasharchivo);
            //echo $hasharchivo;   
            // guardamos el archivo a la carpeta files
            $destino =  "../../pdf/".$idPdf.'.pdf';
          if (copy($_FILES['pdf']['tmp_name'],$destino)) {
                $status = "Archivo subido: ".$archivo."";
				//header('Location: subirmp3.php?upload=1');
            } else {
                $status = "Error al subir el PDF";
            }
        } else {
            $status = "Error al subir el PDF";
        }
        echo  $status;   
    break;
    case "obtener_datos":
        $libro = LibroQuery::create()->findOneById($_POST["id"]);      
        
        //echo $clasificadosObj->toArray();
        echo json_encode(array( 
            'nombre' => $libro->getNombre(), 
            'genero' => $libro->getId_genero(),
            'autor' => $libro->getAutor(),
            'sinopsis' => $libro->getSinopsis(),
            'privacidad' => $libro->getId_privacidad()
        ));
    break;

}

?>