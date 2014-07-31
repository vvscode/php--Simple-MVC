<?php

class App
{
    public function __construct()
    {
        $url = isset($_GET['url'])? trim($_GET['url']): DEFAULT_CONTROLLER;
        $urlParts = explode('/', $url);

        $controllerFileName = 'inc/controllers/'.$urlParts[0].'.php';
        $controllerName = $urlParts[0].'Controller';

        if(file_exists($controllerFileName)){
            require_once($controllerFileName);
        } else {
            throw new Exception('Controller not found');
        }

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