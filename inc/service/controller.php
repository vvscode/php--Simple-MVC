<?php

abstract class Controller
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

    /**
     * Выполняет перенаправление пользователя на указанный адрес
     * @param $url
     */
    public function redirect($url)
    {
        header('Location: ' . $url);
        die;
    }

    /**
     * Возвращает URL для указанных параметров
     * Число параметров - не менее одного
     * Первый - имя контроллера
     * Остальные в порядке использования - имя метода, значения параметров
     * @param $controller
     * @return mixed
     */
    public static function url($controller)
    {
        $args = func_get_args();

        return APP_BASE_URL . implode("/", $args);

    }

    public function isPost()
    {
        return !empty($_POST);
    }
} 