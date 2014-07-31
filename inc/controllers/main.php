<?php

class MainController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        echo __CLASS__.'<br />';
    }

    public function testAction(){
        echo __METHOD__.'<br />';
    }

}