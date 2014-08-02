<?php

class App_PDO extends PDO
{
    protected static $instance;
    /**
     * @var int Статическая переменная для сохранения числа запросов
     */
    protected static $queryCount = 0;

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

    /**
     * Переопределенный метод query для логирования запросов
     * @param string $statment
     * @return mixed|PDOStatement
     */
    public function query($statment){
        $this->addQuery($statment);
        $args = func_get_args();
        return call_user_func_array(array('parent','query'), $args);
    }

    /**
     * ДОбавляет запрос в счетчик запросов. Заодно может его логировать
     * @param string $query принимает текст запроса в качестве параметра
     */
    public function addQuery($query = ''){
        self::$queryCount++;
    }

    /**
     * Возвращает колличество залогированных запросов
     * @return int
     */
    public static function getQueryCount(){
        return self::$queryCount;
    }
}