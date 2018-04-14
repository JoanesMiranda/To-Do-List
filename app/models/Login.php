<?php

class Login {

    private $email;
    private $senha;
    private $fk_usuario;

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

    function getFk_usuario() {
        return $this->fk_usuario;
    }

    function setFk_usuario($fk_usuario) {
        $this->fk_usuario = $fk_usuario;
    }

}
