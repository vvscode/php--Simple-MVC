<?php

class App
{
    /**
     * @var int Время старта приложения с микросекундах
     */
    private static $startTime;

    public function __construct()
    {
        self::$startTime = microtime(true);

        $url = isset($_GET['url']) ? trim($_GET['url']) : DEFAULT_CONTROLLER;
        $urlParts = explode('/', rtrim($url, '/'));

        $actionParams = array_slice($urlParts, 2);

        $controllerName = $urlParts[0] . 'Controller';

        $controller = new $controllerName;

        $actionName = isset($urlParts[1]) ? $urlParts[1] . 'Action' : 'indexAction';

        if (method_exists($controller, $actionName)) {
            call_user_func_array(array($controller, $actionName), $actionParams);
        } else {
            throw new Exception('Action not found');
        }
    }

    /**
     * @return int Число микросекунд времени выполнения скрипта
     */
    public static function getExecutionTime()
    {
        $end = microtime(true);
        return ($end - self::$startTime);
    }
} 