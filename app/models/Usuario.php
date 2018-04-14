<?php


class Usuario {

    private $nome;
    private $telefone;
    private $endereco;
    private $numero;

//    
//    public function __construct($nome, $telefone, $endereco, $numero) {
//        $this->nome = $nome;
//        $this->telefone = $telefone;
//        $this->endereco = $endereco;
//        $this->numero = $numero;
//    }

    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getNumero() {
        return $this->numero;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

}
