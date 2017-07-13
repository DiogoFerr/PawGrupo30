<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DocUtil
 *
 * @author diogo
 */
class DocUtil {

    private $id;
    private $codDoc;
    private $username;

    function __construct($id, $codDoc, $username) {
        $this->id = $id;
        $this->codDoc = $codDoc;
        $this->username = $username;
    }
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

        function getCodDoc() {
        return $this->codDoc;
    }

    function getUsername() {
        return $this->username;
    }

    function setCodDoc($codDoc) {
        $this->codDoc = $codDoc;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    public function convertObjectToArray() {
        $data = array(
            'id'=>$this ->getId(),
            'codDoc' => $this->getCodDoc(),
            'username' => $this->getUsername());
        return $data;
    }

    public static function convertArrayToObject(Array &$data) {
        return self::createObject(
                        $data['id'],
                        $data['codDoc'], 
                        $data['username']);
    }

    public static function createObject($id,$codDoc, $username) {
        $docUtil = new DocUtil($id,$codDoc, $username);
        return $docUtil;
    }

}
