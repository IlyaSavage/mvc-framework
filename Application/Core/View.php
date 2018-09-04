<?php

namespace Application\Core;

class View
{
//    public $route;
    public $layout = 'default';
    public $path;

    public function __construct($route) {
//        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars=[]) {
        extract($vars);
        ob_start();
        require 'Application/Views/layouts/'.$this->layout.'.php';
        $content = ob_get_clean();
        require 'Application/Views/'.$this->path.'.php';
    }

    public static function redirect($path) {
        header('location: '.$path);
        exit;
    }

    public static function error($code) {
        http_response_code($code);
        require 'Application/Views/errors/'.$code.'.php';
        exit;
    }

}