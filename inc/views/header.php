<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->title ?></title>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= Controller::url('') ?>">Simple MVC Structure</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?= Controller::url('user') ?>">Пользователи</a>
                </li>
                <li>
                    <a href="<?= Controller::url('guestbook') ?>">Гостевая книга</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                    <?php
                    if($this->session->isLoggedIn()){
                        echo '<li class="active"><a href="#">'.$this->session->getName().'</a></li>';
                        echo '<li><a href="'.Controller::url('auth','logout').'">Выйти</a></li>';
                    } else {
                        echo '<li><a href="'.Controller::url('auth','login').'">Войти</a></li>';
                    }
                    ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
