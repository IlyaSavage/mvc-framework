<?php


namespace Application\Controllers;

use Application\Core\Controller;

class ArticlesController extends Controller
{
    public function showAction() {
        $result = $this->model->getArticles();
        $vars = [
            'articles' => $result,
        ];
        $this->view->render('Статьи', $vars);
    }
}