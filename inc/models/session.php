<?php

Class SessionModel extends Model
{
    /**
     * @var User Модель пользователя привязанная к данным
     */
    protected $user;

    public function __construct()
    {
        session_start();

        $userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
        $this->user = UserModel::findBy(array('id' => $userId));
    }

    /**
     * @return bool Флаг залогинен ли текущий пользователь
     */
    public function isLoggedIn()
    {
        return isset($_SESSION['username']);
    }

    /**
     * @return string Имя текущего пользователя, если он залогинен
     */
    public function getName()
    {
        return $this->isLoggedIn() ? $_SESSION['username'] : '';
    }

    public function login($login, $pass)
    {
        $this->user = UserModel::findBy(array('login' => $login, 'authkey' => $pass));
        return (bool) $this->user;
    }

    public function logout()
    {
        session_destroy();
        $this->user = null;
    }

    public function __destruct()
    {
        if ($this->user) {
            $_SESSION['userId'] = $this->user->id;
            $_SESSION['username'] = $this->user->name;
        }
    }
}