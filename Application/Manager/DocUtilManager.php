<?php

require_once __DIR__ . './../../Config.php';
require_once Config::getApplicationDatabasePath() . 'MyDataAccessPDO.php';
require_once Config::getApplicationModelPath(). 'DocUtil.php';

/**
 * Description of DocUtilManager
 *
 * @author diogo
 */
class DocUtilManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'docutil'; 

    public function registarDocumentoPartilhado($codDoc,$username){
        
        $docUtil = new DocUtil($codDoc,$username);
        
        try {
            $this->insert(static::SQL_TABLE_NAME, $docUtil->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
        
    }
}