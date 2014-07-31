<?php

class Controller
{
    /**
     * @var View
     */
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function indexAction(){
        echo __CLASS__.'->'.__METHOD__.'<br />';
    }
} 