<?php

class GuestBookController extends Controller
{

    public function indexAction()
    {
        $this->view->render('guestbook/index');
    }
}