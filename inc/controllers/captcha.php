<?php

class CaptchaController extends Controller {

    public function indexAction(){
        $this->showAction();
    }

    public function showAction($prefix = ""){
        $question = Captcha::getCaptchaQuestion($prefix);

        $pic = new ImageModel();
        $pic->setText($question)->send();
    }
}