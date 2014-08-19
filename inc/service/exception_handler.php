<?php

function exception_handler(Exception $ex){
    $controller = new ErrorController();
    $controller->exceptionAction($ex);

    return true;
};

set_exception_handler('exception_handler');