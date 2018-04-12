<?php

namespace App\Models;

class Usuario {

    private $nome;
    private $celular;
    private $endereco;
    private $numero;

    function getNome() {
        return $this->nome;
    }

    function getCelular() {
        return $this->celular;
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

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

}
