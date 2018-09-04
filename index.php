<?php

require_once 'dev.php';

use Application\Core\Router;

spl_autoload_register(function($class){
    $path = str_replace('\\', '/', $class.'.php');
    if(file_exists($path)) {
        require $path;
    }
});

session_start();

$router = new Router();
$router->run();