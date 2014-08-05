<?php

class GuestBookController extends Controller
{

    public function indexAction()
    {
        $message = new GbMessageModel();
        if($this->isPost()){
            $captchaFlag = Captcha::isValidCaptcha(@$_POST['captcha'], 'gbForm');

            $message->setAttributes($_POST);

            if($message->isValid() AND $captchaFlag AND $message->insert()){
                $message->messageText = "";
                $this->view->result = "Сообщение сохранено";
            } else {
                $this->view->gbErrors = $message->getErrors();

                if(!$captchaFlag){
                    $this->view->gbErrors['captcha'] = 'Неверный ответ';
                }
            }
        }

        $this->view->msg = $message;
        $this->view->gbCaptchaQuestion = Captcha::getCaptchaQuestion('gbForm');

        $this->view->render('guestbook/index');
    }
}