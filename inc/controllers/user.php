<?php

class UserController extends Controller
{
    public function indexAction()
    {
        $this->view->users = UserModel::getList();
        $this->view->render('user/index');
    }
} 