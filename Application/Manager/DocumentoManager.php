<?php

require_once __DIR__ . './../../Config.php';
require_once Config::getApplicationDatabasePath() . 'MyDataAccessPDO.php';
require_once Config::getApplicationModelPath() . 'Documento.php';
class DocumentoManager extends MyDataAccessPDO {
    
    const SQL_TABLE_USER = 'documento';
    
     public function registarDocumento($nome,$tipo, $titulo, $autor,$resumo ,$categoria,$data,$conteudo,$palavras,$tamanho){
         
         $documento = new Documento($nome,$tipo, $titulo, $autor,$resumo ,$categoria,$data,$conteudo,$palavras,$tamanho);

         try {
            $this->insert(static::SQL_TABLE_USER, $documento->convertObjectToArray());
        } catch (Exception $ex) {
            
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
            return $listaUsers;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
