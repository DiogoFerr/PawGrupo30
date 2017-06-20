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

    private $codDoc;
    private $username;

    function __construct($codDoc, $username) {
        $this->codDoc = $codDoc;
        $this->username = $username;
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
        $data = array('codDoc' => $this->getCodDoc(),
            'username' => $this->getUsername());
        return $data;
    }

    public static function convertArrayToObject(Array &$data) {
        return self::createObject(
                        $data['codDoc'], $data['username']);
    }

    public static function createObject($codDoc, $username) {
        $docUtil = new DocUtil($codDoc, $username);
        return $docUtil;
    }

}
