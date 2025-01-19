<?php

use App\Libs\FrontController;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once "../vendor/autoload.php";
$templateParts = include APP_PATH . 'Config' . DS .'templateConfig.php';

$template = new \App\Libs\Template($templateParts);
$language = new \App\Libs\Language();

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = APP_DEFAULT_LANGUAGE;
}
$frontController = new FrontController($template, $language);
$frontController->dispatch();