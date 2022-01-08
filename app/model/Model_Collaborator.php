<?php

namespace App\Model;

use App\Model\Model;

class Model_Collaborator extends Model {

    public static function find() {
        try {
            $sql = 'SELECT * FROM colaborador';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute();
    
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }
}