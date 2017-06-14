<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

class Utilizador {

    private $id;
    private $username;
    private $nome;
    private $morada;
    private $contacto;
    private $password;
    function __construct($id, $username, $nome, $morada, $contacto, $password) {
        $this->id=$id;
        $this->username = $username;
        $this->nome = $nome;
        $this->morada = $morada;
        $this->contacto = $contacto;
        $this->password = $password;
    }

    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getNome() {
        return $this->nome;
    }

    function getMorada() {
        return $this->morada;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setMorada($morada) {
        $this->morada = $morada;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    public function convertObjectToArray() {
        $data = array('id' => $this->getId(),
            'username' => $this->getUsername(),
            'nome' => $this->getNome(),
            'morada' => $this->getMorada(),
            'contacto' => $this->getContacto(),
            'password' => $this->getPassword());

        return $data;
    }

    public static function convertArrayToObject(Array &$data) {
        return self::createObject(
                        $data['id'], 
                        $data['username'], 
                        $data['nome'], 
                        $data['morada'], 
                        $data['contacto'], 
                        $data['password']);
    }

    public static function createObject($id, $username, $nome, $morada, $contacto, $password) {
        $utilizador = new Utilizador($id, $username, $nome, $morada, $contacto, $password);

        return $utilizador;
    }

}
