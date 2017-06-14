<?php

class Documento {

    private $id;
    private $titulo;
    private $nome;
    private $tipo;
    private $autor;
    private $resumo;
    private $categoria;
    private $dataCriacao;
    private $conteudo;
    private $palavrasChave;
    private $tamanho;
    private $estado;

    function __construct($id ,$nome, $tipo, $titulo, $autor, $resumo, $categoria, $dataCriacao, $conteudo, $palavrasChave, $tamanho, $estado) {
        $this->id= $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->resumo = $resumo;
        $this->categoria = $categoria;
        $this->dataCriacao = $dataCriacao;
        $this->conteudo = $conteudo;
        $this->palavrasChave = $palavrasChave;
        $this->tamanho = $tamanho;
        $this->estado = $estado;
    }

    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getNome() {
        return $this->nome;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getAutor() {
        return $this->autor;
    }

    function getResumo() {
        return $this->resumo;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getDataCriacao() {
        return $this->dataCriacao;
    }

    function getConteudo() {
        return $this->conteudo;
    }

    function getPalavrasChave() {
        return $this->palavrasChave;
    }

    function getTamanho() {
        return $this->tamanho;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setResumo($resumo) {
        $this->resumo = $resumo;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setDataCriacao($dataCriacao) {
        $this->dataCriacao = $dataCriacao;
    }

    function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    function setPalavrasChave($palavrasChave) {
        $this->palavrasChave = $palavrasChave;
    }

    function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

        public function convertObjectToArray() {
        $data = array('id' => $this->getId(),
            'nomeFicheiro' => $this->getNome(),
            'tipo' => $this->getTipo(),
            'titulo' => $this->getTitulo(),
            'autor' => $this->getAutor(),
            'resumo' => $this->getResumo(),
            'categoria' => $this->getCategoria(),
            'dataCriacao' => $this->getDataCriacao(),
            'conteudo' => $this->getConteudo(),
            'palavrasChave' => $this->getPalavrasChave(),
            'tamanho' => $this->getTamanho(),
            'estado' =>$this->getEstado()
        );

        return $data;
    }
     public static function convertArrayToObject(Array &$data) {
        return self::createObject(
                        $data['id'], 
                        $data['nomeFicheiro'], 
                        $data['tipo'], 
                        $data['titulo'], 
                        $data['autor'],
                        $data['resumo'], 
                        $data['categoria'],
                        $data['dataCriacao'],
                        $data['conteudo'],
                        $data['palavrasChave'],
                        $data['tamanho'],
                        $data['estado']);
    }

    public static function createObject($id,$nome, $tipo, $titulo, $autor, $resumo, $categoria, $dataCriacao, $conteudo, $palavrasChave, $tamanho,$estado) {
        $documento = new Documento($id,$nome, $tipo, $titulo, $autor, $resumo, $categoria, $dataCriacao, $conteudo, $palavrasChave, $tamanho,$estado);

        return $documento;
    }

}
