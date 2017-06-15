<?php

require_once __DIR__ . './../../Config.php';
require_once Config::getApplicationDatabasePath() . 'MyDataAccessPDO.php';
require_once Config::getApplicationModelPath() . 'Documento.php';

class DocumentoManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'documento';

    public function registarDocumento($id, $nome, $tipo, $titulo, $autor, $resumo, $categoria, $data, $conteudo, $palavras, $tamanho, $estado) {

        $documento = new Documento($id, $nome, $tipo, $titulo, $autor, $resumo, $categoria, $data, $conteudo, $palavras, $tamanho, $estado);

        try {
            $this->insert(static::SQL_TABLE_NAME, $documento->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDocuments() {
        try {
            $lista = $this->getRecords(self::SQL_TABLE_NAME);
            $listaDoc = array();
            $i = 0;
            foreach ($lista as $value) {
                $listaDoc[$i] = Documento::convertArrayToObject($value);
                $i++;
            }
            return $listaDoc;
        } catch (Exception $e) {
            throw $e;
        }
    }

}
