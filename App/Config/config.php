<?php
namespace App;

define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', realpath(dirname(__FILE__)) . DS . '..' . DS);
define('VIEW_PATH', APP_PATH . 'Views' . DS);
define ('TEMPLATE_PATH', APP_PATH . 'Template' . DS);

define ('CSS', '/css/');
define ('JS', '/js/');

// database credentials
defined('DATABASE_HOST_NAME')       ? null : define ('DATABASE_HOST_NAME', 'eStore.com');
defined('DATABASE_USER_NAME')       ? null : define ('DATABASE_USER_NAME', 'root');
defined('DATABASE_PASSWORD')        ? null : define ('DATABASE_PASSWORD', 'Keroo@30311152404778');
defined('DATABASE_DB_NAME')         ? null : define ('DATABASE_DB_NAME', 'store');
defined('DATABASE_PORT_NUMBER')     ? null : define ('DATABASE_PORT_NUMBER', 3306);
defined('DATABASE_CONN_DRIVER')     ? null : define ('DATABASE_CONN_DRIVER', 1);
defined('DATABASE_CHARSET')         ? null : define ('DATABASE_CHARSET', 'utf8mb4');

// Languages
defined('APP_DEFAULT_LANGUAGE')      ? null : define ('APP_DEFAULT_LANGUAGE', 'ar');
define ('LANGUAGES_PATH', APP_PATH . 'Languages' . DS);