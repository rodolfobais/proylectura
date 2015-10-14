<?PHP 
	session_start();
	error_reporting(E_ALL  & ~E_NOTICE);

	define('PROJECT_NAME', 'Proyecto lectura.');
	define('SITE_TITLE','Panel :: ' . PROJECT_NAME);      

	/*Constantes usadas por propel*/
	define('SITE_PATH', '/var/www/proylectura');
	define('SITE_PATH_ADMIN', SITE_PATH . '/data/proylectura');
	define('SITE_PATH_CONFIG', SITE_PATH . '/data');
	define('SITE_PATH_CONFIG_PROPEL', SITE_PATH . '/data/proylectura-conf.php');
	define('SITE_PATH_MODULES', SITE_PATH_ADMIN . '/modules');
	define('SITE_DEBUG', false);

	/*Variables en caso de usar controlador por url*/
	$current_page_uri = $_SERVER['REQUEST_URI'];
	$part_url = explode("/", $current_page_uri);
	$page_name = end($part_url);
	$page_name = strtolower($page_name);
	
	/*Ruta de smarty*/
	$rutaPlantillas = SITE_PATH.'/data/smarty/templates/';

	/*Propel*/
	require_once SITE_PATH.'/data/vendors/propel/runtime/lib/Propel.php';
	Propel::init(SITE_PATH_CONFIG_PROPEL);
	set_include_path(SITE_PATH_MODULES . PATH_SEPARATOR . get_include_path());
	
	//funciones generales
	include_once(SITE_PATH."/includes/funciones.php");
?>
