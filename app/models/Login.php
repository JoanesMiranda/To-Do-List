<?php

namespace App\Models;

class Login {

    private $email;
    private $senha;

    public function __construct($email, $senha) {
        $this->email = $email;
        $this->senha = $senha;
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
