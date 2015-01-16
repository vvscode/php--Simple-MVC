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

    protected function addNoise($img){
        $lineNum = rand(10, 20);
        for($i = 0; $i<$lineNum; $i++){
            $lineColor = imagecolorallocate($img, rand(150,255), rand(150, 255), rand(150, 255));
            $x1 = rand(0, $this->imgWidth / 2 );
            $y1 = rand(0, $this->imgHeight / 2);
            $x2 = rand($x1, $this->imgWidth);
            $y2 = rand($y1, $this->imgHeight);

            $lineFunc = rand(0, 1)? 'imagedashedline': 'imageline';

            $lineFunc($img, $x1, $y1, $x2, $y2, $lineColor);
        }
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

        // добавляем шум
        $this->addNoise($img);

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