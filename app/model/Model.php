<?php

namespace App\Model;

use PDO;

class Model {

    protected static function connect() {
        $db = new PDO(
            CONN_DATABASE['driver'] . ":host=" . CONN_DATABASE['host'] . ";dbname=" . CONN_DATABASE['database'],
            CONN_DATABASE['username'],
            CONN_DATABASE['password']
        );
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $db;
    }
}