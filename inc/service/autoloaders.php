<?php

// Подргузка моделей
spl_autoload_register(function ($class) {
    $modelFlag = strpos($class, 'Model');
    if ($modelFlag === FALSE) {
        return FALSE;
    }

    if ($class == 'Model') {
        require_once('inc/service/model.php');
        return true;
    }

    $modelName = str_replace('model', '', strtolower($class));
    $modelFileName = 'inc/models/' . $modelName . '.php';
    if (file_exists($modelFileName)) {
        require_once($modelFileName);
        return true;
    }
});

// Подргузка контроллеров
spl_autoload_register(function ($class) {

    $controllerFlag = strpos($class, 'Controller');
    if ($controllerFlag === FALSE) {
        return FALSE;
    }

    if ($class == 'Controller') {
        require_once('inc/service/controller.php');
        return true;
    }

    $controllerName = str_replace('controller', '', strtolower($class));
    $controllerFileName = 'inc/controllers/' . $controllerName . '.php';
    if (file_exists($controllerFileName)) {
        require_once($controllerFileName);
        return true;
    }
});

// Подргузка сервисных классов
spl_autoload_register(function ($class) {
    $classFileName = 'inc/service/' . strtolower($class) . '.php';

    if (file_exists($classFileName)) {
        require_once($classFileName);
        return true;
    }
});

// Подргузка классов-помшников
spl_autoload_register(function ($class) {
    $classFileName = 'inc/helpers/' . strtolower($class) . '.php';

    if (file_exists($classFileName)) {
        require_once($classFileName);
        return true;
    }
});