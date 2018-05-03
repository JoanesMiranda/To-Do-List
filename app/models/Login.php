<?php

class Login {

    private $email;
    private $senha;
    private $fk_pessoa;
    
    public function __construct($email, $senha, $fk_pessoa) {
        $this->email = $email;
        $this->senha = $senha;
        $this->fk_pessoa = $fk_pessoa;
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
   
    function getFk_pessoa() {
        return $this->fk_pessoa;
    }

    function setFk_pessoa($fk_pessoa) {
        $this->fk_pessoa = $fk_pessoa;
    }





   

}
