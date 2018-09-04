<?php

namespace Application\lib;
use PDO;

class Database
{
    protected $db;

    public function __construct() {
        $config = require 'Application/Config/database.php';
//        var_dump($config);
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'',
            $config['user'], $config['password']);
    }

    public function makeQuery($sql, $params=[]) {
        $stmt = $this->db->prepare($sql);
        if(!empty($params)) {
            foreach ($params as $key=>$val) {
                $stmt->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function getRow($sql, $params=[]) {
        $result = $this->makeQuery($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getColumn($sql, $params=[]) {
        $result = $this->makeQuery($sql);
        return $result->fetchColumn();
    }
}