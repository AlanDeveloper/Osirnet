<?php

namespace App\Model;

use App\Model\Model;

class Model_Docs extends Model {

    public static function add($obj) {
        
    }

    public static function find() {
        try {
            $sql = 'SELECT * FROM tipo_documento';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute();
    
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }
}