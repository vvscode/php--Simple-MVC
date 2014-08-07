<?php

class ImageModel extends Model {
    const FONTS_DIR = 'fonts/';

    protected $font = "consola.ttf";
    protected $fontSize = 12;
    protected $imgWidth = 80;
    protected $imgHeight = 30;
    protected $text;


    public function __construct($text = '') {
        $this->text = $text;
    }

    public function setText($text){
        $this->text = $text;

        return $this;
    }

    public function send(){
        // Создаем холст
        $img = imagecreate($this->imgWidth, $this->imgHeight);
        // Создаем цвет фона
        $backGroudColor = imagecolorallocate($img, rand(200,255), rand(200,255), rand(200,255));
        // заполняем фон
        imagefill($img, 0, 0, $backGroudColor);
        // Цвет текста
        $textColor = imagecolorallocate( $img, rand(0, 150), rand(0, 150), rand(0, 150) );
        // рисуем картинку
        imagettftext(
            $img,   // холст
            $this->fontSize, // ращмер шрифта
            rand(-10, 10),  // угол наклона
            5,  // сдвиг по горизонтали
            ($this->imgHeight + $this->fontSize)/2, // сдвиг по вертикали
            $textColor, // цвет текста
            self::FONTS_DIR.$this->font,    // имя шрифта
            $this->text
        );   // текст

        // заголовк для указания типа
        header('Content-Type: image/png');
        // выводим картинку в поток
        imagepng($img);
        // Очищаем память
        imagedestroy($img);
    }
}