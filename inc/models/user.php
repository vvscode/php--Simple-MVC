<?php

class UserModel extends Model
{
    protected static $usersList = array(
        array('id' => 1, 'login' => 'admin', 'authkey' => 'admin', 'name' => 'Главный администратор', 'isAdmin' => TRUE),
        array('id' => 2, 'login' => 'demo', 'authkey' => 'demo', 'name' => 'Демо пользователь', 'isAdmin' => FALSE),
        array('id' => 3, 'login' => 'user', 'authkey' => 'user', 'name' => 'Пользователь, просто пользователь', 'isAdmin' => FALSE),
        array('id' => 4, 'login' => 'test', 'authkey' => 'test', 'name' => 'Тестовый пользователь', 'isAdmin' => FALSE),
        array('id' => 5, 'login' => 'root', 'authkey' => 'R00t', 'name' => 'Самый самый главный', 'isAdmin' => FALSE),
    );

    public function __construct(array $properties = array())
    {
        parent::__construct();

        foreach ($properties as $name => $val) {
            $this->$name = $val;
        }
    }

    public static function getList()
    {
        $arr = self::$usersList;
        array_walk($arr, function (&$val, $key) {
            unset($val['authkey']);
        });
        return $arr;
    }

    public static function findBy(array $condition)
    {
        foreach (self::$usersList as $uData) {
            $flag = true;
            foreach ($condition as $key => $val) {
                if (!isset($uData[$key]) || $uData[$key] != $val) {
                    $flag = false;
                    break;
                }
            }

            if ($flag == true) {
                return new self($uData);
            }
        }

        return null;
    }
} 