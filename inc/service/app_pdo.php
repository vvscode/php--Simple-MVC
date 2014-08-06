<?php

class App_PDO extends PDO
{
    protected static $instance;
    /**
     * @var int Статическая переменная для сохранения числа запросов
     */
    protected static $queryCount = 0;

    /**
     * @return App_PDO Возвращает
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self('mysql:host=' . APP_DB_HOST . ';dbname=' . APP_DB_DATABSE, APP_DB_USER, APP_DB_PASS);
            self::$instance->setAttribute(PDO::ATTR_STATEMENT_CLASS, array('App_PDO_Statement', array(self::$instance)));
        }

        return self::$instance;
    }

    /**
     * Переопределенный метод query для логирования запросов
     * @param string $statment
     * @return mixed|PDOStatement
     */
    public function query($statment)
    {
        $this->addQuery($statment);
        $args = func_get_args();
        $args[0] = $this->prepareQuery($args[0]);
        return call_user_func_array(array('parent', 'query'), $args);
    }

    public function prepare($statement, $options = NULL)
    {
        $this->setAttribute(PDO::ATTR_STATEMENT_CLASS, array('App_PDO_Statement', array($this)));
        $args = func_get_args();
        $args[0] = $this->prepareQuery($args[0]);
        $originalStatement = call_user_func_array(array('parent', 'prepare'), $args);
        return $originalStatement;
    }

    /**
     * ДОбавляет запрос в счетчик запросов. Заодно может его логировать
     * @param string $query принимает текст запроса в качестве параметра
     */
    public function addQuery($query = '')
    {
        self::$queryCount++;
    }

    /**
     * Возвращает колличество залогированных запросов
     * @return int
     */
    public static function getQueryCount()
    {
        return self::$queryCount;
    }

    public function prepareQuery($query)
    {
        return preg_replace('/\{\{(.+?)\}\}/', APP_DB_PREFIX . '$1', $query);
    }
}