<?php

class View
{
    public function __construct()
    {

    }

    /**
     * @param $name имя шаблона, который нужно отобразить ( отображается вместе с заголовком и подвалом)
     */
    public function render($name)
    {
        require 'inc/views/header.php';
        $this->renderPartial($name);
        require 'inc/views/footer.php';
    }

    /**
     * @param $name имя шаблона, который нужно отобразить. Отображается только шаблон
     */
    public function renderPartial($name){
        require('inc/views/' . $name . '.php');
    }
}