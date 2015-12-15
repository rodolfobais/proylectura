
<?php 
//@session_star();
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

if(isset($_GET["id"])==""){
    include('solicitud.php');
    //die();
}else{
    $amistad = AmistadQuery::create()->filterById_usuario($_SESSION['userid'])->filterByid_usuarioamigo($_GET['id'])->find();
    if($amistad==null){
        include('solicitud.php'); 
    }
}
?>

