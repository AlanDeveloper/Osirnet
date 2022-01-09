<?php

namespace App\Model;

use App\Model\Model;

class Model_Attach extends Model {

    public static function add($obj) {
        try {
            $sql = 'INSERT INTO documento_colaborador (id_colaborador, id_tipo_documento, caminho_documento) VALUES (:id_colaborador, :id_tipo_documento, :caminho_documento)';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute(array(
                'id_colaborador' => intval($obj['id_colaborador']),
                'id_tipo_documento' => intval($obj['id_tipo_documento']),
                'caminho_documento' => $obj['caminho_documento'],
            ));
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }

    public static function find($id) {
        try {
            $sql = 'SELECT id_tipo_documento, id FROM documento_colaborador WHERE id_colaborador = :id_colaborador ';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute(array(
                'id_colaborador' => $id
            ));
    
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }

    public static function delete($id) {
        try {
            $sql = 'DELETE FROM documento_colaborador WHERE id = :id';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute(array('id' => $id));
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }
}