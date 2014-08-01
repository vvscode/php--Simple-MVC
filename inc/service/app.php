<?php

class App
{
    public function __construct()
    {
        $url = isset($_GET['url'])? trim($_GET['url']): DEFAULT_CONTROLLER;
        $urlParts = explode('/', rtrim($url,'/'));

        $controllerName = $urlParts[0].'Controller';

        $controller = new $controllerName;

        if(isset($urlParts[1])){
            $actionName = $urlParts[1].'Action';
        } else {
            $actionName = 'indexAction';
        }

        if(method_exists($controller, $actionName)){
            $controller->$actionName();
        } else {
            throw new Exception('Action not found');
        }
    }
} 