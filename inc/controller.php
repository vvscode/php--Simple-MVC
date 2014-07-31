<?php

class Controller
{
    public function __construct()
    {
        echo __CLASS__.'<br />';
    }

    public function indexAction(){
        echo __CLASS__.'->'.__METHOD__.'<br />';
    }
} 