<?php
// Контроллер по-умолчанию
define('DEFAULT_CONTROLLER','main');

$url = isset($_GET['url'])? trim($_GET['url']): DEFAULT_CONTROLLER;
$urlParts = explode('/', $url);

$controllerFileName = 'inc/controllers/'.$urlParts[0].'.php';
$controllerName = $urlParts[0].'Controller';


require_once($controllerFileName);
$controller = new $controllerName;

if(isset($urlParts[1])){
    $actionName = $urlParts[1].'Action';
    $controller->$actionName();
}