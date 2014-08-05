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

    /**
     * Возвращает общее колличество записей в гостевой книге
     */
    public static function getTotalCount(){
        $st = self::db()->prepare('SELECT COUNT(*) FROM  `'.APP_DB_PREFIX.'gb_messages`');
        $st->execute();
        return $st->fetchColumn();
    }

    /**
     * Возвращает список моделей для указанной страницы гостевой книги
     * @param int $pageNum
     * @param int $perPage
     * @return mixed
     */
    public static function getList($pageNum = 1, $perPage = APP_GB_MESSAGES_PER_PAGE){
        $offset =  ($pageNum > 1)? ($pageNum-1)*$perPage: 0;
        $st = self::db()->prepare('SELECT * FROM '.APP_DB_PREFIX.'gb_messages ORDER BY `date` DESC  LIMIT :limit OFFSET :offset');
        $st->bindParam(':limit', $perPage, PDO::PARAM_INT);
        $st->bindParam(':offset', $offset, PDO::PARAM_INT);
        $rez = $st->execute();

        if($rez){
            return $st->fetchAll(PDO::FETCH_CLASS, GbMessageModel);
        } else {
            // todo: throw exception
            // var_dump($st->errorInfo());
        }
    }
}