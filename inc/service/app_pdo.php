<?php

class App_PDO extends PDO
{
    protected static $instance;

    protected function __constructor($dsn, $username = '', $password = '', $options = array())
    {
        parent::__construct($dsn, $username, $password, $options);
        $this->setAttribute(PDO::ATTR_STATEMENT_CLASS, array('App_PDO_Statement', array($this)));
    }

    /**
     * @return App_PDO Возвращает
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self('mysql:host=' . APP_DB_HOST . ';dbname=' . APP_DB_DATABSE, APP_DB_USER, APP_DB_PASS);
        }

        return self::$instance;
    }
}