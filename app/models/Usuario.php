<?php

namespace App\Models;

class Usuario {

    private $nome;
    private $telefone;
    private $endereco;
    private $numero;
    private $email;
    private $senha;

    public function __construct($nome, $telefone, $endereco, $numero, $email, $senha) {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->email = $email;
        $this->senha = $senha;
    }

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

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

}
