<?php
// This file generated by Propel 1.6.6-dev convert-conf target
// from XML runtime conf file /var/www/proylectura/internos/runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'proylectura' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost;dbname=proylectura',
        'user' => 'root',
        'password' => '',
        'settings' => 
        array (
          'charset' => 
          array (
            'value' => 'utf8',
          ),
        ),
      ),
    ),
    'default' => 'proylectura',
  ),
  'generator_version' => '1.6.6-dev',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-proylectura-conf.php');
return $conf;