<?php

require_once __DIR__ . './../../Config.php';
require_once Config::getApplicationDatabasePath() . 'MyDataAccessPDO.php';
require_once Config::getApplicationModelPath() . 'DocUtil.php';

/**
 * Description of DocUtilManager
 *
 * @author diogo
 */
class DocUtilManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'docutil';

    public function registarDocumentoPartilhado($id, $codDoc, $username) {

        $docUtil = new DocUtil($id, $codDoc, $username);

        try {
            $this->insert(static::SQL_TABLE_NAME, $docUtil->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }
    
     public function delete_doc($id) {
        try {
            return $this->delete(self::SQL_TABLE_NAME, Array('codDoc' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function delete_doc_user($username) {
        try {
            return $this->delete(self::SQL_TABLE_NAME, Array('username' => $username));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getExiste($codDoc, $username) {
        try {
            $lista = $this->getRecords(self::SQL_TABLE_NAME, Array('codDoc'=>$codDoc,'username' => $username));
            if(empty($lista)){
                return false;
            }else{
                return true;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function getDocByUsername($username) {
        try {
            $lista = $this->getRecords(self::SQL_TABLE_NAME, Array('username' => $username));
            $listaDoc = array();
            $i = 0;
            foreach ($lista as $value) {
                $listaDoc[$i] = DocUtil::convertArrayToObject($value);
                $i++;
            }
            return $listaDoc;
        } catch (Exception $e) {
            throw $e;
        }
    }
}