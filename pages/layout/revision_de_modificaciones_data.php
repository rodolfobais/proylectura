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
        $resultado = shell_exec("cd ".SITE_PATH."/libros_version;diff -y -t --suppress-common-lines libro_".$datos->versiones[0].".txt libro_".$datos->versiones[1].".txt;");
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
            $v1 = $arrTmp[1]; $l1 = $arrTmp[0]; 
            $arrTmp = explode("_", $datos->versiones[1]);
            $v2 = $arrTmp[1]; $l2 = $arrTmp[0];
            $resultadoTit = "<span style='float: left;'  ><b>&nbsp;&nbsp;Version ".$v1."</b> <button class='btn btn-block btn-success btn-xs' style='width: 100px; float: left;' onclick = \"aprobarversion('".$l1."','".$v1."');\">Aprobar version</button></span>"
                          . "<span  style='float: right;'><b>Version ".$v2."&nbsp;&nbsp;</b> <button class='btn btn-block btn-success btn-xs'  style='width: 100px;float: right;'  onclick = \"aprobarversion('".$l2."','".$v2."');\">Aprobar version</button></span><br/><br/>";
            $resultado = $resultadoTit."<div><pre>".$resultado."</pre></div>";
        }else{
            $resultado = "Las versiones son iguales";
        }
        
        echo json_encode(array( 'error' => 0, 'resultado' => $resultado));
    break;
    case "aprobarversion":
        //$resultado = shell_exec("cd ".SITE_PATH."/libros_version;diff -y -t --suppress-common-lines libro_".$datos->versiones[0].".txt libro_".$datos->versiones[1].".txt;");        
        $versionNueva = SITE_PATH."/libros_version/libro_".$datos->libro."_".$datos->version.".txt";
        $libroOriginal = SITE_PATH."/libros/libro_".$datos->libro.".txt";
        if(file_exists($versionNueva)){
            $textoVersion = file_get_contents($versionNueva);
            $textoVersion = base64_encode($textoVersion);
            if(file_exists($libroOriginal)){
                if(file_put_contents($libroOriginal, $textoVersion)){
                    $msg = "Version aprobada correctamente.";
                }else{
                    $msg = "Ocurrio un error al actualizar el teto original.";
                }                
            }
        }else{
            
        }
        echo json_encode(array( 'error' => 0, 'msg' => $msg));
    break;
}
?>