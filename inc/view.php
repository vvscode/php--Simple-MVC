<?php

class View {
    public function __construct(){

    }

    /**
     * @param $name имя шаблона, который нужно отобразить
     */
    public function render($name){
         require('inc/views/'.$name.'.php');
    }
}