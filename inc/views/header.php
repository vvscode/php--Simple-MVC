<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $this->title ?></title>
</head>
<body>
<div class="auth-block">
    <?php
    if ($this->session->isLoggedIn()) {
        echo $this->session->getName();
        echo '<a href="' . Controller::url('auth','logout') . '">Выйти</a>';
    } else {
        echo '<a href="' . Controller::url('auth', 'login') . '">Войти</a>';
    }
    ?>
    <?php
    if ($this->session->isAdmin()) {
        echo '<br />Администраторские права';
    } else {
        // Логика для обычных / незалогиненых пользователей
    }
    ?>
</div>