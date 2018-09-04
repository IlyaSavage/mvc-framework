<?php

namespace Application\Controllers;

use Application\Core\Controller;
use Application\Core\View;

class MainController extends Controller
{
    public function indexAction() {
        $this->view->render('Главная');
    }
}