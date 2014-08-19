<?php

function error_handler($errno = -1 , $errstr = "" , $errfile = "", $errline = -1, $errcontext = array()){
    $controller = new ErrorController();
    $controller->errorAction($errno ,$errstr , $errfile, $errline, $errcontext);
    return true;
}

set_error_handler('error_handler');