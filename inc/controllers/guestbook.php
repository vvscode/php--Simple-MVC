<?php

class GuestBookController extends Controller
{

    public function indexAction($page = 1)
    {
        $message = new GbMessageModel();
        if ($this->isPost()) {
            $captchaFlag = Captcha::isValidCaptcha(@$_POST['captcha'], 'gbForm');

            $message->setAttributes($_POST);

            if ($message->isValid() AND $captchaFlag AND $message->insert()) {
                $message->messageText = "";
                $this->view->result = "Сообщение сохранено";
            } else {
                $this->view->gbErrors = $message->getErrors();

                if (!$captchaFlag) {
                    $this->view->gbErrors['captcha'] = 'Неверный ответ';
                }
            }
        }

        $this->view->messages = GbMessageModel::getList($page);

        $this->view->msg = $message;
        $this->view->gbCaptchaQuestion = Captcha::generateCaptchaQuestion('gbForm');

        $messagesCount = GbMessageModel::getTotalCount();
        $this->view->currentPage = $page;
        $this->view->totalPages = ($messagesCount / APP_GB_MESSAGES_PER_PAGE > 0) ? (int)($messagesCount / APP_GB_MESSAGES_PER_PAGE) + 1 : $messagesCount / APP_GB_MESSAGES_PER_PAGE;
        $this->view->pagerLinkTpl = Controller::url('guestbook', 'index', '{{PAGE}}');

        $this->view->render('guestbook/index');
    }
}