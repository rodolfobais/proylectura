<?php
session_start();
//error_reporting(E_ALL);
//Configuraciones
error_reporting(E_ERROR);
ini_set('display_errors', 1);ini_set("memory_limit","32M");
require_once('pdfgen/pdfDocs.class.php');
require_once("pdfgen/dompdf/dompdf_config.inc.php");
include_once("../../data/config.php");
spl_autoload_register('DOMPDF_autoload');

global $generar_fisico, $idlibro;

if($idlibro != ""){
    $archivoSalida = "".$idlibro.".pdf";
}else{
    $archivoSalida = "".$_GET['id'].".pdf";
    $idlibro = $_GET['id'];
}

$texto = file_get_contents(SITE_PATH."/libros/libro_".$idlibro.".txt");
$html = base64_decode($texto);

$salida = "
    </html>
        <head>
            <style type='text/css'>
                body{
                    font-size: 10;
                    font-family: helvetica;
                    letter-spacing: -0.5px;
                    line-height: 109%;
                }
            </style>
        </head>
    <body>".$html."</body>
</html>";
$dompdf = new DOMPDF();
//$dompdf->set_paper("A4","landscape");  
$dompdf->set_paper("A4","portrait");
$dompdf->load_html( $salida );

$dompdf->set_base_path( "pdfstyles.css" );
$dompdf->render(); 

$array_opciones = array(
	"afichero" => 1,
	"compress" => 1,
	"p" => "portrait"
);
if($generar_fisico == "s"){
    file_put_contents(SITE_PATH."/pdf/".$archivoSalida, $dompdf->output());     
}else{
    $dompdf->stream($archivoSalida,$array_opciones);
}
?>
