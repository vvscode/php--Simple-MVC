<?php

class ErrorController extends Controller {
    public function notFoundAction($controllerName = "", $actionName = ""){
        $this->view->render('error/not-found');
    }

    public function errorAction($errno , $errstr = "" , $errfile = "", $errline = -1, $errcontext){
        $this->view->render('error/error');
    }

    public function exceptionAction(Exception $ex = null){
        $this->view->render('error/exception');
    }

    public function classNotFoundAction($className = ""){
        $this->view->className = $className;
        $this->view->render('error/class-not-found');
    }
}