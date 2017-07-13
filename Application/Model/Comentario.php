<?php

class Comentario {

    private $id;
    private $idDoc;
    private $utilizador;
    private $comentario;

    function __construct($id, $idDoc, $utilizador, $comentario) {
        $this->id = $id;
        $this->idDoc = $idDoc;
        $this->utilizador = $utilizador;
        $this->comentario = $comentario;
    }

    function getIdDoc() {
        return $this->idDoc;
    }

    function getUtilizador() {
        return $this->utilizador;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getComentario() {
        return $this->comentario;
    }

    function setIdDoc($idDoc) {
        $this->idDoc = $idDoc;
    }

    function setUtilizador($utilizador) {
        $this->utilizador = $utilizador;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function convertObjectToArray() {
        $data = array('id' => $this->getId(),
            'idDoc' => $this->getIdDoc(),
            'utilizador' => $this->getUtilizador(),
            'comentario' => $this->getComentario());
        return $data;
    }

    public static function convertArrayToObject(Array &$data) {
        return self::createObject(
                        $data['id'], $data['idDoc'], $data['utilizador'], $data['comentario']);
    }

    public static function createObject($id, $idDoc, $username, $comentario) {
        $coment = new Comentario($id, $idDoc, $username, $comentario);
        return $coment;
    }

}
