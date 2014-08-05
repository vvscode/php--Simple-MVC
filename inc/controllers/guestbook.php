<?php

class GuestBookController extends Controller
{

    public function indexAction()
    {
        $message = new GbMessageModel();
        if($this->isPost()){
            $message->setAttributes($_POST);

            if($message->isValid() AND $message->save()){
                $message->messageText = "";
                $this->view->result = "Сообщение сохранено";
            } else {
                $this->view->gbErrors = $message->getErrors();
            }
        }

        $this->view->msg = $message;

        $this->view->render('guestbook/index');
    }
}