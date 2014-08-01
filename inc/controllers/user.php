<?php

class UserController extends Controller {
    public function indexAction(){
        require_once('inc/models/user.php');
        $this->view->users = UserModel::getList();
        $this->view->render('user/index');
    }
} 