<?php

class UserModel extends Model
{
    public function __construct(array $properties = array())
    {
        parent::__construct();

        foreach ($properties as $name => $val) {
            $this->$name = $val;
        }
    }

    /**
     * @return array Возвращает список пользователей в виде массива
     * Ключ авторизации удаляется из элементов массива
     */
    public static function getList()
    {
        $st = self::db()->query('SELECT * FROM {{users}}');
        if ($st) {
            $arr = $st->fetchAll(PDO::FETCH_ASSOC);
        }

        array_walk($arr, function (&$val, $key) {
            unset($val['authkey']);
        });
        return $arr;
    }

    /**
     * Находит первого пользователя, который подпадает под указанные условия поиска
     * Если пользователь не найден - вернет null
     * @param array $condition Массив пар поле пользователя - значение
     * @return null|UserModel
     */
    public static function findBy(array $condition)
    {
        $query = 'SELECT * FROM {{users}}';
        if (!empty($condition)) {
            $query .= ' WHERE ';

            $whereConditions = array();
            foreach ($condition as $key => $val) {
                $whereConditions[] = "$key = :$key";
            }
            $query .= implode(' AND ', $whereConditions);
        }
        $st = self::db()->prepare($query);
        $stResult = $st->execute($condition);
        $uData = $stResult ? $st->fetch(PDO::FETCH_ASSOC) : null;
        if ($stResult && $uData) {
            return new self($uData);
        }

        return null;
    }
} 