<?php

define('DEFAULT_CONTROLLER','main');

$url = isset($_GET['url'])? trim($_GET['url']): DEFAULT_CONTROLLER;

$controllerFileName = 'inc/controllers/'.$url.'.php';
$controllerName = $url.'Controller';

require_once($controllerFileName);
$controller = new $controllerName;