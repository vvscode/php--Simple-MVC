<?php

class View
{
    public function __construct()
    {
        // Add ob_start to send headers from views
        ob_start();
    }

    /**
     * @param $name имя шаблона, который нужно отобразить ( отображается вместе с заголовком и подвалом)
     */
    public function render($name, array $data = array())
    {
        require 'inc/views/header.php';
        $this->renderPartial($name, $data);
        require 'inc/views/footer.php';
    }

    /**
     * @param $name имя шаблона, который нужно отобразить. Отображается только шаблон
     */
    public function renderPartial($name, array $data = array())
    {
        if (!empty($data)) {
            extract($data);
        }
        require('inc/views/' . $name . '.php');
    }
}