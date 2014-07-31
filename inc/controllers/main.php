<?php

class MainController
{

    public function __construct()
    {
        echo __CLASS__.'<br />';
    }

    public function testAction(){
        echo __METHOD__.'<br />';
    }

}