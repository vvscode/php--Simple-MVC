<?php

class App
{
    /**
     * @var int Время старта приложения с микросекундах
     */
    private static $startTime;
    private static $controllerName;

    public static function start()
    {
        self::$startTime = microtime(true);

        $url = isset($_GET['url']) ? trim($_GET['url']) : APP_DEFAULT_CONTROLLER;
        $urlParts = explode('/', rtrim($url, '/'));

        $actionParams = array_slice($urlParts, 2);

        self::$controllerName = $urlParts[0];

        $controllerName = self::$controllerName . 'Controller';

        $controller = new $controllerName;

        $actionName = isset($urlParts[1]) ? $urlParts[1] . 'Action' : 'indexAction';

        if (method_exists($controller, $actionName)) {
            call_user_func_array(array($controller, $actionName), $actionParams);
        } else {
            $controller = new ErrorController();
            $controller->notFoundAction($controller, $actionName);
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

    /**
     * Возвращает имя текущего контроллера
     * @return mixed
     */
    public static function getCurrentController()
    {
        return strtolower(self::$controllerName);
    }


} 