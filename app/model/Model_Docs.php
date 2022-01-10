<?php

namespace App\Model;

use App\Model\Model;

class Model_Docs extends Model {

    public static function add($obj) {
        try {
            $sql = 'INSERT INTO tipo_documento (nome_doc, flag, data_criacao, data_modificado, id_criador, id_modificador) VALUES (:nome_doc, :flag, NOW(), NOW(), :id_criador, :id_modificador)';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute(array(
                'nome_doc' => $obj['nome_doc'],
                'flag' => intval($obj['flag']),
                'id_criador' => intval($obj['id_collaborator']),
                'id_modificador' => intval($obj['id_collaborator']),
            ));
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
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
    
    public static function delete($id) {
        try {
            $sql = 'DELETE FROM tipo_documento WHERE id = :id';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute(array('id' => $id));
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }
    
    public static function update($obj) {
        try {
            $sql = 'UPDATE tipo_documento SET nome_doc = :nome_doc, flag = :flag, data_modificado = NOW(), id_modificador = :id_modificador WHERE id = :id';
            $conn = self::connect();
            $query = $conn->prepare($sql);
            $query->execute(array(
                'id' => $obj['id'],
                'nome_doc' => $obj['nome_doc'],
                'flag' => $obj['flag'],
                'id_modificador' => $obj['id_collaborator']
            ));
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }
}