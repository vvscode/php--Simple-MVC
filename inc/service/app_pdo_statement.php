<?php

class App_PDO_Statement extends PDOStatement
{
    protected $db;

    protected function __construct(App_PDO $db)
    {
        $this->db = $db;
    }

    public function execute(array $input_parameters = array()){
        $this->db->addQuery($this->queryString);
        return parent::execute($input_parameters);
    }
}