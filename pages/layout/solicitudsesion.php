
<?php 
//@session_star();
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once("../../data/config.php");

if(isset($_GET["id"])==""){
    include('solicitudes.php');
    //die();
}
?>

