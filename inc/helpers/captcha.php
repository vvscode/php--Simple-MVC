<?php

class Captcha
{

    public static function generateCaptchaQuestion($prefix = '')
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

        $question = $a . ' ' . $marker . ' ' . $b;

        $_SESSION[$prefix . '_captcha'] = $answ;
        $_SESSION[$prefix . '_captcha_question'] = $question;
        return $question;
    }

    public static function isValidCaptcha($answ, $prefix = '')
    {
        $rightAnsw = isset($_SESSION[$prefix . '_captcha']) ? $_SESSION[$prefix . '_captcha'] : '';
        return $answ == $rightAnsw;
    }

    public static  function getCaptchaAnswer($prefix){
        if(!isset($_SESSION[$prefix . '_captcha'])){
            self::generateCaptchaQuestion($prefix);
        }

        return $_SESSION[$prefix . '_captcha'];
    }

    public static  function getCaptchaQuestion($prefix){
        if(!isset($_SESSION[$prefix . '_captcha'])){
            self::generateCaptchaQuestion($prefix);
        }

        return $_SESSION[$prefix . '_captcha_question'];
    }
}