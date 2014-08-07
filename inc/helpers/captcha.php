<?php

class Captcha
{

    public static function getCaptchaQuestion($prefix = '')
    {
        $answ = rand(1, 20);
        $marker = rand(0, 1) ? '+' : '-';

        $b = rand(1, $answ);
        switch ($marker) {
            case '+':
                $a = $answ - $b;
                break;
            case '-':
                $a = $answ + $b;
                break;
        }

        $_SESSION[$prefix . '_captcha'] = $answ;
        return $a . ' ' . $marker . ' ' . $b;
    }

    public static function isValidCaptcha($answ, $prefix = '')
    {
        $rightAnsw = isset($_SESSION[$prefix . '_captcha']) ? $_SESSION[$prefix . '_captcha'] : '';
        return $answ == $rightAnsw;
    }

    public static  function getCaptchaAnswer($prefix){
        if(!isset($_SESSION[$prefix . '_captcha'])){
            self::getCaptchaQuestion();
        }

        return $_SESSION[$prefix . '_captcha'];
    }
}