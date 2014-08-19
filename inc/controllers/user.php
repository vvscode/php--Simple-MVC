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
        if(is_null($this->view->user)){
            throw new Exception('User not found');
        }
        $this->view->render('user/view');
    }
} 