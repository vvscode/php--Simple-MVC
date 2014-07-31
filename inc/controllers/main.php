<?php

class MainController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction(){
        $this->view->render('main/index');
    }

}