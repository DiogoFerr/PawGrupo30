<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

class Utilizador {

    private $id;
    private $username;
    private $nome;
    private $morada;
    private $contacto;
    private $password;
    private $tipo;
    private $estadoServer;

    function __construct($id, $username, $nome, $morada, $contacto, $password, $tipo, $estadoServer) {
        $this->id = $id;
        $this->username = $username;
        $this->nome = $nome;
        $this->morada = $morada;
        $this->contacto = $contacto;
        $this->password = $password;
        $this->tipo = $tipo;
        $this->estadoServer = $estadoServer;
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

    function getTipo() {
        return $this->tipo;
    }

    function getEstadoServer() {
        return $this->estadoServer;
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

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setEstadoServer($estadoServer) {
        $this->estadoServer = $estadoServer;
    }

    public function convertObjectToArray() {
        $data = array('id' => $this->getId(),
            'username' => $this->getUsername(),
            'nome' => $this->getNome(),
            'morada' => $this->getMorada(),
            'contacto' => $this->getContacto(),
            'password' => $this->getPassword(),
            'tipo' => $this->getTipo(),
            'estadoServer' => $this->getEstadoServer()
        );

        return $data;
    }

    public static function convertArrayToObject(Array &$data) {
        return self::createObject(
                        $data['id'], 
                        $data['username'], 
                        $data['nome'], 
                        $data['morada'], 
                        $data['contacto'], 
                        $data['password'], 
                        $data['tipo'], 
                        $data['estadoServer']);
    }

    public static function createObject($id, $username, $nome, $morada, $contacto, $password, $tipo, $estadoServer) {
        $utilizador = new Utilizador($id, $username, $nome, $morada, $contacto, $password, $tipo, $estadoServer);

        return $utilizador;
    }

   

}
