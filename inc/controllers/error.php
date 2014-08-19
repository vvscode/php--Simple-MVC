<?php

class ErrorController extends Controller {
    public function notFoundAction($controllerName = "", $actionName = ""){
        $this->view->render('error/not-found');
    }
}