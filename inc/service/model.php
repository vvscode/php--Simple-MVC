<?php

class Model
{
    protected static $dbc;
    protected static $instance;

    public function __construct()
    {
        if(!self::$dbc){
            self::$dbc = new PDO('mysql:host='.APP_DB_HOST.';dbname='.APP_DB_DATABSE,APP_DB_USER, APP_DB_PASS);
        }
    }

    public static function model(){
        if(!self::$instance){
            self::$instance = new self;
        }
    }
} 