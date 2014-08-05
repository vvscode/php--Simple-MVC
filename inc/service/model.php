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

    /**
     * Устанавливает в модель группу атрибутов из массива
     * @param array $arr ассоциативный массив имя свойства - значение
     */
    public function setAttributes(array $arr){
        foreach($arr as $key => $val){
            $this->$key = $val;
        }
    }
} 