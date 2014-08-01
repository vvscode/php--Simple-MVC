<?php

class Controller
{
    /**
     * @var View
     */
    protected $view;

    /**
     * @var SessionModel
     */
    protected $session;

    public function __construct()
    {
        $this->view = new View();
        $session = new SessionModel();
        $this->session = $session;
        $this->view->session = $this->session;

            // По умолчанию в залоговок выведем название контроллера
        $this->view->title = get_class($this);
    }

    public function indexAction()
    {
        echo __CLASS__ . '->' . __METHOD__ . '<br />';
    }

    public function redirect($url){
        header('Location: '.$url);
        die;
    }
} 