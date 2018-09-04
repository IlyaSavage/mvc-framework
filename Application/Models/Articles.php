<?php

namespace Application\Models;
use Application\Core\Model;

class Articles extends Model
{
    public function getArticles() {
        $result = $this->db->getRow('SELECT * FROM articles');
        return $result;
    }
}