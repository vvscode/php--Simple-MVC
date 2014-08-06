<?php

class UserController extends Controller
{
    public function indexAction()
    {
        $this->view->users = UserModel::getList();
        $this->view->render('user/index');
    }


    public function viewAction($uid)
    {
        $this->view->user = UserModel::findBy(array('id' => $uid));
        $this->view->render('user/view');
    }
} 