<?php
//die;
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");


$datos = json_decode($_POST['json']);
switch ($datos->acc) {
    case "filtrar":
        $versiones = Libro_versionQuery::create()->filterByIdlibro($datos->idlibro)->orderByIdlibro()->orderById()->find();
        $html = "";
        foreach ($versiones as $reg) {
            //$listaLibros .= "<li>".$reg->getNombre()."</li>"; libro_Idlibro_Id
            $html .= "<tr>"
                . "<td><input type = 'checkbox' value = '".$reg->getIdlibro()."_".$reg->getId()."' /></td>"
                . "<td>".$reg->getId()."</td>"
                . "<td>".$reg->getFecha()."</td>"
                . "<td>".$reg->getHora()."</td>"
                . "<td>".$reg->getUsuario()->getNombre()."</td>"
               . "</tr>";
        }
        echo json_encode(array( 'error' => 0, 'html' => $html));
    break;
    case "comparar":
        $resultado = shell_exec("cd /var/www/proylectura/libros_version;diff -y  -T --suppress-common-lines -a --strip-trailing-cr libro_23_3.txt libro_23_5.txt;");
        echo json_encode(array( 'error' => 0, 'resultado' => $resultado));
        echo "<pre>";print_r(json_decode($_POST['json']));  echo "</pre>";die;
    break;
}
?>