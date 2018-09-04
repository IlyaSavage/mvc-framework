<?php

namespace Application\Core;
use Application\Core\Controller;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct() {
        $arr = require 'Application/Config/routes.php';
        foreach ($arr as $key=>$value) {
            $this->add($key, $value);
        }
    }

    public function add($route, $params) {
        $route = "~$route~";
        $this->routes[$route] = $params;
    }

    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
//        var_dump($url);
        foreach ($this->routes as $route=>$params) {
            if(preg_match($route, $url,$matches)) {
                $this->params = $params;
//                var_dump($this->params);
                return true;
            }
        }
        return false;
    }


    public function run() {
        if($this->match()) {
            $path = 'Application\Controllers\\'.ucfirst($this->params['controller']).'Controller';
//            var_dump($path);
            if(class_exists($path)) {
                $action = $this->params['action'].'Action';
                if(method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                  View::error(404);
                }
            } else {
                View::error(404);
            }
        } else {
            View::error(404);
        }
    }
}