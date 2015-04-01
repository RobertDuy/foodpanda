<?php
// HTTP
define('HTTP_SERVER', 'http://localhost/foodpanda/');

// HTTPS
define('HTTPS_SERVER', 'http://localhost/foodpanda/');

define('IMAGE_BASE','image/');
define('DIR_ROOT_NAME','foodpanda');
define('ROOT_PATH', '/var/www/html/');
define('PROJECT_PATH', ROOT_PATH. DIR_ROOT_NAME);

// DIRff
define('DIR_APPLICATION', PROJECT_PATH.'/foodpanda/');
define('DIR_SYSTEM', PROJECT_PATH.'/system/');
define('DIR_DATABASE', PROJECT_PATH.'/system/database/');
define('DIR_LANGUAGE', PROJECT_PATH.'/foodpanda/language/');
define('DIR_TEMPLATE', PROJECT_PATH.'/foodpanda/view/theme/');
define('DIR_CONFIG', PROJECT_PATH.'/system/config/');
define('DIR_IMAGE', PROJECT_PATH.'/image/');
define('DIR_CACHE', PROJECT_PATH.'/system/cache/');
define('DIR_DOWNLOAD', PROJECT_PATH.'/download/');
define('DIR_LOGS', PROJECT_PATH.'/system/logs/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'foodpanda');
define('DB_PREFIX', '');
?>
