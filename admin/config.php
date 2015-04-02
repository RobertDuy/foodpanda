<?php
define('DIR_ROOT_NAME','foodpanda');
define('ROOT_PATH', '/var/www/html/');
define('PROJECT_PATH', ROOT_PATH. DIR_ROOT_NAME);

// HTTP
define('HTTP_SERVER', 'http://localhost/'. DIR_ROOT_NAME .'/admin/');
define('HTTP_CATALOG', 'http://localhost/'. DIR_ROOT_NAME .'/');

// HTTPS
define('HTTPS_SERVER', 'http://localhost/'. DIR_ROOT_NAME .'/admin/');
define('HTTPS_CATALOG', 'http://localhost/'. DIR_ROOT_NAME .'/');

// DIR
define('DIR_APPLICATION', PROJECT_PATH .'/admin/');
define('DIR_SYSTEM', PROJECT_PATH .'/system/');
define('DIR_DATABASE', PROJECT_PATH .'/system/database/');
define('DIR_LANGUAGE', PROJECT_PATH . '/admin/language/');
define('DIR_TEMPLATE', PROJECT_PATH . '/admin/view/template/');
define('DIR_CONFIG', PROJECT_PATH .'/system/config/');
define('DIR_IMAGE', PROJECT_PATH .'/image/');
define('DIR_CACHE', PROJECT_PATH .'/system/cache/');
define('DIR_DOWNLOAD', PROJECT_PATH .'/download/');
define('DIR_LOGS', PROJECT_PATH .'/system/logs/');
define('DIR_CATALOG', PROJECT_PATH . '/' . DIR_ROOT_NAME);

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'foodpanda');
define('DB_PREFIX', '');
?>