<?php

class App_PDO_Statement extends PDOStatement
{
    protected $db;

    protected function __construct(App_PDO $db)
    {
        $this->db = $db;
    }
}