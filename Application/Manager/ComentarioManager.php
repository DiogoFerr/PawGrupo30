<?php

require_once __DIR__ . './../../Config.php';
require_once Config::getApplicationDatabasePath() . 'MyDataAccessPDO.php';
require_once Config::getApplicationModelPath() . 'Comentario.php';

class ComentarioManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'comentario';

    public function registarComentario($id, $idDoc, $username, $comentario) {

        $coment = new Comentario($id, $idDoc, $username, $comentario);

        try {
            $this->insert(static::SQL_TABLE_NAME, $coment->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ComentarioPorId($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, Array('id' => $id));

        } catch (Exception $e) {
            throw $e;
        }
    }

   

    public function todosOsComentariosPorId($idDoc) {
        try {
            $lista = $this->getRecords(self::SQL_TABLE_NAME, Array('idDoc' => $idDoc));
            $listaDoc = array();
            $i = 0;
            foreach ($lista as $value) {
                $listaDoc[$i] = Comentario::convertArrayToObject($value);
                $i++;
            }
            return $listaDoc;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function apagarComentario($id) {
        try {
            return $this->delete(self::SQL_TABLE_NAME, Array('id' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

}
