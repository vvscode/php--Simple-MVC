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

        // По умолчанию в залоговок выведем название контроллера
        $this->view->title = get_class($this);
    }

    public function indexAction()
    {
        echo __CLASS__ . '->' . __METHOD__ . '<br />';
    }
} 