<?php

namespace Application\Controllers;
use Application\Core\Controller;

class AccountController extends Controller
{
    public function registerAction() {
        $this->view->render('Регистрация');
    }

    public function loginAction() {
        $this->view->render('Вход');
    }
}