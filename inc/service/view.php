<?php

class View
{
    public function __construct()
    {

    }

    /**
     * @param $name имя шаблона, который нужно отобразить
     */
    public function render($name)
    {
        require 'inc/views/header.php';
        require('inc/views/' . $name . '.php');
        require 'inc/views/footer.php';
    }
}