<?php

class Model
{
    protected static $dbc;
    protected static $instance;

    public function __construct()
    {

    }

    public static function model()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
    }

    /**
     * @return App_PDO Возвращает объект соединения с базой данных
     */
    public static function db()
    {
        return App_PDO::getInstance();
    }
} 