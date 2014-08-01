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

    /**
     * @param null $param1
     * @param null $param2
     * Проверять сслыками
     * main/test
     * main/test/1
     * main/test/1/2
     * main/test/1/2/3
     */
    public function testAction($param1 = null, $param2 = null){
        $this->view->param1 = $param1;
        $this->view->param2 = $param2;

        $this->view->render('main/test');
    }

}