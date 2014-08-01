<?php

require_once('inc/service/model.php');
class UserModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public static function getList()
    {
        return array(
            array('id' => 1, 'name' => 'Сергей'),
            array('id' => 2, 'name' => 'Петр'),
            array('id' => 3, 'name' => 'Василий'),
            array('id' => 4, 'name' => 'Григорий'),
            array('id' => 5, 'name' => 'Мария'),
        );
    }
} 