<?php

session_start();

define('DEBUG', true);
define('ROOT_DIR', realpath(dirname(__FILE__)));
define('TEMPLATE_DIR', ROOT_DIR . '/templates');

if (DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', true);
} else {
    error_reporting(0);
    ini_set('display_errors', false);
}

require_once ROOT_DIR . '/autoload.php';

$config = include_once ROOT_DIR . '/config.php';
$template = new \KeywordAPI\Template();