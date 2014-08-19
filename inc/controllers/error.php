<?php

class ErrorController extends Controller {
    public function notFoundAction($controllerName = "", $actionName = ""){
        $this->view->render('error/not-found');
        die;
    }

    public function errorAction($errno , $errstr = "" , $errfile = "", $errline = -1, $errcontext){
        $this->view->render('error/error');
        die;
    }

    public function exceptionAction(Exception $ex = null){
        $this->view->render('error/exception');
        die;
    }

    public function classNotFoundAction($className = ""){
        $this->view->className = $className;
        $this->view->render('error/class-not-found');
        die;
    }
}