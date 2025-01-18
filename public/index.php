<?php

use App\lib\FrontController;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../vendor/autoload.php";

$frontController = new FrontController();
$frontController->dispatch();