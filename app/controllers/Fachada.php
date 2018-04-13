<?php

namespace App\Controller;

use App\Models\UsuarioDAO;
use App\Models\LoginDAO;
use App\Models\TarefasDAO;

class Fachada {

    private $usuarioDAO;
    private $loginDAO;
    private $tarefasDAO;

    public function __construct() {

        if (empty($this->usuarioDAO)) {
            $this->usuarioDAO = new UsuarioDAO();
        }
        if (empty($this->loginDAO)) {
            $this->loginDAO = new LoginDAO();
        }
        if (empty($this->tarefasDAO)) {
            $this->tarefasDAO = new TarefasDAO();
        }
    }
    
    public function inserirUsuario($usuario) {
        return $this->usuarioDAO->salvarBD($usuario);
    }
     public function atualizarUsuario($usuario) {
        return $this->usuarioDAO->atualizar($usuario);
    }
      public function removerUsuario($id) {
        return $this->usuarioDAO->remover($id);
    }
   
}
