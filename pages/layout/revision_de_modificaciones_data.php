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
                . "<td>".$reg->getFecha("d/m/y")."</td>"
                . "<td>".$reg->getHora()."</td>"
                . "<td>".$reg->getUsuario()->getNombre()."</td>"
               . "</tr>";
        }
        echo json_encode(array( 'error' => 0, 'html' => $html));
    break;
    case "comparar":
        //$resultado = shell_exec("cd /var/www/proylectura/libros_version;diff -y  -T --suppress-common-lines -a --strip-trailing-cr libro_23_3.txt libro_23_5.txt;");
        $resultado = shell_exec("cd /var/www/proylectura/libros_version;diff -y -t --suppress-common-lines libro_".$datos->versiones[0].".txt libro_".$datos->versiones[1].".txt;");
        //echo $resultado;        
        $resultado = htmlentities($resultado);
        /*$pos = 0;
        $exp_regular [$pos] = '/\\n/';
        $cadena_nueva[$pos++] = '<br/>';
        $exp_regular [$pos] = '/\\t/';*/
        //$cadena_nueva[$pos++] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        //$cadena_nueva[$pos++] = '<span style="width: 500px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>';
        //$resultado = preg_replace($exp_regular, $cadena_nueva, $resultado);
        if($resultado != ""){
            $arrTmp = explode("_", $datos->versiones[0]);
            $v1 = $arrTmp[1];
            $arrTmp = explode("_", $datos->versiones[1]);
            $v2 = $arrTmp[1];
            $resultado = "<b>Version ".$v1."</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Version ".$v2."</b><br/>".$resultado;
        }
        $resultado = "<pre>".$resultado."</pre>";
        echo json_encode(array( 'error' => 0, 'resultado' => $resultado));
        //echo "<pre>";print_r(json_decode($_POST['json']));  echo "</pre>";die;
        /*<blockquote></blockquote>
         * <pre>stdClass Object
(
    [versiones] => Array
        (
            [0] => 23_3
            [1] => 23_4
        )

    [acc] => comparar
)
</pre>*/
    break;
}
?>