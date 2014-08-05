<?php

Class GbMessageModel extends Model{
    public $userName = "";
    public $userEmail = "";
    public $messageText = "";
    public $date;

    protected $errors;

    public function __construct(){
        parent::__construct();

        $this->date = date('Y-m-d H:i:s');
    }

    /**
     * Проверяет валидность полей сообщения
     * @return bool
     */
    public function isValid(){
        $flag = TRUE;
        $this->errors = array();

        if(strlen($this->userName) < 5){
            $this->errors['userName'] = 'Имя пользователя короче 5 символов';
            $flag = FALSE;
        }

        if(strlen($this->messageText) < 30){
            $this->errors['messageText'] = 'Сообщение короче 30 символов';
            $flag = FALSE;
        }

        if(!preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i', $this->userEmail)){
            $this->errors['userEmail'] = 'Проверьте формат email ('.$this->userEmail.')';
            $flag = FALSE;
        }

        return $flag;
    }

    /**
     * Возвращает массив с ошибками
     * Пример array('userEmail' => 'Проверьте формат email', 'messageText' => 'Сообщение короче 30 символов'
     * @return array
     */
    public function getErrors(){
        if(!is_array($this->errors)){
            $this->isValid();
        }

        return $this->errors;
    }

    /**
     * Вставляет сообещение в базу
     */
    public function insert(){
        if($this->isValid()){
            $st = $this->db()->prepare('INSERT INTO '.APP_DB_PREFIX.'gb_messages (userName, userEmail, messageText) VALUES(:userName, :userEmail, :messageText)');
            $rezult = $st->execute(array(
                ':userName' => $this->userName,
                ':userEmail' => $this->userEmail,
                ':messageText' => $this->messageText,
            ));
            if($rezult){
                return $this->db()->lastInsertId();
            } else {
                $err = $st->errorInfo();
                $this->errors['insert_error'] = $err[1].': '.$err[2];
            }
        }

        return false;
    }

    /**
     * Сохраняет сообщение в базу
     * @return bool
     */
    public function save(){
        $this->errors['save'] = 'Ошибка сохранения';
        return false;
    }
}